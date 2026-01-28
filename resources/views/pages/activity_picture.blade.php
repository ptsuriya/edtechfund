@extends('layouts.master')

@section('title', 'รูปภาพกิจกรรม')
@section('meta_description', 'รูปภาพกิจกรรมโครงการ')

@section('content')
    <section class="semi-hero p-0">
        <img src="{{ asset('img/banner.png') }}" alt="">
    </section>

    <section class="section">
        <div class="container">
            <div class="section-title mb-4" data-aos="fade-up">
                <h2>รูปภาพกิจกรรม</h2>
                <p>รวมภาพกิจกรรมของโครงการ</p>
            </div>

            <div style="position:relative; border:1px solid #e5e7eb; border-radius:12px; overflow:hidden;">
                <iframe
                    src="https://drive.google.com/embeddedfolderview?id=16_ryjK93CWdpv5olC0KECnckoX3xt-2S#grid"
                    style="width:100%; height:560px; border:0;"
                    loading="lazy"
                    title="Google Drive Preview"
                ></iframe>

                <div style="position:absolute; inset:0; background:transparent;"></div>
            </div>

            <div style="margin-top:12px; display:flex; justify-content:flex-end;">
                <a
                    href="https://drive.google.com/drive/folders/16_ryjK93CWdpv5olC0KECnckoX3xt-2S?usp=sharing"
                    target="_blank"
                    rel="noopener noreferrer"
                    style="padding:10px 14px; border-radius:10px; background:#111827; color:#fff; text-decoration:none;"
                >
                    ดูทั้งหมดใน Google Drive
                </a>
            </div>
        </div>
    </section>
@endsection
