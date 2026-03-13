@extends('layouts.master')

@section('title', 'ตรวจสอบผลการอบรม')
@section('meta_description', 'ตรวจสอบสถานะงาน ความคืบหน้า และเกียรติบัตรผู้เข้าร่วมโครงการ')

@section('content')
@include('components.headbanner')

    <section class="py-4 py-md-5 register-name-page">
        <div class="card shadow-sm mx-3 mx-md-4" data-aos="fade-up">
            <div class="card-body p-3 p-md-4">
                <div class="mb-4">
                    <h1 class="h4 fw-bold text-primary mb-1">Showcase และตรวจสอบผลการอบรม</h1>
                    <p class="text-muted mb-0 small">ข้อมูลอัปเดตจากระบบลงทะเบียน</p>
                </div>

                <ul class="nav nav-tabs register-tabs mb-4" id="register-name-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="showcase-tab" data-bs-toggle="tab"
                            data-bs-target="#showcase-pane" type="button" role="tab" aria-controls="showcase-pane"
                            aria-selected="true">
                            Showcase
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-result-tab" data-bs-toggle="tab"
                            data-bs-target="#register-result-pane" type="button" role="tab"
                            aria-controls="register-result-pane" aria-selected="false">
                            ตรวจสอบผลการอบรม
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="showcase-pane" role="tabpanel"
                        aria-labelledby="showcase-tab" tabindex="0">
                        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-3">
                            <div>
                                <h2 class="h5 fw-semibold mb-1">Showcase</h2>
                                <p class="text-muted mb-0 small">แสดงผลงานพร้อมลิงก์ดาวน์โหลดใบประกาศ</p>
                            </div>
                            <div class="w-100 w-sm-auto" style="max-width:300px;">
                                <label for="showcase-search" class="form-label mb-1">ค้นหาชื่อหรือโรงเรียน</label>
                                <input id="showcase-search" type="text" class="form-control"
                                    placeholder="ค้นหาจากชื่อหรือโรงเรียน">
                            </div>
                        </div>

                        <p class="text-muted small d-md-none mb-2">
                            <i class="bi bi-arrow-left-right me-1"></i>เลื่อนซ้าย-ขวาเพื่อดูข้อมูลเพิ่มเติม
                        </p>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle mb-0">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center index-col">ลำดับ</th>
                                        <th class="name-col">ชื่อ</th>
                                        <th class="school-col">โรงเรียน</th>
                                        <th class="text-center cert-col">URL</th>
                                    </tr>
                                </thead>
                                <tbody id="showcase-table-body">
                                    {{-- filled by JS --}}
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small id="showcase-count" class="text-muted"></small>
                            <small id="showcase-status" class="text-muted fst-italic"></small>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="register-result-pane" role="tabpanel"
                        aria-labelledby="register-result-tab" tabindex="0">
                        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-3">
                            <div>
                                <h2 class="h5 fw-semibold mb-1">ตรวจสอบผลการอบรม</h2>
                                <p class="text-muted mb-0 small">ตรวจสอบสถานะงาน ความคืบหน้า และเกียรติบัตร</p>
                            </div>
                            <div class="w-100 w-sm-auto" style="max-width:300px;">
                                <label for="register-search" class="form-label mb-1">ค้นหาชื่อหรืออีเมล</label>
                                <input id="register-search" type="text" class="form-control"
                                    placeholder="ค้นหาจากชื่อหรืออีเมล">
                            </div>
                        </div>

                        <p class="text-muted small d-md-none mb-2">
                            <i class="bi bi-arrow-left-right me-1"></i>เลื่อนซ้าย-ขวาเพื่อดูข้อมูลเพิ่มเติม
                        </p>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle mb-0">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center index-col">ลำดับ</th>
                                        <th class="name-col">ชื่อ</th>
                                        <th class="mail-col">อีเมล</th>
                                        <th class="text-center work-col">แบบทดสอบ<br>วัดความรู้<br>ก่อนอบรม</th>
                                        <th class="text-center work-col">แบบทดสอบ<br>วัดความรู้<br>หลังอบรม</th>
                                        <th class="text-center work-col">แบบประเมิน<br>การยอมรับระบบ</th>
                                        <th class="text-center work-col">แบบประเมิน<br>ความพึงพอใจ</th>
                                        <th class="text-center work-col">แบบสอบถาม<br>ทักษะครู</th>
                                        <th class="text-center plc-col">PLC1</th>
                                        <th class="text-center plc-col">PLC2</th>
                                        <th class="text-center cert-col">Certificate</th>
                                    </tr>
                                </thead>
                                <tbody id="main-table-body">
                                    {{-- filled by JS --}}
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small id="register-count" class="text-muted"></small>
                            <small id="register-status" class="text-muted fst-italic"></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('styles')
<style>
    /* ── wrapper ── */
    .register-name-page {
        min-height: 50vh;
    }

    /* ── responsive scroll ── */
    .register-name-page .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        /* subtle scroll shadow hint */
        background:
            linear-gradient(to right, white 30%, rgba(255,255,255,0)) left,
            linear-gradient(to left,  white 30%, rgba(255,255,255,0)) right,
            radial-gradient(farthest-side at 0 50%, rgba(0,0,0,.12), transparent) left,
            radial-gradient(farthest-side at 100% 50%, rgba(0,0,0,.12), transparent) right;
        background-repeat: no-repeat;
        background-size: 60px 100%, 60px 100%, 16px 100%, 16px 100%;
        background-attachment: local, local, scroll, scroll;
    }

    .register-name-page table {
        min-width: 1100px;
    }

    .register-name-page .table td {
        white-space: nowrap;
        font-size: 0.9rem;
    }

    .register-name-page .table th {
        white-space: normal;
        vertical-align: middle;
        font-size: 0.85rem;
    }

    /* ── columns ── */
    .index-col {
        width: 58px;
        min-width: 58px;
    }

    .name-col {
        min-width: 150px;
        max-width: 220px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .mail-col {
        min-width: 170px;
        max-width: 210px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #6c757d;
        font-size: 0.82rem;
    }

    .school-col {
        min-width: 220px;
        max-width: 320px;
        white-space: normal;
    }

    .work-col {
        width: 110px;
        min-width: 100px;
    }

    .plc-col {
        width: 72px;
        min-width: 66px;
    }

    .cert-col {
        min-width: 190px;
        width: 190px;
    }

    /* ── mobile card padding ── */
    @media (max-width: 575.98px) {
        .register-name-page .card-body {
            padding: 0.875rem !important;
        }
    }

    .emoji-status {
        font-size: 1.25rem;
        line-height: 1;
    }

    .not-eligible {
        color: #dc3545;
        font-size: 0.82rem;
        font-weight: 600;
        white-space: normal;
        line-height: 1.3;
    }

    .preparing-cert {
        color: #6c757d;
        font-size: 0.82rem;
    }

    .register-tabs .nav-link {
        font-weight: 600;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const API_BASE_URL = 'https://script.google.com/macros/s/AKfycbwjvpSTxxBE3gBp2yAQhAGvkbSJ2O3gokaX0SQ6NWhv_LXvfon6CiKIoY4YWvDGCAq-9g/exec?action=read&path=';
    const CACHE_TTL = 5 * 60 * 1000;

    const showcaseState = {
        apiUrl: API_BASE_URL + 'Showcase',
        cacheKey: 'registerNameShowcaseCache_v1',
        totalCols: 4,
        tableBody: document.getElementById('showcase-table-body'),
        searchInput: document.getElementById('showcase-search'),
        countEl: document.getElementById('showcase-count'),
        statusEl: document.getElementById('showcase-status'),
        allRows: []
    };

    const registerState = {
        apiUrl: API_BASE_URL + 'API',
        cacheKey: 'registerNameCache_v5',
        totalCols: 11,
        tableBody: document.getElementById('main-table-body'),
        searchInput: document.getElementById('register-search'),
        countEl: document.getElementById('register-count'),
        statusEl: document.getElementById('register-status'),
        allRows: []
    };

    /* ─── helpers ─── */

    function setStatus(state, msg) {
        state.statusEl.textContent = msg;
    }

    function getNameValue(item) {
        return String(
            item?.Name ?? item?.name ?? item?.ชื่อ ?? item?.FullName ?? item?.fullname ?? ''
        ).trim();
    }

    function getMailValue(item) {
        return String(
            item?.mail ?? item?.Mail ?? item?.email ?? item?.Email ?? ''
        ).trim();
    }

    function getField(item, key) {
        const variants = [
            key,
            key.toLowerCase(),
            key.toUpperCase(),
            key.charAt(0).toUpperCase() + key.slice(1)
        ];
        for (const v of variants) {
            if (item && Object.prototype.hasOwnProperty.call(item, v)) {
                return String(item[v] ?? '').trim();
            }
        }
        return '';
    }

    function getSchoolValue(item) {
        return String(
            item?.School ?? item?.school ?? item?.SchoolName ?? item?.school_name ?? ''
        ).trim();
    }

    function normalizeUrl(raw) {
        if (!raw) return '';
        const t = String(raw).trim();
        if (!t) return '';
        return /^https?:\/\//i.test(t) ? t : `https://${t.replace(/^\/+/, '')}`;
    }

    /** value === '1' → ✅   อื่น → ❌ */
    function emojiCell(value) {
        return value === '1'
            ? '<span class="emoji-status" title="ส่งแล้ว" aria-label="ส่งแล้ว">✅</span>'
            : '<span class="emoji-status" title="ยังไม่ส่ง" aria-label="ยังไม่ส่ง">❌</span>';
    }

    /* ─── skeleton ─── */

    function renderSkeleton(state) {
        state.tableBody.innerHTML = '';
        for (let i = 0; i < 8; i++) {
            const tr = document.createElement('tr');
            tr.innerHTML = Array(state.totalCols)
                .fill('<td><span class="placeholder col-8 rounded"></span></td>')
                .join('');
            state.tableBody.appendChild(tr);
        }
        state.countEl.textContent = '';
    }

    /* ─── render rows ─── */

    function renderShowcaseRows(state, rows) {
        state.tableBody.innerHTML = '';

        if (!rows.length) {
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            td.colSpan  = state.totalCols;
            td.className = 'text-center text-muted py-4';
            td.textContent = 'ไม่พบข้อมูลที่ค้นหา';
            tr.appendChild(td);
            state.tableBody.appendChild(tr);
            return;
        }

        rows.forEach(function (item, idx) {
            const certUrl = normalizeUrl(item?.URL ?? item?.url ?? '');
            const tr = document.createElement('tr');

            const tdIdx = document.createElement('td');
            tdIdx.className = 'text-center';
            tdIdx.textContent = getField(item, 'No') || idx + 1;
            tr.appendChild(tdIdx);

            const tdName = document.createElement('td');
            tdName.textContent = getNameValue(item) || '-';
            tr.appendChild(tdName);

            const tdSchool = document.createElement('td');
            tdSchool.className = 'school-col';
            tdSchool.textContent = getSchoolValue(item) || '-';
            tr.appendChild(tdSchool);

            const tdCert = document.createElement('td');
            tdCert.className = 'text-center';

            if (!certUrl) {
                tdCert.innerHTML = '<span class="preparing-cert">ยังไม่มีลิงก์ใบประกาศ</span>';
            } else {
                const btn = document.createElement('a');
                btn.href = certUrl;
                btn.target = '_blank';
                btn.rel = 'noopener noreferrer';
                btn.className = 'btn btn-sm btn-success';
                btn.innerHTML = '<i class="bi bi-download me-1"></i>ดาวน์โหลดใบประกาศ';
                tdCert.appendChild(btn);
            }

            tr.appendChild(tdCert);
            state.tableBody.appendChild(tr);
        });
    }

    function renderRegisterRows(state, rows) {
        state.tableBody.innerHTML = '';

        if (!rows.length) {
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            td.colSpan  = state.totalCols;
            td.className = 'text-center text-muted py-4';
            td.textContent = 'ไม่พบข้อมูลที่ค้นหา';
            tr.appendChild(td);
            state.tableBody.appendChild(tr);
            return;
        }

        const WORK_KEYS = ['work1', 'work2', 'work3', 'work4', 'work5'];
        const PLC_KEYS  = ['PLC1', 'PLC2'];

        rows.forEach(function (item, idx) {
            const wVals = WORK_KEYS.map(k => getField(item, k));
            const pVals = PLC_KEYS.map(k  => getField(item, k));

            // เงื่อนไขสิทธิ์เกียรติบัตร
            const worksAllDone = wVals.every(v => v === '1');  // ข้อ 3-7 ครบทุกข้อ
            const plcAllDone   = pVals.every(v => v === '1');  // ข้อ 8-9 ครบทุกข้อ
            const eligible     = worksAllDone || plcAllDone;

            const cert1Url = normalizeUrl(item?.Certificate1 ?? item?.Certificate ?? '');

            const tr = document.createElement('tr');

            // 1. ลำดับ
            const tdIdx = document.createElement('td');
            tdIdx.className = 'text-center';
            tdIdx.textContent = idx + 1;
            tr.appendChild(tdIdx);

            // 2. ชื่อ
            const tdName = document.createElement('td');
            tdName.textContent = getNameValue(item) || '-';
            tr.appendChild(tdName);

            // 3. อีเมล
            const tdMail = document.createElement('td');
            tdMail.className = 'mail-col';
            tdMail.textContent = getMailValue(item) || '-';
            tr.appendChild(tdMail);

            // 4-8. work1–work5 (emoji)
            wVals.forEach(function (val) {
                const td = document.createElement('td');
                td.className = 'text-center';
                td.innerHTML = emojiCell(val);
                tr.appendChild(td);
            });

            // 8-9. PLC1–PLC2 (emoji)
            pVals.forEach(function (val) {
                const td = document.createElement('td');
                td.className = 'text-center';
                td.innerHTML = emojiCell(val);
                tr.appendChild(td);
            });

            // 10. Certificate
            const tdCert = document.createElement('td');
            tdCert.className = 'text-center';

            if (!eligible) {
                tdCert.innerHTML = '<span class="not-eligible">คุณไม่มีสิทธิ์<br>ได้รับเกียรติบัตร</span>';
            } else if (!cert1Url) {
                tdCert.innerHTML = '<span class="preparing-cert">กำลังจัดทำใบประกาศ</span>';
            } else {
                const btn = document.createElement('a');
                btn.href      = cert1Url;
                btn.target    = '_blank';
                btn.rel       = 'noopener noreferrer';
                btn.className = 'btn btn-sm btn-success';
                btn.innerHTML = '<i class="bi bi-download me-1"></i>ดาวน์โหลดใบประกาศ';
                tdCert.appendChild(btn);
            }

            tr.appendChild(tdCert);
            state.tableBody.appendChild(tr);
        });
    }

    /* ─── filter ─── */

    function applyShowcaseFilter() {
        const kw = showcaseState.searchInput.value.trim().toLowerCase();
        const filtered = showcaseState.allRows
            .filter(item => getNameValue(item) !== '')
            .filter(item => {
                if (!kw) return true;
                return getNameValue(item).toLowerCase().includes(kw)
                    || getSchoolValue(item).toLowerCase().includes(kw);
            });

        renderShowcaseRows(showcaseState, filtered);
        showcaseState.countEl.textContent = filtered.length
            ? `แสดงทั้งหมด ${filtered.length} รายการ`
            : '';
    }

    function applyRegisterFilter() {
        const kw = registerState.searchInput.value.trim().toLowerCase();
        const filtered = registerState.allRows
            .filter(item => getNameValue(item) !== '')
            .filter(item => {
                if (!kw) return true;
                return getNameValue(item).toLowerCase().includes(kw)
                    || getMailValue(item).toLowerCase().includes(kw);
            });

        renderRegisterRows(registerState, filtered);
        registerState.countEl.textContent = filtered.length
            ? `แสดงทั้งหมด ${filtered.length} รายการ`
            : '';
    }

    /* ─── load data ─── */

    async function loadData(state, onFilter) {
        renderSkeleton(state);
        setStatus(state, 'กำลังดึงข้อมูล…');

        try {
            const cached = JSON.parse(sessionStorage.getItem(state.cacheKey) || 'null');
            if (cached && Date.now() - cached.timestamp < CACHE_TTL && Array.isArray(cached.data)) {
                state.allRows = cached.data;
                onFilter();
                setStatus(state, 'แสดงผลจากข้อมูลที่โหลดไว้');
            }

            const res = await fetch(state.apiUrl, { cache: 'no-store' });
            if (!res.ok) throw new Error('HTTP ' + res.status);

            const payload = await res.json();
            const data = Array.isArray(payload?.data) ? payload.data
                       : Array.isArray(payload)        ? payload
                       : null;
            if (!data) throw new Error('รูปแบบข้อมูลไม่ถูกต้อง');

            state.allRows = data;
            sessionStorage.setItem(state.cacheKey, JSON.stringify({ timestamp: Date.now(), data }));
            onFilter();
            setStatus(state, 'อัปเดตล่าสุดเรียบร้อย');

        } catch (err) {
            state.tableBody.innerHTML = '';
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            td.colSpan   = state.totalCols;
            td.className = 'text-center text-danger py-4';
            td.textContent = 'ไม่สามารถโหลดข้อมูลได้ โปรดลองใหม่ภายหลัง';
            tr.appendChild(td);
            state.tableBody.appendChild(tr);
            state.countEl.textContent = '';
            setStatus(state, '');
        }
    }

    showcaseState.searchInput.addEventListener('input', applyShowcaseFilter);
    registerState.searchInput.addEventListener('input', applyRegisterFilter);

    loadData(showcaseState, applyShowcaseFilter);
    loadData(registerState, applyRegisterFilter);
});
</script>
@endpush
