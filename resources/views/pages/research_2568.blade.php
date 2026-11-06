@extends('layouts.master')

@section('title', 'ผลงานวิจัยกองทุน ปีงบประมาณ 2568 | RBRU X Edtech Fund AI Gateway')
@section('meta_description', 'เผยแพร่ผลงานวิจัยที่แล้วเสร็จของกองทุน ประจำปีงบประมาณ พ.ศ. 2568')

@push('json_ld')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "ผลงานวิจัยกองทุน ปีงบประมาณ 2568",
        "description": "เผยแพร่ผลงานวิจัยที่แล้วเสร็จของกองทุน ประจำปีงบประมาณ พ.ศ. 2568",
        "url": "{{ route('research_2568') }}",
        "inLanguage": "th-TH"
    }
</script>
@endpush

@section('content')
@include('components.headbanner')

<section id="research-2568" class="section py-5 bg-white">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>ผลงานวิจัยกองทุน</h2>
            <p><span class="description-title">ปีงบประมาณ พ.ศ. 2568</span></p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="fs-5 mb-4">
                    กองทุนขอเผยแพร่และประชาสัมพันธ์ผลงานวิจัยที่แล้วเสร็จของกองทุน
                    ประจำปีงบประมาณ พ.ศ. 2568
                </p>

                <a href="https://drive.google.com/drive/folders/1zlGgsjLNAZSBA54ExtqY6i0PS1ekurmr?usp=drive_link"
                   class="btn btn-warning btn-lg px-5 py-3 fw-bold shadow"
                   style="border-radius:50px;" target="_blank" rel="noopener">
                    <i class="bi bi-folder2-open me-2"></i>เปิดโฟลเดอร์ผลงานวิจัย
                </a>

                <div class="mt-5">
                    <img src="{{ asset('img/qr_research_2568.png') }}"
                         alt="QR Code สำหรับเปิดโฟลเดอร์ผลงานวิจัย ปีงบประมาณ 2568"
                         class="img-fluid border rounded p-2 bg-white" style="max-width:240px;" loading="lazy">
                    <p class="text-secondary small mt-2 mb-0">สแกน QR Code เพื่อเปิดโฟลเดอร์ผลงานวิจัย</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
