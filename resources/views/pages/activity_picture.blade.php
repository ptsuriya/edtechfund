@extends('layouts.master')

@section('title', 'รูปภาพกิจกรรม')
@section('meta_description', 'รูปภาพกิจกรรมโครงการ')

@section('content')
    <section class="semi-hero p-0">
        <img src="{{ asset('img/banner.png') }}" alt="">
    </section>

    <section class="section">
        <div class="container">
            <style>
                .drive-cta {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    padding: 18px 36px;
                    border-radius: 14px;
                    background: linear-gradient(135deg, #f97316 0%, #ef4444 55%, #db2777 100%);
                    color: #ffffff;
                    text-decoration: none;
                    font-size: 20px;
                    font-weight: 700;
                    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
                    box-shadow: 0 10px 20px rgba(245, 158, 11, 0.35);
                    transition: transform 180ms ease, box-shadow 180ms ease, filter 180ms ease;
                }
                .drive-cta:hover {
                    background: linear-gradient(135deg, #f59e0b 0%, #f97316 55%, #fb7185 100%);
                    transform: translateY(-2px) scale(1.02);
                    box-shadow: 0 16px 28px rgba(245, 158, 11, 0.45);
                    filter: brightness(1.02);
                }
            </style>

            <div class="section-title mb-4" data-aos="fade-up">
                <h2>รูปภาพกิจกรรม</h2>
                <p>รวมภาพกิจกรรมของโครงการ</p>
            </div>

            <div style="display:flex; justify-content:center; margin:12px 0 20px;">
                <a
                    href="https://drive.google.com/drive/folders/16_ryjK93CWdpv5olC0KECnckoX3xt-2S?usp=sharing"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="drive-cta"
                >
                    เปิดใน Google Drive
                </a>
            </div>

            <p style="margin:0 0 6px; color:#111827; font-weight:700; font-size:16px;">ภาพตัวอย่าง </p>
            <p style="margin:0 0 10px; color:#6b7280; font-size:14px;">หากต้องการดูรูปทั้งหมดหรือดาวน์โหลด แนะนำให้เปิดใน Google Drive</p>
            <div style="position:relative; border:1px solid #e5e7eb; border-radius:12px; overflow:hidden;">
                <iframe
                    src="https://drive.google.com/embeddedfolderview?id=16_ryjK93CWdpv5olC0KECnckoX3xt-2S#grid"
                    style="width:100%; height:560px; border:0;"
                    loading="lazy"
                    title="Google Drive Preview"
                ></iframe>
            </div>
        </div>
    </section>
@endsection
