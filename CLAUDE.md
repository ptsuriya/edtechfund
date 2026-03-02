# CLAUDE.md — edtechfundpromax

## ภาพรวมโปรเจค

เว็บประชาสัมพันธ์โครงการ **RBRU X Edtech Fund AI Gateway** — แพลตฟอร์ม AI Gateway สำหรับครูและบุคลากรทางการศึกษา ร่วมกับมหาวิทยาลัยราชภัฏรำไพพรรณี (RBRU)

- ไม่ใช่ SPA — ใช้ Laravel Blade render เป็นหลัก
- ข้อมูล dynamic บางส่วนดึงจาก Google Apps Script API (client-side fetch)
- แทบไม่ใช้ฐานข้อมูล — หน้า public ส่วนใหญ่เป็น static content

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP ^8.1, Laravel ^10.10 |
| Frontend Build | Vite ^5, laravel-vite-plugin ^1 |
| UI | Bootstrap template (`public/template/assets/`) |
| Fonts | Google Fonts (Kanit, Montserrat, Open Sans, Roboto) |
| Animation | AOS, GLightbox, Swiper |
| HTTP Client | GuzzleHTTP ^7.2 |

---

## โครงสร้างไฟล์สำคัญ

```
edtechfundpromax/
├── routes/web.php                          # Route ทั้งหมด + business logic (fetchActivityImages, fetchEduTechNews)
├── app/Http/Controllers/
│   └── AboutController.php                 # reserchers(), participants()
├── resources/views/
│   ├── layouts/master.blade.php            # Layout หลัก + SEO meta + prefetch cache
│   ├── components/
│   │   ├── navbar.blade.php                # เมนูหลัก
│   │   ├── footer.blade.php
│   │   ├── hero.blade.php
│   │   ├── headbanner.blade.php
│   │   ├── home-media-news.blade.php
│   │   ├── pricing.blade.php
│   │   ├── schedule.blade.php
│   │   └── schedule-timeline.blade.php
│   ├── welcome.blade.php                   # หน้า Home
│   └── pages/
│       ├── about_project.blade.php
│       ├── about_resercher.blade.php       # ข้อมูลผู้วิจัย (data จาก Controller)
│       ├── activity_picture.blade.php      # Google Drive embedded preview
│       ├── detelnews.blade.php             # รายละเอียดข่าว
│       ├── document.blade.php
│       ├── faq.blade.php
│       ├── helpbook.blade.php
│       ├── news.blade.php
│       ├── participants_summary.blade.php  # ดึงข้อมูลจาก Apps Script API
│       ├── register.blade.php
│       └── register_name.blade.php        # ดึงข้อมูลจาก Apps Script API
├── public/
│   ├── template/                           # Bootstrap template assets (อย่าแก้ไขโดยตรง)
│   ├── img/                                # รูปภาพโปรเจค (logo, บุคลากร p1-p7.png)
│   ├── files/                              # เอกสาร PDF/เอกสารแนบ
│   └── activity/                           # รูปภาพกิจกรรม (scan จาก filesystem)
└── CODEX.md                                # Project brief สำหรับ AI agents
```

---

## Routes ทั้งหมด

| URL | Route Name | View / Handler |
|-----|-----------|---------------|
| `/` | `home` | `welcome` |
| `/news` | `news` | `pages.news` |
| `/detelnews/{id}` | `news_detail` | `pages.detelnews` |
| `/about` | `about_project` | `pages.about_project` |
| `/about/document` | `about_document` | `pages.document` |
| `/about/reserchers` | `about_reserchers` | `AboutController@reserchers` |
| `/about/participants` | `about_participants` | `AboutController@participants` → `pages.participants_summary` |
| `/helpbook` | `about_helpbook` | `pages.helpbook` |
| `/faq` | `faq` | `pages.faq` |
| `/register` | `register` | `pages.register` |
| `/ActivityPicrture` | `activity_picture` | `pages.activity_picture` |
| `/register-name` | `register_name` | `pages.register_name` |

> **หมายเหตุ:** `reserchers` และ `ActivityPicrture` สะกดแผลงโดยเจตนา (typo ทางประวัติศาสตร์) ห้ามเปลี่ยน route/name

---

## External Integrations (Hardcoded URLs)

| Service | URL / ค่า | ใช้งานใน |
|---------|----------|---------|
| Google Apps Script API | `https://script.google.com/macros/s/AKfycbwI8eTmkqHiBECddU6eWgthq9wOUKGP6MJErshlBvZwGKqs4rt1EUSyviHH85jKkPKl/exec` | `master.blade.php` (prefetch), `participants_summary.blade.php`, `register_name.blade.php` |
| RBRU News API | `https://news.rbru.ac.th/newsrb_json/news_json.php?table=news_EduTechFund` | `routes/web.php` |
| RBRU News Detail API | `https://news.rbru.ac.th/newsrb_json/detail_json.php` | `routes/web.php` |
| RBRU News Attachment API | `https://news.rbru.ac.th/newsrb_json/news_attach.php` | `routes/web.php` |
| PowerBI Dashboard | hardcoded ใน navbar | `components/navbar.blade.php` |
| RBRU Login System | `https://edtechfund.rbru.ac.th/` | `components/navbar.blade.php` |

---

## sessionStorage Cache Keys

| Key | TTL | ใช้งานใน |
|-----|-----|---------|
| `registerNameCache_v2` | 5 นาที | `layouts/master.blade.php` (prefetch) |
| `participantsSummaryCache_v1` | — | `pages/participants_summary.blade.php` |

---

## วิธีรันในเครื่อง

```bash
cp .env.example .env
composer install
php artisan key:generate
npm install
php artisan serve        # port 8000
npm run dev              # Vite HMR
```

ไม่ต้องตั้งค่า DB สำหรับหน้า public — config DB ใน `.env` เป็นค่า default Laravel

---

## คำสั่งก่อนส่งงาน

```bash
php artisan test         # run feature/unit tests
npm run build            # build assets (ถ้าแก้ JS/CSS)
```

---

## แนวทางแก้ไขที่ปลอดภัย

- **แก้หน้าเว็บ:** แก้ `resources/views/pages/*.blade.php`
- **แก้เมนู:** แก้ `components/navbar.blade.php` + ตรวจ route name ให้ตรง
- **แก้ SEO/asset รวม:** แก้ `layouts/master.blade.php`
- **เพิ่มรูปกิจกรรม:** วาง image ไว้ใน `public/activity/` (landscape/square เท่านั้น)
- **อย่าแก้ไฟล์ใน `public/template/`** โดยไม่จำเป็น
- ตรวจ responsive ทุกครั้งเมื่อเพิ่มตารางหรือ iframe

---

## Known Technical Debt

- Business logic บางส่วนอยู่ใน `routes/web.php` (closures ยาว)
- External URLs hardcoded หลายจุด ไม่มี config กลาง
- JS ของแต่ละหน้าเขียน inline ใน Blade
- Route/path บางตัวสะกดผิดโดยเจตนา (`reserchers`, `ActivityPicrture`)
- `README.md` เป็น default Laravel ไม่อธิบายโปรเจค

---

## Blade Layout Pattern

```blade
@extends('layouts.master')

@section('title', 'ชื่อหน้า')
@section('meta_description', 'คำอธิบายหน้า')

@section('content')
  {{-- เนื้อหา --}}
@endsection

@push('styles') {{-- CSS เพิ่มเติม --}} @endpush
@push('scripts') {{-- JS เพิ่มเติม --}} @endpush
@push('json_ld') {{-- structured data --}} @endpush
```
