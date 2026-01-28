@extends('layouts.master')

@section('title', 'เอกสารประกอบโครงการ')
@section('meta_description', 'เอกสารประกอบโครงการและสื่อการอบรม')

@push('json_ld')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "name": "เอกสารประกอบโครงการ",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@type": "CreativeWork",
                        "name": "คู่มือการใช้ ChatX",
                        "url": "{{ asset('files/manual_chatx_for_user.pdf') }}",
                        "fileFormat": "application/pdf",
                        "inLanguage": "th-TH"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@type": "CreativeWork",
                        "name": "Unesco Slide 1 (PDF)",
                        "url": "{{ asset('files/UNESCO.pdf') }}",
                        "fileFormat": "application/pdf",
                        "inLanguage": "th-TH"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "item": {
                        "@type": "CreativeWork",
                        "name": "Unesco Slide 2",
                        "url": "https://www.canva.com/design/DAG_htiQ5m8/U_219UiUuIl3SE9wAFtEPA/edit?utm_content=DAG_htiQ5m8&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton",
                        "inLanguage": "th-TH"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 4,
                    "item": {
                        "@type": "CreativeWork",
                        "name": "Unesco Poster",
                        "url": "{{ asset('files/Unesco.jpg') }}",
                        "fileFormat": "image/jpeg",
                        "inLanguage": "th-TH"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 5,
                    "item": {
                        "@type": "CreativeWork",
                        "name": "สไลด์อบรมโดย อาจารย์ ดร.พีรญา สุขขีวรรณ",
                        "url": "https://www.canva.com/design/DAG8YpWzVzY/c2MUvrvxEC0b4EoWT3lFGQ/edit?utm_content=DAG8YpWzVzY&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton",
                        "inLanguage": "th-TH"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 6,
                    "item": {
                        "@type": "CreativeWork",
                        "name": "AI Prompt Library",
                        "url": "https://script.google.com/macros/s/AKfycbyoLCoReRj5Dkl1PpA0I9RYbLeirl1AdQz4mXMW2I2RvN4MALxvW4dGuMR-fKNz_rgx/exec",
                        "inLanguage": "th-TH"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 7,
                    "item": {
                        "@type": "CreativeWork",
                        "name": "สไลด์อบรมโดย นายปัญจพัฒน์ เกรียงวีระยุทธ",
                        "url": "https://www.canva.com/design/DAG-7xnv2Fg/ji7aPjus0TDAVltY_Rclzw/edit?utm_content=DAG-7xnv2Fg&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton",
                        "inLanguage": "th-TH"
                    }
                }
            ]
        }
    </script>
@endpush

@section('content')
@include('components.headbanner')
@push('styles')
    <style>
        .helpbook-actions {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            align-items: stretch;
            width: 100%;
        }

        .helpbook-actions .btn {
            width: 100%;
            min-height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 600;
            letter-spacing: 0.1px;
        }

        .helpbook-actions .btn i {
            font-size: 1rem;
        }
    </style>
@endpush
    <section id="helpbook" class="section py-5 bg-white">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>เอกสารประกอบโครงการ</h2>
                <p><span>ไฟล์ประกอบ</span> <span class="description-title">สำหรับผู้เข้าร่วม</span></p>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width:5%;">#</th>
                            <th>คำอธิบาย</th>
                            <th style="width:20%;">ดาวน์โหลด / ลิงก์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>คู่มือการใช้ ChatX</td>
                            <td class="text-center">
                                <div class="helpbook-actions">
                                    <a href="{{ asset('files/manual_chatx_for_user.pdf') }}" class="btn btn-sm btn-primary" target="_blank" rel="noopener">
                                        <i class="bi bi-file-earmark-pdf"></i> ดาวน์โหลด
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>
                                ดร.ศิรินุช ศรารัชต์ ผู้อำนวยธุรกิจภาคการศึกษา บริษัทเอสเอพี ประเทศไทย<br>
                                หัวข้อ Unesco
                            </td>
                            <td class="text-center">
                                <div class="helpbook-actions">
                                    <a href="{{ asset('files/UNESCO.pdf') }}" class="btn btn-sm btn-primary" target="_blank" rel="noopener">
                                        <i class="bi bi-file-earmark-pdf"></i> Slide 1 (PDF)
                                    </a>
                                    <a href="https://www.canva.com/design/DAG_htiQ5m8/U_219UiUuIl3SE9wAFtEPA/edit?utm_content=DAG_htiQ5m8&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" class="btn btn-sm btn-outline-primary" target="_blank" rel="noopener">
                                        <i class="bi bi-file-earmark-text"></i> Slide 2
                                    </a>
                                    <a href="{{ asset('files/Unesco.jpg') }}" class="btn btn-sm btn-outline-primary" target="_blank" rel="noopener">
                                        <i class="bi bi-image"></i> โปสเตอร์
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>
                                อาจารย์ ดร.พีรญา สุขขีวรรณ<br>
                                หัวหน้าสาขาวิชาเทคโนโลยีธุรกิจดิจิทัล วิทยาลัยเทคนิคจันทบุรี
                            </td>
                            <td class="text-center">
                                <div class="helpbook-actions">
                                    <a href="https://www.canva.com/design/DAG8YpWzVzY/c2MUvrvxEC0b4EoWT3lFGQ/edit?utm_content=DAG8YpWzVzY&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" class="btn btn-sm btn-primary" target="_blank" rel="noopener">
                                        <i class="bi bi-file-earmark-text"></i> Slide
                                    </a>
                                    <a href="https://script.google.com/macros/s/AKfycbyoLCoReRj5Dkl1PpA0I9RYbLeirl1AdQz4mXMW2I2RvN4MALxvW4dGuMR-fKNz_rgx/exec" class="btn btn-sm btn-outline-primary" target="_blank" rel="noopener">
                                        <i class="bi bi-link-45deg"></i> AI Prompt Library
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>
                                นายปัญจพัฒน์ เกรียงวีระยุทธ<br>
                                Gen AI Trainer บริษัท Go Digit
                            </td>
                            <td class="text-center">
                                <div class="helpbook-actions">
                                    <a href="https://www.canva.com/design/DAG-7xnv2Fg/ji7aPjus0TDAVltY_Rclzw/edit?utm_content=DAG-7xnv2Fg&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" class="btn btn-sm btn-primary" target="_blank" rel="noopener">
                                        <i class="bi bi-file-earmark-text"></i> Slide
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
