<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function reserchers()
    {
        // ข้อมูลของผู้บริหารและคณาจารย์ พร้อม path รูปภาพ
        $reserchers = [
            'main' => [
                'name' => 'ผู้ช่วยศาสตราจารย์ไวกูณฑ์ ทองอร่าม',
                'position' => 'อธิการบดี',
                'duty' => 'ที่ปรึกษาโครงการ',
                'image_url' => 'img/p1.png', // แก้ไข path รูปภาพตามจริง
                'social' => [
                    'twitter' => '#',
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#',
                ]
            ],
            'others' => [
                [
                    'name' => 'ผู้ช่วยศาสตราจารย์ ดร.ภูวดล บัวบางพลู',
                    'position' => 'ผู้อำนวยการสำนักวิทยบริการและเทคโนโลยีสารสนเทศ', // มหาวิทยาลัยราชภัฏรำไพพรรณี
                    'image_url' => 'img/p2.png', // แก้ไข path รูปภาพตามจริง
                    'social' => ['twitter' => '#', 'facebook' => '#', 'instagram' => '#', 'linkedin' => '#']
                ],
                [
                    'name' => 'ผู้ช่วยศาสตราจารย์ ดร.พัชรินทร์ บัวเย็น',
                    'position' => 'รองผู้อำนวยการสำนักวิทยบริการและเทคโนโลยีสารสนเทศ',
                    'image_url' => 'img/p3.png', // แก้ไข path รูปภาพตามจริง
                    'social' => ['twitter' => '#', 'facebook' => '#', 'instagram' => '#', 'linkedin' => '#']
                ],
                [
                    'name' => 'ผศ.ดร.สวัสดิ์ชัย ศรีพนมธนากร',
                    'position' => 'รองอธิการบดี ด้านวิชาการ',
                    'image_url' => 'img/p4.png', // แก้ไข path รูปภาพตามจริง
                    'social' => ['twitter' => '#', 'facebook' => '#', 'instagram' => '#', 'linkedin' => '#']
                ],
                [
                    'name' => 'ผศ.อติราช เกิดทอง',
                    'position' => 'ภาควิชาทดสอบและวิจัยการศึกษา คณะครุศาสตร์',
                    'image_url' => 'img/p5.png', // แก้ไข path รูปภาพตามจริง
                    'social' => ['twitter' => '#', 'facebook' => '#', 'instagram' => '#', 'linkedin' => '#']
                ],
                [
                    'name' => 'ดร.สันดุสิทธิ์ บริวงษ์ตระกูล',
                    'position' => 'รองผู้อำนวยการสำนักวิทยบริการและเทคโนโลยีสารสนเทศ',
                    'image_url' => 'img/p6.png', // แก้ไข path รูปภาพตามจริง
                    'social' => ['twitter' => '#', 'facebook' => '#', 'instagram' => '#', 'linkedin' => '#']
                ],
                [
                    'name' => 'ดร.ชวนพบ เอี่ยวสานุรักษ์',
                    'position' => 'รองผู้อำนวยการสำนักวิทยบริการและเทคโนโลยีสารสนเทศ',
                    'image_url' => 'img/p7.png', // แก้ไข path รูปภาพตามจริง
                    'social' => ['twitter' => '#', 'facebook' => '#', 'instagram' => '#', 'linkedin' => '#']
                ]
            ]
        ];

        return view('pages.about_resercher', compact('reserchers'));
    }

    public function participants()
    {
        return view('pages.participants_summary');
    }
}
