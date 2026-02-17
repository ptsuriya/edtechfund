@extends('layouts.master')

@section('title', 'ข่าวประชาสัมพันธ์')
@section('meta_description', 'ข่าวประชาสัมพันธ์โครงการ EdTech Fund')

@section('content')
    <section class="semi-hero p-0">
        <img src="{{ asset('img/banner.png') }}" alt="">
    </section>

    <section class="section py-5">
        <div class="container">
            <h1 class="fw-bold mb-4">ข่าวประชาสัมพันธ์</h1>

            <div id="news-grid" class="row g-3"></div>
            <div id="news-empty" class="alert alert-secondary d-none">ยังไม่มีข่าวประชาสัมพันธ์</div>

            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="News pagination">
                    <ul id="news-pagination" class="pagination mb-0"></ul>
                </nav>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allNews = @json($newsItems ?? []);
        const grid = document.getElementById('news-grid');
        const pagination = document.getElementById('news-pagination');
        const emptyEl = document.getElementById('news-empty');
        let currentPage = 1;

        function perPageByViewport() {
            const width = window.innerWidth;
            if (width >= 1200) return 16;
            if (width >= 992) return 12;
            if (width >= 768) return 6;
            return 4;
        }

        function escapeHtml(text) {
            return (text || '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function buildCard(item) {
            const image = item.image_url
                ? `<img src="${item.image_url}" class="card-img-top" alt="${escapeHtml(item.headline || '')}" style="height: 180px; object-fit: cover; object-position: top center;" loading="lazy">`
                : '';
            const start = item.start
                ? `<p class="small text-secondary mb-3"><i class="bi bi-calendar-event me-1"></i>${escapeHtml(item.start)}</p>`
                : '';

            return `
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card shadow-sm border-0 h-100">
                        ${image}
                        <div class="card-body d-flex flex-column">
                            <h6 class="fw-bold mb-2" style="line-height:1.4;">${escapeHtml(item.headline || '-')}</h6>
                            <p class="text-muted small mb-2">${escapeHtml(item.summary || '-')}</p>
                            ${start}
                            <a href="/detelnews/${item.id}" class="btn btn-outline-primary btn-sm mt-auto">อ่านเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
            `;
        }

        function renderPagination(totalPages) {
            pagination.innerHTML = '';
            if (totalPages <= 1) return;

            const prevDisabled = currentPage <= 1 ? ' disabled' : '';
            pagination.insertAdjacentHTML('beforeend', `
                <li class="page-item${prevDisabled}">
                    <a class="page-link" href="#" data-page="${currentPage - 1}">ก่อนหน้า</a>
                </li>
            `);

            for (let i = 1; i <= totalPages; i += 1) {
                const active = i === currentPage ? ' active' : '';
                pagination.insertAdjacentHTML('beforeend', `
                    <li class="page-item${active}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>
                `);
            }

            const nextDisabled = currentPage >= totalPages ? ' disabled' : '';
            pagination.insertAdjacentHTML('beforeend', `
                <li class="page-item${nextDisabled}">
                    <a class="page-link" href="#" data-page="${currentPage + 1}">ถัดไป</a>
                </li>
            `);

            pagination.querySelectorAll('a[data-page]').forEach((link) => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const page = Number(this.getAttribute('data-page') || '1');
                    if (!Number.isFinite(page) || page < 1 || page > totalPages || page === currentPage) {
                        return;
                    }
                    currentPage = page;
                    render();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });
        }

        function render() {
            const perPage = perPageByViewport();
            const totalPages = Math.max(1, Math.ceil(allNews.length / perPage));
            if (currentPage > totalPages) {
                currentPage = totalPages;
            }

            const start = (currentPage - 1) * perPage;
            const pageItems = allNews.slice(start, start + perPage);

            grid.innerHTML = pageItems.map(buildCard).join('');
            emptyEl.classList.toggle('d-none', pageItems.length > 0);
            renderPagination(totalPages);
        }

        render();
        window.addEventListener('resize', render);
    });
</script>
@endpush
