@extends('layouts.master')

@section('title', 'Homepage - BizLand Bootstrap Template')
@section('meta_description', 'Welcome to our website.')

@section('content')
@include('components.headbanner')
    <section id="team" class="team section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>เกี่ยวกับ</h2>
            <p><span>ที่ปรึกษาโครงการ</span></p>
            {{-- <span class="description-title">Team</span> --}}
        </div>

        <div class="container">
            {{-- Main Member --}}
            <div class="row justify-content-center align-items-center mb-5">
                <div class="col-lg-8 col-md-10 d-flex justify-content-center align-items-center">
                    <div class="team-member main-member">
                        <div class="member-img">
                            <img src="{{ asset($reserchers['main']['image_url']) }}" class="img-fluid"
                                alt="{{ $reserchers['main']['name'] }}">
                            <div class="social">
                                <a href="{{ $reserchers['main']['social']['twitter'] }}"><i class="bi bi-twitter-x"></i></a>
                                <a href="{{ $reserchers['main']['social']['facebook'] }}"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $reserchers['main']['social']['instagram'] }}"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{ $reserchers['main']['social']['linkedin'] }}"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ $reserchers['main']['name'] }}</h4>
                            <span>{{ $reserchers['main']['position'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </hr>
            {{-- Other Members --}}
            <div class="row gy-4">
                @foreach ($reserchers['others'] as $key => $person)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="{{ 100 * ($key + 2) }}">
                        <div class="team-member uniform">
                            <div class="member-img">
                                <img src="{{ asset($person['image_url']) }}" class="img-fluid" alt="{{ $person['name'] }}">
                                <div class="social">
                                    <a href="{{ $person['social']['twitter'] }}"><i class="bi bi-twitter-x"></i></a>
                                    <a href="{{ $person['social']['facebook'] }}"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $person['social']['instagram'] }}"><i class="bi bi-instagram"></i></a>
                                    <a href="{{ $person['social']['linkedin'] }}"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $person['name'] }}</h4>
                                <span>{{ $person['position'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
