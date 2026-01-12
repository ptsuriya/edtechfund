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

    @include('components.pricing')
    @include('components.schedule')
    @include('components.faq')

    <!-- Auto-Show Modal -->
    <div class="modal fade" id="autoShowModal" tabindex="-1" aria-labelledby="autoShowModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent border-0 position-relative">
                <button
                    type="button"
                    class="btn btn-primary rounded-circle shadow-lg border-0 position-absolute top-0 end-0 m-3 p-0 d-flex align-items-center justify-content-center"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    style="width: 3.5rem; height: 3.5rem; z-index: 1060;">
                    <span class="fs-1 text-white lh-1" aria-hidden="true">×</span>
                </button>
                <div class="modal-body p-0">
                    <a href="{{ route('register') }}">
                        <img src="{{ asset('img/NewPosterpopup.jpg') }}" class="img-fluid rounded shadow-lg w-100" alt="EdTech Fund">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('autoShowModal'));
            myModal.show();
        });
    </script>

@endsection
