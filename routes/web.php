<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$fetchActivityImages = function (int $limit = 12): array {
    $directory = public_path('img/Carousel');
    if (!File::exists($directory)) {
        return [];
    }

    return collect(File::files($directory))
        ->filter(function ($file) {
            return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif'], true);
        })
        ->filter(function ($file) {
            $size = @getimagesize($file->getPathname());
            if (!is_array($size) || empty($size[0]) || empty($size[1])) {
                return false;
            }

            $width = (int) $size[0];
            $height = (int) $size[1];

            // Respect EXIF orientation (common for phone photos) before checking aspect.
            if (function_exists('exif_read_data')) {
                $exif = @exif_read_data($file->getPathname());
                $orientation = (int) ($exif['Orientation'] ?? 1);
                if ($orientation === 6 || $orientation === 8) {
                    [$width, $height] = [$height, $width];
                }
            }

            // Keep landscape/square only, hide portrait images from the homepage carousel.
            return $width >= $height;
        })
        ->sortByDesc(function ($file) {
            return $file->getMTime();
        })
        ->take($limit)
        ->map(function ($file) {
            return asset('img/Carousel/' . $file->getFilename());
        })
        ->values()
        ->all();
};

$decodeHtml = function ($value): string {
    $decoded = (string) $value;
    for ($i = 0; $i < 3; $i++) {
        $next = html_entity_decode($decoded, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        if ($next === $decoded) {
            break;
        }
        $decoded = $next;
    }
    return trim($decoded);
};

$fetchEduTechNews = function (?int $count = null) use ($decodeHtml): array {

    $params = ['table' => 'news_EduTechFund'];
    if ($count !== null) {
        $params['count'] = $count;
    }

    try {
        $response = Http::timeout(8)->get('https://news.rbru.ac.th/newsrb_json/news_json.php', $params);
        if (!$response->successful() || !is_array($response->json())) {
            return [];
        }

        $collection = collect($response->json());
        if ($count !== null) {
            $collection = $collection->take($count);
        }

        return $collection
            ->map(function ($item) use ($decodeHtml) {
                $id = (int) ($item['no'] ?? 0);
                $headline = $decodeHtml($item['headline'] ?? '');
                $detailHtml = $decodeHtml($item['detail'] ?? '');
                $plainDetail = trim(strip_tags($detailHtml));
                $rawImageUrl = trim((string) ($item['url'] ?? ''));
                $normalizedImageUrl = Str::lower($rawImageUrl);
                $imageUrl = $normalizedImageUrl !== '' && Str::contains($normalizedImageUrl, '/img/logonews.jpg')
                    ? asset('NEWS.png')
                    : $rawImageUrl;

                return [
                    'id' => $id,
                    'headline' => $headline !== '' ? $headline : 'ไม่ระบุหัวข้อข่าว',
                    'summary' => Str::limit($plainDetail, 140),
                    'detail_html' => $detailHtml,
                    'start' => (string) ($item['start'] ?? ''),
                    'end' => (string) ($item['end'] ?? ''),
                    'fromnews' => $decodeHtml($item['fromnews'] ?? ''),
                    'image_url' => $imageUrl,
                    'org_no' => (string) ($item['org_no'] ?? ''),
                    'year' => (string) ($item['year'] ?? ''),
                ];
            })
            ->filter(function ($item) {
                return $item['id'] > 0;
            })
            ->values()
            ->all();
    } catch (\Throwable $e) {
        return [];
    }
};

Route::get('/', function () use ($fetchActivityImages, $fetchEduTechNews) {
    $activityImages = $fetchActivityImages(12);
    $newsItems = $fetchEduTechNews(4);
    return view('welcome', compact('activityImages', 'newsItems'));
})->name('home');

Route::get('/news', function () use ($fetchEduTechNews) {
    $newsItems = $fetchEduTechNews();
    return view('pages.news', compact('newsItems'));
})->name('news');

Route::get('/detelnews/{id}', function ($id) use ($fetchEduTechNews, $decodeHtml) {
    $newsItems = collect($fetchEduTechNews());
    $news = $newsItems->first(function ($item) use ($id) {
        return (int) $item['id'] === (int) $id;
    });

    abort_if(!$news, 404);

    $detail = null;
    $attachments = [];

    try {
        $detailResponse = Http::timeout(8)->get('https://news.rbru.ac.th/newsrb_json/detail_json.php', [
            'table' => 'news_EduTechFund',
            'org_no' => $news['org_no'],
            'year' => $news['year'],
        ]);

        if ($detailResponse->successful() && is_array($detailResponse->json())) {
            $detail = collect($detailResponse->json())->first();
        }
    } catch (\Throwable $e) {
        $detail = null;
    }

    try {
        $attachResponse = Http::timeout(8)->get('https://news.rbru.ac.th/newsrb_json/news_attach.php', [
            'table' => 'news_EduTechFund',
            'org_no' => $news['org_no'],
        ]);

        if ($attachResponse->successful() && is_array($attachResponse->json())) {
            $attachments = collect($attachResponse->json())
                ->map(function ($item) use ($decodeHtml) {
                    $url = trim((string) ($item['filename'] ?? ''));
                    if ($url !== '' && !Str::startsWith($url, ['http://', 'https://'])) {
                        $url = 'https://news.rbru.ac.th/' . ltrim($url, '/');
                    }

                    $extension = strtolower(pathinfo(parse_url($url, PHP_URL_PATH) ?? '', PATHINFO_EXTENSION));
                    $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg'], true);

                    return [
                        'id' => (string) ($item['id'] ?? ''),
                        'type' => (string) ($item['type'] ?? ''),
                        'detail' => $decodeHtml($item['detail'] ?? ''),
                        'url' => $url,
                        'is_image' => $isImage,
                    ];
                })
                ->filter(function ($item) {
                    return $item['url'] !== '';
                })
                ->values()
                ->all();
        }
    } catch (\Throwable $e) {
        $attachments = [];
    }

    if (is_array($detail) && !empty($detail)) {
        $news['headline'] = $decodeHtml($detail['headline'] ?? $news['headline']);
        $news['detail_html'] = $decodeHtml($detail['detail'] ?? $news['detail_html']);
        $news['start'] = (string) ($detail['start'] ?? $news['start']);
        $news['end'] = (string) ($detail['end'] ?? $news['end']);
        $news['fromnews'] = $decodeHtml($detail['fromnews'] ?? $news['fromnews']);
    }

    return view('pages.detelnews', compact('news', 'attachments'));
})->name('news_detail');

Route::get('/about', function () {
    return view('pages.about_project');
})->name('about_project');

Route::get('/about/document', function () {
    return view('pages.document');
})->name('about_document');

Route::get('/helpbook', function () {
    return view('pages.helpbook');
})->name('about_helpbook');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/about/reserchers', [AboutController::class, 'reserchers'])->name('about_reserchers');
Route::get('/about/participants', [AboutController::class, 'participants'])->name('about_participants');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::get('/ActivityPicrture', function () {
    return view('pages.activity_picture');
})->name('activity_picture');

Route::get('/register-name', function () {
    return view('pages.register_name');
})->name('register_name');
