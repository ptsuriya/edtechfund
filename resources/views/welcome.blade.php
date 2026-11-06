@extends('layouts.master')

@section('title', 'RBRU X Edtech Fund AI Gateway')
@section('meta_description', 'Welcome to our website.')

@push('json_ld')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "RBRU X Edtech Fund AI Gateway",
            "description": "แพลตฟอร์ม AI Gateway สำหรับครูและบุคลากรทางการศึกษา ร่วมกับ RBRU และ EdTech Fund",
            "url": "{{ url('/') }}",
            "inLanguage": "th-TH",
            "primaryImageOfPage": {
                "@type": "ImageObject",
                "url": "{{ asset('img/edtech-1200x800.webp') }}"
            }
        }
    </script>
@endpush

@section('content')
@include('components.hero')

    {{-- @include('components.pricing') --}}
    @include('components.home-media-news')

    {{-- Section: ประชาสัมพันธ์ผลงานวิจัยกองทุน ปีงบประมาณ 2568 --}}
    <section id="research-2568-promo" class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center g-4">
                <div class="col-lg-6 text-center text-lg-start" data-aos="fade-up">
                    <h2 class="fw-bold mb-2" style="font-family:'Kanit',sans-serif;">
                        ผลงานวิจัยกองทุน ปีงบประมาณ 2568
                    </h2>
                    <p class="fs-5 text-secondary mb-4">
                        กองทุนขอเผยแพร่และประชาสัมพันธ์ผลงานวิจัยที่แล้วเสร็จของกองทุน
                        ประจำปีงบประมาณ พ.ศ. 2568
                    </p>
                    <a href="{{ route('research_2568') }}"
                       class="btn btn-warning btn-lg px-5 py-3 fw-bold shadow" style="border-radius:50px;">
                        <i class="bi bi-folder2-open me-2"></i>ดูผลงานวิจัย
                    </a>
                </div>
                <div class="col-lg-3 col-6 text-center" data-aos="fade-up">
                    <img src="{{ asset('img/qr_research_2568.png') }}"
                         alt="QR Code ผลงานวิจัยกองทุน ปีงบประมาณ 2568"
                         class="img-fluid border rounded p-2 bg-white" style="max-width:200px;" loading="lazy">
                    <p class="small text-secondary mt-2 mb-0">สแกนเพื่อเปิดโฟลเดอร์</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section: ตรวจสอบผลการอบรม (แทน schedule) --}}
    <section id="check-results" class="py-5"
        style="background: linear-gradient(135deg, #0d2b55 0%, #1a5276 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center py-4" data-aos="fade-up">
                    <div class="mb-3" aria-hidden="true" style="font-size:3rem; line-height:1;">🎓</div>
                    <h2 class="fw-bold text-white mb-2" style="font-family:'Kanit',sans-serif;">
                        ตรวจสอบผลการอบรม
                    </h2>
                    <p class="mb-4 fs-5" style="color:rgba(255,255,255,0.75);">
                        ตรวจสอบสถานะงาน ความคืบหน้า และเกียรติบัตรของท่าน
                    </p>
                    <a href="{{ route('register_name') }}"
                       class="btn btn-warning btn-lg px-5 py-3 fw-bold shadow"
                       style="font-size:1.15rem; border-radius:50px; letter-spacing:.4px;">
                        <i class="bi bi-search me-2"></i>ตรวจสอบผลการอบรม
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('components.faq')

@endsection
