@php
    $carouselImages = collect($activityImages ?? [])->take(8)->values();
    $items = collect($newsItems ?? [])->take(4)->values();
@endphp

<section id="home-media-news" class="section py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f5f7fa 100%);">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6 d-flex flex-column" data-aos="fade-right">
                <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-2 mb-3">
                    <h2 class="h3 fw-bold mb-0">ภาพกิจกรรม</h2>
                    <a href="https://drive.google.com/drive/folders/1S6Wg3L8m7bhQ_fgL20gjuzhTAwV1Xyr9"
                        target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm align-self-start align-self-sm-center">
                        เปิดใน Google Drive
                    </a>
                </div>
                <a href="{{ route('activity_picture') }}" class="text-decoration-none d-block flex-grow-1 activity-card-link" id="activityCardLink">
                    <div class="card shadow-sm border-0 h-100 overflow-hidden position-relative" id="activityCard">
                        <div id="activityCarousel" class="carousel slide h-100 activity-carousel" data-bs-ride="carousel" data-bs-interval="3000">
                            @if ($carouselImages->count() > 1)
                                <div class="carousel-indicators">
                                    @foreach ($carouselImages as $index => $image)
                                        <button type="button" data-bs-target="#activityCarousel" data-bs-slide-to="{{ $index }}"
                                            class="{{ $index === 0 ? 'active' : '' }}"
                                            aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-label="Slide {{ $index + 1 }}"></button>
                                    @endforeach
                                </div>
                            @endif

                            <div class="carousel-inner h-100">
                                @forelse ($carouselImages as $index => $image)
                                    <div class="carousel-item h-100 {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ $image }}" class="d-block w-100 activity-carousel-image" alt="ภาพกิจกรรม {{ $index + 1 }}"
                                            loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
                                    </div>
                                @empty
                                    <div class="carousel-item h-100 active">
                                        <img src="{{ asset('img/banner.png') }}" class="d-block w-100 activity-carousel-image" alt="ภาพกิจกรรม">
                                    </div>
                                @endforelse
                            </div>

                            @if ($carouselImages->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#activityCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#activityCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                        <div class="activity-overlay d-flex align-items-center justify-content-center">
                            <span class="fw-bold fs-5 text-white">ดูภาพกิจกรรมทั้งหมด</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-6" data-aos="fade-left" id="newsColumn">
                <h2 class="h3 fw-bold mb-3">ข่าวประชาสัมพันธ์</h2>
                <div id="newsContent">
                    @if ($items->isEmpty())
                        <div class="card shadow-sm border-0">
                            <div class="card-body py-4 text-center text-muted">
                                ยังไม่มีข่าวประชาสัมพันธ์
                            </div>
                        </div>
                    @else
                        <div class="row g-3">
                            @foreach ($items as $item)
                                <div class="col-md-6">
                                    <a href="{{ route('news_detail', ['id' => $item['id']]) }}" class="text-decoration-none d-block h-100 news-card-link">
                                        <div class="card shadow-sm border-0 h-100 news-card">
                                            @if (!empty($item['image_url']))
                                                <img src="{{ $item['image_url'] }}" class="card-img-top" alt="{{ $item['headline'] }}"
                                                    style="height: 140px; object-fit: cover; object-position: top center;" loading="lazy">
                                            @endif
                                            <div class="card-body d-flex flex-column">
                                                <h6 class="fw-bold mb-3 text-dark" style="line-height:1.4;">{{ $item['headline'] }}</h6>
                                                <span class="btn btn-outline-primary btn-sm mt-auto">อ่านเพิ่มเติม</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ($items->count() >= 4)
                        <div class="text-center mt-3">
                            <a href="{{ route('news') }}" class="btn btn-primary px-4">อ่านข่าวทั้งหมด</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .activity-card-link .activity-overlay {
        position: absolute;
        inset: 0;
        background: rgba(13, 110, 253, 0.72);
        opacity: 0;
        transition: opacity 180ms ease;
        z-index: 3;
    }

    .activity-card-link:hover .activity-overlay {
        opacity: 1;
    }

    .activity-carousel,
    .activity-carousel .carousel-inner,
    .activity-carousel .carousel-item {
        height: 100%;
    }

    .activity-carousel .activity-carousel-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
    }

    @media (max-width: 991.98px) {
        .activity-card-link #activityCard {
            height: 420px !important;
        }
    }

    .news-card {
        transition: transform 180ms ease, box-shadow 180ms ease;
    }

    .news-card-link:hover .news-card {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(13, 110, 253, 0.18) !important;
    }

    .news-card-link:hover .btn-outline-primary {
        background-color: #0d6efd;
        color: #fff;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const newsContent = document.getElementById('newsContent');
        const activityCard = document.getElementById('activityCard');

        if (!newsContent || !activityCard) {
            return;
        }

        function syncActivityHeight() {
            if (window.innerWidth < 992) {
                activityCard.style.height = '';
                return;
            }
            const newsHeight = newsContent.getBoundingClientRect().height;
            activityCard.style.height = `${newsHeight}px`;
        }

        syncActivityHeight();
        window.addEventListener('resize', syncActivityHeight);
        window.addEventListener('load', syncActivityHeight);
    });
</script>
@endpush
