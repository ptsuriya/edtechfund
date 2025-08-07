@extends('layouts.master')

@section('title', 'Homepage - BizLand Bootstrap Template')
@section('meta_description', 'Welcome to our website.')

@section('content')
@include('components.hero')

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <div class="container section-title" data-aos="fade-up">
            <h2>เข้าสู่ระบบ</h2>
            <p><span>เข้าสู่ระบบเพื่อใช้งานRBRU X Edtech Fund</span> <span class="description-title">AI Gateway</span></p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="login-form p-4">
                        <form action="#" method="post" class="php-email-form">

                            <div class="form-group mb-3">
                                <label for="username">ชื่อผู้ใช้</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>

                            <div class="form-group d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        จดจำฉันไว้
                                    </label>
                                </div>
                                <a href="#" class="forgot-password">ลืมรหัสผ่าน?</a>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @include('components.faq')


@endsection
