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
                                    placeholder="ค้นหาจากชื่อ หรือสถานศึกษา">
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
                                            ชื่อ-นามสกุล <i class="bi bi-arrow-down-up ms-1"></i>
                                        </th>
                                        <th class="sortable-head" data-sort-key="work" role="button" tabindex="0">
                                            สถานศึกษา/หน่วยงาน <i class="bi bi-arrow-down-up ms-1"></i>
                                        </th>
                                        <th>สถานะ</th>
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

    @media (max-width: 425px) {
        .index-col {
            width: 72px;
        }

        .table th,
        .table td {
            padding: 0.5rem;
            font-size: 0.9rem;
        }

        .table thead {
            display: none;
        }

        .table tbody tr {
            display: grid;
            grid-template-columns: 56px 1fr;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            margin-bottom: 0.75rem;
            padding: 0.5rem 0.75rem;
        }

        .table tbody td {
            border: none;
            padding: 0.25rem 0;
        }

        .table tbody td.row-index {
            grid-row: 1 / span 2;
            align-self: center;
            font-weight: 600;
        }

        .table tbody td:not(.row-index) {
            display: flex;
            gap: 0.5rem;
        }

        .table tbody td:not(.row-index)::before {
            content: attr(data-label);
            font-weight: 600;
            color: #1f4ea5;
            min-width: 120px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const apiUrl = 'https://script.google.com/macros/s/AKfycbwI8eTmkqHiBECddU6eWgthq9wOUKGP6MJErshlBvZwGKqs4rt1EUSyviHH85jKkPKl/exec?path=API&action=read';
        const tableBody = document.getElementById('register-table-body');
        const searchInput = document.getElementById('register-search');
        const countEl = document.getElementById('register-count');
        const statusEl = document.getElementById('register-status');
        const cacheKey = 'registerNameCache_v2';
        const cacheTtlMs = 5 * 60 * 1000;
        let allRows = [];
        let sortKey = 'index';
        let sortDirection = 'asc';

        function setStatus(message) {
            statusEl.textContent = message;
        }

        function renderSkeleton() {
            tableBody.innerHTML = '';
            for (let i = 0; i < 6; i += 1) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><span class="placeholder col-4"></span></td>
                    <td><span class="placeholder col-8"></span></td>
                    <td><span class="placeholder col-9"></span></td>
                    <td><span class="placeholder col-6"></span></td>
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
                emptyCell.colSpan = 4;
                emptyCell.className = 'text-center text-muted py-4';
                emptyCell.textContent = 'ไม่พบข้อมูลที่ค้นหา';
                emptyRow.appendChild(emptyCell);
                tableBody.appendChild(emptyRow);
                countEl.textContent = '';
                return;
            }

            rows.forEach((item, index) => {
                const plcValues = [item.PLC1, item.PLC2, item.PLC3].map((value) => (value || '').trim());
                const hasAllPlc = plcValues.every((value) => value !== '');
                const downloadLink = (item.Download || '').trim();
                const row = document.createElement('tr');
                const indexCell = document.createElement('td');
                indexCell.textContent = index + 1;
                indexCell.setAttribute('data-label', 'ลำดับ');
                indexCell.classList.add('row-index');
                const nameCell = document.createElement('td');
                nameCell.textContent = item.Name || '-';
                nameCell.setAttribute('data-label', 'ชื่อ');
                const workCell = document.createElement('td');
                workCell.textContent = item.WorkStation || '-';
                workCell.setAttribute('data-label', 'สถานศึกษา/หน่วยงาน');
                const statusCell = document.createElement('td');
                statusCell.setAttribute('data-label', 'สถานะ');
                if (!hasAllPlc) {
                    const link = document.createElement('a');
                    link.href = 'https://forms.gle/26ETVb7RZKnhJq6JA';
                    link.target = '_blank';
                    link.rel = 'noopener';
                    link.className = 'btn btn-sm btn-primary';
                    link.textContent = 'บันทึกข้อมูล PLC';
                    statusCell.appendChild(link);
                } else if (!downloadLink) {
                    const badge = document.createElement('span');
                    badge.className = 'badge bg-warning text-dark';
                    badge.textContent = 'กำลังจัดทำใบประกาศ';
                    statusCell.appendChild(badge);
                } else {
                    const link = document.createElement('a');
                    link.href = downloadLink;
                    link.target = '_blank';
                    link.rel = 'noopener';
                    link.className = 'btn btn-sm btn-success';
                    link.textContent = 'รับใบประกาศ';
                    statusCell.appendChild(link);
                }
                row.appendChild(indexCell);
                row.appendChild(nameCell);
                row.appendChild(workCell);
                row.appendChild(statusCell);
                tableBody.appendChild(row);
            });

            countEl.textContent = `ทั้งหมด ${rows.length} รายชื่อ`;
        }

        function applyFilter() {
            const keyword = searchInput.value.trim().toLowerCase();
            const filtered = allRows
                .filter((item) => {
                    const name = (item.Name || '').trim();
                    const work = (item.WorkStation || '').trim();
                    return name !== '' || work !== '';
                })
                .filter((item) => {
                    if (!keyword) {
                        return true;
                    }
                    const name = (item.Name || '').toLowerCase();
                    const work = (item.WorkStation || '').toLowerCase();
                    return name.includes(keyword) || work.includes(keyword);
                });
            const sorted = [...filtered].sort((a, b) => {
                if (sortKey === 'index') {
                    return 0;
                }
                const valueA = sortKey === 'name' ? (a.Name || '') : (a.WorkStation || '');
                const valueB = sortKey === 'name' ? (b.Name || '') : (b.WorkStation || '');
                const result = valueA.localeCompare(valueB, 'th', { sensitivity: 'base' });
                return sortDirection === 'asc' ? result : -result;
            });
            renderRows(sorted);
        }

        async function loadData() {
            renderSkeleton();
            setStatus('กำลังดึงข้อมูล...');
            try {
                const cached = JSON.parse(sessionStorage.getItem(cacheKey) || 'null');
                if (cached && Date.now() - cached.timestamp < cacheTtlMs && Array.isArray(cached.data)) {
                    allRows = cached.data;
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
                errorCell.colSpan = 4;
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
