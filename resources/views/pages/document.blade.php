@extends('layouts.master')

@section('title', 'RBRU X Edtech Fund AI Gateway')
@section('meta_description', 'Welcome to our website.')

@push('json_ld')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "เอกสารแนบโครงการ",
        "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "item": {
                    "@type": "CreativeWork",
                    "name": "กำหนดการโครงการ",
                    "url": "{{ asset('กำหนดการ Ver.2_4 Modules.docx') }}",
                    "fileFormat": "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                    "inLanguage": "th-TH"
                }
            }
        ]
    }
</script>
@endpush

@section('content')
@include('components.headbanner')
<!-- Attachments Section -->
<section id="attachments" class="section py-5 bg-white">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>เอกสารแนบ</h2>
            <p> <span class="description-title">ไฟล์ประกอบโครงการ</span></p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width:5%;">#</th>

                        <th>คำอธิบาย</th>
                        <th style="width:15%;">ดาวน์โหลด</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>

                        <td>เอกสารประกอบการอบรม โดย ดร.พีรญา สุขขีวรรณ
                            <div class="small text-secondary">(โครงการต้นแบบแพลตฟอร์มและบริหารจัดการ การใช้ Generative AI และการเสริมสร้างสมรรถนะบุคลากรเพื่อยกระดับบริหารภาครัฐดิจิทัลและความมั่นคงปลอดภัยของข้อมูลในสถานศึกษา)</span>
                        </td>
                        <td class="text-center">
                            <a href="https://www.canva.com/design/DAG8YpWzVzY/c2MUvrvxEC0b4EoWT3lFGQ/edit" class="btn btn-sm btn-primary"
                                target="_blank">
                                <i class="bi bi-file-earmark-text"></i> ดาวน์โหลด
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>

                        <td>เอกสารประกอบการบรรยายเกี่ยวกับการใช้งาน ChatX</td>
                        <td class="text-center">
                            <a href="https://www.canva.com/design/DAG-7xnv2Fg/ji7aPjus0TDAVltY_Rclzw/edit" class="btn btn-sm btn-primary"
                                target="_blank">
                                <i class="bi bi-file-earmark-text"></i> ดาวน์โหลด
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>

                        <td>คู่มือการใช้งานระบบ ChatX สำหรับผู้ใช้งาน</td>
                        <td class="text-center">
                            <a href="{{ asset('files/manual_chatx_for_user.pdf') }}" class="btn btn-sm btn-primary"
                                target="_blank">
                                <i class="bi bi-file-earmark-text"></i> ดาวน์โหลด
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>

                        <td>กำหนดการโครงการ</td>
                        <td class="text-center">
                            <a href="{{ asset('กำหนดการ Ver.2_4 Modules.docx') }}" class="btn btn-sm btn-primary"
                                target="_blank">
                                <i class="bi bi-file-earmark-text"></i> ดาวน์โหลด
                            </a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>
</section>

@endsection
