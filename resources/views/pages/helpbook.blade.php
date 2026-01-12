@extends('layouts.master')

@section('title', 'RBRU X Edtech Fund AI Gateway')
@section('meta_description', 'Welcome to our website.')

@push('json_ld')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "CreativeWork",
            "name": "คู่มือการใช้งาน (กำลังจัดทำ)",
            "url": "{{ url('/helpbook') }}",
            "inLanguage": "th-TH"
        }
    </script>
@endpush

@section('content')
@include('components.headbanner')
    <section>
        <h1 class="text-center mt-5">
            เร็วๆนี้ | Comingsoon</h1>
    </section>
@endsection
