@extends('layouts.master')

@section('title', 'RBRU X Edtech Fund AI Gateway')
@section('meta_description', 'Welcome to our website.')

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
                            <td>1</td>

                            <td>รายงานความก้าวหน้าและการเบิกจ่ายงวดที่ 1</td>
                            <td class="text-center">
                                <a href="{{ asset('files/อว0631.09-0796-ส่งงวด-1.pdf') }}" class="btn btn-sm btn-primary"
                                    target="_blank">
                                    <i class="bi bi-file-earmark-pdf"></i> ดาวน์โหลด
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>

                            <td>รายละเอียดกิจกรรม แผนการใช้จ่าย และงบประมาณ</td>
                            <td class="text-center">
                                <a href="{{ asset('files/แผนปฏิบัติการและแผนการใช้จ่ายเงินโครงการ.pdf') }}"
                                    class="btn btn-sm btn-primary" target="_blank">
                                    <i class="bi bi-file-earmark-pdf"></i> ดาวน์โหลด
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

@endsection
