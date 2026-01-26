@extends('layouts.master')

@section('title', 'ตรวจสอบรายชื่อผู้สมัคร')
@section('meta_description', 'ตรวจสอบรายชื่อผู้สมัครเข้าร่วมโครงการจากระบบ')

@section('content')
@include('components.headbanner')
    <section class="container py-5 register-name-page">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm" data-aos="fade-up">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
                            <div>
                                <h1 class="h4 fw-bold text-primary mb-1">ตรวจสอบรายชื่อผู้สมัครเข้าร่วมโครงการ</h1>
                                <p class="text-muted mb-0">ข้อมูลอัปเดตจากระบบลงทะเบียน</p>
                            </div>
                            <div class="w-100 w-md-auto">
                                <label for="register-search" class="form-label mb-1">ค้นหารายชื่อ</label>
                                <input id="register-search" type="text" class="form-control"
                                    placeholder="ค้นหาจากชื่อ">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="sortable-head index-col" data-sort-key="index" role="button" tabindex="0">
                                            ลำดับ <i class="bi bi-arrow-down-up ms-1"></i>
                                        </th>
                                        <th class="sortable-head" data-sort-key="name" role="button" tabindex="0">
                                            ชื่อ <i class="bi bi-arrow-down-up ms-1"></i>
                                        </th>
                                        <th>PLC1</th>
                                        <th>PLC2</th>
                                        <th class="d-none" data-col="certificate1">Certificate1</th>
                                        <th class="d-none" data-col="showcase">Showcase</th>
                                        <th class="d-none" data-col="certificate2">Certificate2</th>
                                    </tr>
                                </thead>
                                <tbody id="register-table-body"></tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small id="register-count" class="text-muted"></small>
                            <small id="register-status" class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
<style>
    .index-col {
        width: 90px;
        white-space: nowrap;
    }

    .sortable-head {
        cursor: pointer;
        user-select: none;
    }

    .register-name-page .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .register-name-page table {
        min-width: 980px;
    }

    .register-name-page .table th,
    .register-name-page .table td {
        white-space: nowrap;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const apiUrl = 'https://script.google.com/macros/s/AKfycbwjvpSTxxBE3gBp2yAQhAGvkbSJ2O3gokaX0SQ6NWhv_LXvfon6CiKIoY4YWvDGCAq-9g/exec?action=read&path=API';
        const tableBody = document.getElementById('register-table-body');
        const searchInput = document.getElementById('register-search');
        const countEl = document.getElementById('register-count');
        const statusEl = document.getElementById('register-status');
        const cacheKey = 'registerNameCache_v3';
        const cacheTtlMs = 5 * 60 * 1000;
        let allRows = [];
        let sortKey = 'index';
        let sortDirection = 'asc';
        let showCertificate1 = false;
        let showShowcase = false;
        let showCertificate2 = false;

        function setStatus(message) {
            statusEl.textContent = message;
        }

        function toggleColumnVisibility(column, isVisible) {
            document.querySelectorAll(`[data-col="${column}"]`).forEach((el) => {
                el.classList.toggle('d-none', !isVisible);
            });
        }

        function getVisibleColumnCount() {
            return 4
                + (showCertificate1 ? 1 : 0)
                + (showShowcase ? 1 : 0)
                + (showCertificate2 ? 1 : 0);
        }

        function updateColumnVisibility() {
            toggleColumnVisibility('certificate1', showCertificate1);
            toggleColumnVisibility('showcase', showShowcase);
            toggleColumnVisibility('certificate2', showCertificate2);
        }

        function computeColumnVisibility(rows) {
            showCertificate1 = rows.some((item) => String(item?.Certificate1 ?? item?.Certificate ?? '').trim() !== '');
            showShowcase = rows.some((item) => String(item?.Showcase ?? '').trim() !== '');
            showCertificate2 = rows.some((item) => String(item?.Certificate2 ?? '').trim() !== '');
            updateColumnVisibility();
        }

        function renderSkeleton() {
            tableBody.innerHTML = '';
            for (let i = 0; i < 6; i += 1) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><span class="placeholder col-4"></span></td>
                    <td><span class="placeholder col-8"></span></td>
                    <td><span class="placeholder col-6"></span></td>
                    <td><span class="placeholder col-6"></span></td>
                    ${showCertificate1 ? '<td data-col="certificate1"><span class="placeholder col-7"></span></td>' : ''}
                    ${showShowcase ? '<td data-col="showcase"><span class="placeholder col-7"></span></td>' : ''}
                    ${showCertificate2 ? '<td data-col="certificate2"><span class="placeholder col-7"></span></td>' : ''}
                `;
                tableBody.appendChild(row);
            }
            countEl.textContent = '';
        }

        function renderRows(rows) {
            tableBody.innerHTML = '';
            if (!rows.length) {
                const emptyRow = document.createElement('tr');
                const emptyCell = document.createElement('td');
                emptyCell.colSpan = getVisibleColumnCount();
                emptyCell.className = 'text-center text-muted py-4';
                emptyCell.textContent = 'ไม่พบข้อมูลที่ค้นหา';
                emptyRow.appendChild(emptyCell);
                tableBody.appendChild(emptyRow);
                countEl.textContent = '';
                return;
            }

            rows.forEach((item, index) => {
                const plcValues = [item.PLC1, item.PLC2].map((value) => String(value ?? '').trim());
                const hasAllPlc = plcValues.every((value) => value === '1');
                const certificate1Link = normalizeUrl(item.Certificate1 || item.Certificate || '');
                const certificate2Link = normalizeUrl(item.Certificate2 || '');
                const showcaseValue = String(item.Showcase ?? '').trim();
                const row = document.createElement('tr');
                const indexCell = document.createElement('td');
                indexCell.textContent = index + 1;
                indexCell.setAttribute('data-label', 'ลำดับ');
                indexCell.classList.add('row-index');
                const nameCell = document.createElement('td');
                nameCell.textContent = item.Name || '-';
                nameCell.setAttribute('data-label', 'ชื่อ');
                const plcCells = plcValues.map((value, plcIndex) => {
                    const cell = document.createElement('td');
                const label = `PLC${plcIndex + 1}`;
                    cell.setAttribute('data-label', label);
                    cell.textContent = value === '1' ? 'ส่งแล้ว' : 'ยังไม่ได้ส่ง';
                    return cell;
                });
                const certificate1Cell = document.createElement('td');
                certificate1Cell.setAttribute('data-label', 'Certificate1');
                certificate1Cell.setAttribute('data-col', 'certificate1');
                if (!hasAllPlc) {
                    certificate1Cell.textContent = 'ยังส่ง PLC ไม่ครบ';
                } else if (!certificate1Link) {
                    certificate1Cell.textContent = 'กำลังจัดทำใบประกาศ';
                } else {
                    const link = document.createElement('a');
                    link.href = certificate1Link;
                    link.target = '_blank';
                    link.rel = 'noopener';
                    link.className = 'btn btn-sm btn-outline-primary';
                    link.textContent = 'ดาวน์โหลดใบประกาศ';
                    certificate1Cell.appendChild(link);
                }
                const showcaseCell = document.createElement('td');
                showcaseCell.setAttribute('data-label', 'Showcase');
                showcaseCell.setAttribute('data-col', 'showcase');
                if (showcaseValue === '1') {
                    showcaseCell.innerHTML = '<span class="fw-semibold text-success">ยินดีด้วย! ได้รับเลือกนำเสนอ 11 มีนาคม 2569</span>';
                } else {
                    showcaseCell.textContent = '';
                }
                const certificate2Cell = document.createElement('td');
                certificate2Cell.setAttribute('data-label', 'Certificate2');
                certificate2Cell.setAttribute('data-col', 'certificate2');
                if (certificate2Link) {
                    const link = document.createElement('a');
                    link.href = certificate2Link;
                    link.target = '_blank';
                    link.rel = 'noopener';
                    link.className = 'btn btn-sm btn-outline-primary';
                    link.textContent = 'ดาวน์โหลดใบประกาศ';
                    certificate2Cell.appendChild(link);
                } else {
                    certificate2Cell.textContent = '';
                }
                certificate1Cell.classList.toggle('d-none', !showCertificate1);
                showcaseCell.classList.toggle('d-none', !showShowcase);
                certificate2Cell.classList.toggle('d-none', !showCertificate2);
                row.appendChild(indexCell);
                row.appendChild(nameCell);
                plcCells.forEach((cell) => row.appendChild(cell));
                row.appendChild(certificate1Cell);
                row.appendChild(showcaseCell);
                row.appendChild(certificate2Cell);
                tableBody.appendChild(row);
            });

            countEl.textContent = `ทั้งหมด ${rows.length} รายชื่อ`;
        }

        function applyFilter() {
            const keyword = searchInput.value.trim().toLowerCase();
            const filtered = allRows
                .filter((item) => {
                    const name = (item.Name || '').trim();
                    return name !== '';
                })
                .filter((item) => {
                    if (!keyword) {
                        return true;
                    }
                    const name = (item.Name || '').toLowerCase();
                    return name.includes(keyword);
                });
            const sorted = [...filtered].sort((a, b) => {
                if (sortKey === 'index') {
                    return 0;
                }
                const valueA = (a.Name || '');
                const valueB = (b.Name || '');
                const result = valueA.localeCompare(valueB, 'th', { sensitivity: 'base' });
                return sortDirection === 'asc' ? result : -result;
            });
            renderRows(sorted);
        }

        function normalizeUrl(rawUrl) {
            if (!rawUrl) {
                return '';
            }
            const trimmed = String(rawUrl).trim();
            if (!trimmed) {
                return '';
            }
            if (/^https?:\/\//i.test(trimmed)) {
                return trimmed;
            }
            return `https://${trimmed.replace(/^\/+/, '')}`;
        }

        async function loadData() {
            renderSkeleton();
            setStatus('กำลังดึงข้อมูล...');
            try {
                const cached = JSON.parse(sessionStorage.getItem(cacheKey) || 'null');
                if (cached && Date.now() - cached.timestamp < cacheTtlMs && Array.isArray(cached.data)) {
                    allRows = cached.data;
                    computeColumnVisibility(allRows);
                    applyFilter();
                    setStatus('แสดงผลจากข้อมูลที่โหลดไว้');
                }

                const response = await fetch(apiUrl, { cache: 'no-store' });
                if (!response.ok) {
                    throw new Error('โหลดข้อมูลไม่สำเร็จ');
                }
                const payload = await response.json();
                const data = Array.isArray(payload?.data) ? payload.data : (Array.isArray(payload) ? payload : null);
                if (!data) {
                    throw new Error('รูปแบบข้อมูลไม่ถูกต้อง');
                }
                allRows = data;
                computeColumnVisibility(allRows);
                sessionStorage.setItem(cacheKey, JSON.stringify({
                    timestamp: Date.now(),
                    data
                }));
                applyFilter();
                setStatus('อัปเดตล่าสุดเรียบร้อย');
            } catch (error) {
                tableBody.innerHTML = '';
                const errorRow = document.createElement('tr');
                const errorCell = document.createElement('td');
                errorCell.colSpan = getVisibleColumnCount();
                errorCell.className = 'text-center text-danger py-4';
                errorCell.textContent = 'ไม่สามารถโหลดข้อมูลได้ โปรดลองใหม่ภายหลัง';
                errorRow.appendChild(errorCell);
                tableBody.appendChild(errorRow);
                countEl.textContent = '';
                setStatus('');
            }
        }

        searchInput.addEventListener('input', applyFilter);
        function toggleSortForKey(key) {
            if (sortKey === key) {
                sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                sortKey = key;
                sortDirection = 'asc';
            }
            applyFilter();
        }

        document.querySelectorAll('.sortable-head').forEach((cell) => {
            cell.addEventListener('click', () => {
                const key = cell.getAttribute('data-sort-key');
                if (sortKey === key) {
                    sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
                } else {
                    sortKey = key;
                    sortDirection = 'asc';
                }
                applyFilter();
            });
            cell.addEventListener('keydown', (event) => {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    const key = cell.getAttribute('data-sort-key');
                    toggleSortForKey(key);
                }
            });
        });

        loadData();
    });
</script>
@endpush
