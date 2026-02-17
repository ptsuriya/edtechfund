@extends('layouts.master')

@section('title', $news['headline'] ?? 'รายละเอียดข่าว')
@section('meta_description', $news['summary'] ?? 'รายละเอียดข่าวประชาสัมพันธ์')

@section('content')
    <section class="semi-hero p-0">
        <img src="{{ asset('img/banner.png') }}" alt="">
    </section>

    <section class="section py-5">
        <div class="container">
            <div class="mb-4">
                <a href="{{ route('news') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left me-1"></i> กลับไปหน้าข่าวทั้งหมด
                </a>
            </div>

            <article class="card shadow-sm border-0">
                @if (!empty($news['image_url']))
                    <img src="{{ $news['image_url'] }}" class="card-img-top" alt="{{ $news['headline'] }}"
                        style="max-height: 460px; object-fit: cover; object-position: top center;">
                @endif

                <div class="card-body p-4 p-md-5">
                    <h1 class="h3 fw-bold mb-3">{{ $news['headline'] }}</h1>

                    <div class="d-flex flex-wrap gap-3 mb-4 text-muted small">
                        @if (!empty($news['start']))
                            <span><i class="bi bi-calendar-event me-1"></i>{{ $news['start'] }}</span>
                        @endif
                        @if (!empty($news['fromnews']))
                            <span><i class="bi bi-building me-1"></i>{{ $news['fromnews'] }}</span>
                        @endif
                    </div>

                    <div class="news-detail-content">
                        {!! $news['detail_html'] ?: '<p>-</p>' !!}
                    </div>

                    @php
                        $attachmentItems = collect($attachments ?? []);
                        $imageAttachments = $attachmentItems->where('is_image', true)->values();
                        $fileAttachments = $attachmentItems->where('is_image', false)->values();
                    @endphp

                    @if ($attachmentItems->isNotEmpty())
                        <hr class="my-4">
                        <h2 class="h5 fw-bold mb-3">ไฟล์แนบข่าว</h2>

                        @if ($imageAttachments->isNotEmpty())
                            <div class="row g-3 mb-4">
                                @foreach ($imageAttachments as $attachment)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="{{ $attachment['url'] }}" target="_blank" rel="noopener" class="d-block">
                                            <img src="{{ $attachment['url'] }}" alt="{{ $attachment['detail'] ?: 'ไฟล์แนบรูปภาพ' }}"
                                                class="img-fluid rounded border">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if ($fileAttachments->isNotEmpty())
                            <div class="list-group">
                                @foreach ($fileAttachments as $attachment)
                                    <a href="{{ $attachment['url'] }}" target="_blank" rel="noopener"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <span class="text-truncate pe-3">
                                            {{ $attachment['detail'] ?: basename(parse_url($attachment['url'], PHP_URL_PATH) ?? $attachment['url']) }}
                                        </span>
                                        <span class="badge text-bg-primary">เปิดไฟล์</span>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
            </article>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .news-detail-content img {
        max-width: 100%;
        height: auto;
    }
</style>
@endpush
