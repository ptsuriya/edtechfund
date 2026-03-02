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
