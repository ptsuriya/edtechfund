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
    @include('components.schedule')
    @include('components.faq')

@endsection
