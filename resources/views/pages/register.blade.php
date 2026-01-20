@extends('layouts.master')

@section('title', 'รับสมัครเข้าโครงการ')
@section('meta_description', 'รับสมัครเข้าโครงการต้นแบบแพลตฟอร์มและบริหารจัดการ การใช้ Generative AI')

@section('content')
@include('components.headbanner')
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm" data-aos="fade-up">
                    <div class="card-body p-4">
                        <div class="text-center mb-5" data-aos="fade-down">
                            <h1 class="fw-bold text-primary mb-3">ขอเชิญชวนเข้าร่วม</h1>
                            <h2 class="h4 mb-4">โครงการต้นแบบแพลตฟอร์มและบริหารจัดการ การใช้ Generative AI <br>และการเสริมสร้างสมรรถนะบุคลากร เพื่อยกระดับการบริหารภาครัฐดิจิทัล <br>และความมั่นคงปลอดภัยของข้อมูลในสถานศึกษา</h2>

                            <a href="{{ route('about_participants') }}" class="btn btn-lg px-5 text-white"
                                style="background: linear-gradient(135deg, #ff4d4d, #ff9f1a); box-shadow: 0 10px 24px rgba(255, 77, 77, 0.35);">
                                <i class="bi bi-list-check me-2"></i>ตรวจสอบรายชื่อผู้เข้าร่วมอบรม
                            </a>

                            <!-- <a href="{{ route('register_name') }}" class="btn btn-lg px-5 text-white"
                                style="background: linear-gradient(135deg, #ff4d4d, #ff9f1a); box-shadow: 0 10px 24px rgba(255, 77, 77, 0.35);">
                                <i class="bi bi-list-check me-2"></i>ตรวจสอบรายชื่อผู้สมัคร
                            </a> -->
                        </div>

                        <div class="row mb-5 justify-content-center">
                            <div class="col-md-8">
                                <h3 class="h5 fw-bold text-secondary border-bottom pb-2 mb-3" data-aos="fade-right">หัวข้อการอบรม</h3>
                                <ul class="list-unstyled" data-aos="fade-right" data-aos-delay="100">
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>การออกแบบแผนการสอนด้วย Generative AI</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>การออกแบบกิจกรรมการเรียนรู้ที่เน้นผู้เรียนเป็นสำคัญด้วย Generative AI</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>การใช้ Generative AI เพื่อการวิจัยในชั้นเรียนอย่างมีจริยธรรม</li>
                                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>การใช้ Generative AI เพื่อลดภาระงานที่ไม่ใช่งานสอน</li>
                                </ul>

                                <h3 class="h5 fw-bold text-secondary border-bottom pb-2 mb-3 mt-4" data-aos="fade-left">วิทยากร</h3>
                                <div class="row mt-4">
                                    <div class="col-md-4 text-center mb-4" data-aos="zoom-in" data-aos-delay="100">
                                        <img src="{{ asset('img/sirinuch.jpg') }}" alt="อาจารย์ ดร.ศิรินุช ศรารัชต์" class="rounded shadow-sm mb-3" style="width: 200px; height: 300px; object-fit: cover; object-position: top center;">
                                        <h5 class="fw-bold text-nowrap">อาจารย์ ดร.ศิรินุช ศรารัชต์</h5>
                                    </div>
                                    <div class="col-md-4 text-center mb-4" data-aos="zoom-in" data-aos-delay="200">
                                        <img src="{{ asset('img/peraya.jpg') }}" alt="อาจารย์ ดร.พีรญา สุขขีวรรณ" class="rounded shadow-sm mb-3" style="width: 200px; height: 300px; object-fit: cover; object-position: top center;">
                                        <h5 class="fw-bold text-nowrap">อาจารย์ ดร.พีรญา สุขขีวรรณ</h5>
                                    </div>
                                    <div class="col-md-4 text-center mb-4" data-aos="zoom-in" data-aos-delay="300">
                                        <img src="{{ asset('img/Punjapath.jpg') }}" alt="คุณปัญจพัฒน์ เกรียงวีระยุทธ" class="rounded shadow-sm mb-3" style="width: 200px; height: 300px; object-fit: cover; object-position: top center;">
                                        <h5 class="fw-bold text-nowrap">คุณปัญจพัฒน์ เกรียงวีระยุทธ</h5>
                                    </div>
                                </div>

                                <h3 class="h5 fw-bold text-secondary border-bottom pb-2 mb-3 mt-4" data-aos="fade-up">คุณสมบัติผู้เข้าอบรม</h3>
                                <ol class="ps-3" data-aos="fade-up" data-aos-delay="100">
                                    <li class="mb-2">มีทักษะการใช้คอมพิวเตอร์เพื่อการทำงาน</li>
                                    <li class="mb-2">มีประสบการณ์ในการใช้แอพพลิเคชั่น</li>
                                    <li class="mb-2">สามารถเข้าร่วม PLC ผ่านออนไลน์เพื่อติดตามผล (จำนวน 3 ครั้ง)</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row bg-light p-4 rounded mb-5" data-aos="fade-up">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <h4 class="fw-bold text-primary"><i class="bi bi-calendar-event me-2"></i>วันและเวลา</h4>
                                <p class="fs-5 mb-1">อบรมวันที่ 27 มกราคม 2569</p>
                                <p class="text-muted"><small>เปิดรับสมัครวันนี้ ถึงวันที่ 19 มกราคม 2569</small></p>
                            </div>
                            <div class="col-md-6">
                                <h4 class="fw-bold text-primary"><i class="bi bi-geo-alt me-2"></i>สถานที่</h4>
                                <p class="fs-5 mb-0">มหาวิทยาลัยราชภัฏรำไพพรรณี ตึก 35</p>
                                <p class="mb-0">ห้องอบรม 35201 และ ห้องปฏิบัติการคอมพิวเตอร์ 35307</p>
                            </div>
                        </div>

                        <div class="row g-3 mb-5" data-aos="fade-up">
                            <div class="col-md-6">
                                <img src="{{ asset('img/35Building.webp') }}" alt="อาคาร 35 มหาวิทยาลัยราชภัฏรำไพพรรณี" class="img-fluid rounded shadow-sm">
                            </div>
                            <div class="col-md-6">
                                <div class="ratio ratio-4x3 h-100">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8751.914369538585!2d102.10126208392838!3d12.657199860058276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310483ec067cb9b5%3A0xa4f9f3c819cd4986!2z4Lit4Liy4LiE4Liy4Lij4LmA4LiJ4Lil4Li04Lih4Lie4Lij4Liw4LmA4LiB4Li14Lii4Lij4LiV4Li04LivIOC4leC4tuC4gSAzNQ!5e1!3m2!1sth!2sth!4v1768280147282!5m2!1sth!2sth" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mb-5" data-aos="fade-up">
                            <span class="badge bg-info text-white fs-5 px-4 py-2 rounded-pill">เปิดรับ 100 ท่านเท่านั้น</span>
                        </div>

                        {{--
                        <div class="text-center mb-5" data-aos="fade-up">
                            <h3 class="fw-bold mb-4">ลงทะเบียนและตรวจสอบรายชื่อ</h3>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfDM0PuBWWLxBQOhLinFXUKHB2ikdHhIta_IvGPZWWLwXhvIA/viewform" target="_blank" class="btn btn-primary btn-lg px-5 rounded-pill shadow">
                                    <i class="bi bi-pencil-square me-2"></i>สมัครเข้าร่วม
                                </a>
                                <a href="https://docs.google.com/spreadsheets/d/1tF7vu2mdmxnOWWgsysGFiWAnD0wtR_knQMNvYZ3YAhE/edit?gid=1763461469#gid=1763461469" target="_blank" class="btn btn-outline-primary btn-lg px-5 rounded-pill shadow">
                                    <i class="bi bi-list-check me-2"></i>ตรวจสอบรายชื่อ
                                </a>
                            </div>

                        </div>
                        --}}

                        <hr>

                        <div class="text-center text-muted mt-4 mb-5" data-aos="fade-up">
                            <p class="mb-1"><strong>สอบถามข้อมูลเพิ่มเติมได้ที่</strong></p>
                            <p class="mb-1">หน่วยฝึกอบรม สำนักวิทยบริการและเทคโนโลยีสารสนเทศ</p>
                            <p class="mb-1"><i class="bi bi-telephone me-1"></i>โทรศัพท์ 039-319111 ต่อ 10990</p>
                            <p><i class="bi bi-envelope me-1"></i>arc@rbru.ac.th</p>
                        </div>

                        <div class="text-center" data-aos="fade-up">
                            <img src="{{ asset('img/NewPoster.jpg') }}" alt="Poster" class="img-fluid rounded shadow" style="max-height: 800px;">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
