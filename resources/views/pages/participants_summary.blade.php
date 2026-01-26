@extends('layouts.master')

@section('title', 'สรุปรายชื่อผู้เข้าร่วมวิจัย')
@section('meta_description', 'สรุปรายชื่อผู้เข้าร่วมวิจัยจากไฟล์ข้อมูล')

@section('content')
    @include('components.headbanner')

    <section id="participants" class="section py-5 bg-white">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>สรุปรายชื่อผู้เข้าร่วมวิจัย</h2>
                <p><span class="description-title">รายชื่อครูแยกตามสังกัด</span></p>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
                <div class="text-muted small">แหล่งข้อมูล: ระบบลงทะเบียน</div>
                <div id="participants-count" class="text-muted small"></div>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
                <div class="text-muted small">ค้นหา: ชื่อ, โรงเรียน</div>
                <div class="w-100 w-md-auto">
                    <label for="participants-search" class="form-label mb-1">ค้นหา</label>
                    <input id="participants-search" type="text" class="form-control"
                        placeholder="พิมพ์ชื่อหรือโรงเรียน">
                </div>
            </div>
            <div class="text-muted small d-md-none mb-3">เลื่อนซ้าย-ขวาเพื่อดูตารางทั้งหมด</div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle participants-table">
                    <colgroup>
                        <col style="width: 45%;">
                        <col style="width: 55%;">
                    </colgroup>
                    <thead class="table-light">
                        <tr>
                            <th class="sortable-head" data-sort-key="name" role="button" tabindex="0">
                                ชื่อ <i class="bi bi-arrow-down-up ms-1"></i>
                            </th>
                            <th class="sortable-head" data-sort-key="school" role="button" tabindex="0">
                                โรงเรียน <i class="bi bi-arrow-down-up ms-1"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="participants-table-body"></tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <small id="participants-count-footer" class="text-muted"></small>
                <small id="participants-status" class="text-muted"></small>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .participants-table th,
    .participants-table td {
        white-space: nowrap !important;
        word-break: normal !important;
        overflow-wrap: normal !important;
    }

    .participants-table .row-index {
        font-weight: 600;
        text-align: center;
    }

    .sortable-head {
        cursor: pointer;
        user-select: none;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .participants-table {
        min-width: 640px;
        table-layout: auto;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const apiUrl = 'https://script.google.com/macros/s/AKfycbwjvpSTxxBE3gBp2yAQhAGvkbSJ2O3gokaX0SQ6NWhv_LXvfon6CiKIoY4YWvDGCAq-9g/exec?action=read&path=API';
        const tableBody = document.getElementById('participants-table-body');
        const searchInput = document.getElementById('participants-search');
        const countEl = document.getElementById('participants-count');
        const countFooterEl = document.getElementById('participants-count-footer');
        const statusEl = document.getElementById('participants-status');
        const cacheKey = 'participantsSummaryCache_v1';
        const cacheTtlMs = 5 * 60 * 1000;
        let allRows = [];
        let sortKey = 'school';
        let sortDirection = 'asc';

        function setStatus(message) {
            statusEl.textContent = message;
        }

        function renderSkeleton() {
            tableBody.innerHTML = '';
            for (let i = 0; i < 6; i += 1) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><span class="placeholder col-8"></span></td>
                    <td><span class="placeholder col-10"></span></td>
                `;
                tableBody.appendChild(row);
            }
            countEl.textContent = '';
            countFooterEl.textContent = '';
        }

        function renderRows(list) {
            tableBody.innerHTML = '';
            if (!list.length) {
                const emptyRow = document.createElement('tr');
                const emptyCell = document.createElement('td');
                emptyCell.colSpan = 2;
                emptyCell.className = 'text-center text-muted py-4';
                emptyCell.textContent = 'ไม่พบข้อมูล';
                emptyRow.appendChild(emptyCell);
                tableBody.appendChild(emptyRow);
                countEl.textContent = '';
                countFooterEl.textContent = '';
                return;
            }

            list.forEach((row) => {
                const tr = document.createElement('tr');
                const nameCell = document.createElement('td');
                nameCell.textContent = row.name || '-';
                nameCell.setAttribute('data-label', 'ชื่อ');
                const schoolCell = document.createElement('td');
                schoolCell.textContent = row.school || '-';
                schoolCell.setAttribute('data-label', 'โรงเรียน');
                tr.appendChild(nameCell);
                tr.appendChild(schoolCell);
                tableBody.appendChild(tr);
            });

            const countText = `ทั้งหมด ${list.length} รายชื่อ`;
            countEl.textContent = countText;
            countFooterEl.textContent = countText;
        }

        function sortRows(list) {
            return [...list].sort((a, b) => {
                const valueA = (a[sortKey] || '').toString();
                const valueB = (b[sortKey] || '').toString();
                const result = valueA.localeCompare(valueB, 'th', { sensitivity: 'base' });
                return sortDirection === 'asc' ? result : -result;
            });
        }

        function applyFilter() {
            const keyword = (searchInput.value || '').trim().toLowerCase();
            const filtered = allRows.filter((row) => {
                if (!keyword) {
                    return true;
                }
                return [row.name, row.school]
                    .some((cell) => (cell || '').toString().toLowerCase().includes(keyword));
            });
            renderRows(sortRows(filtered));
        }

        function pickValue(item, keys) {
            for (const key of keys) {
                if (Object.prototype.hasOwnProperty.call(item, key)) {
                    const value = item[key];
                    if (value !== null && value !== undefined && String(value).trim() !== '') {
                        return String(value).trim();
                    }
                }
            }
            return '';
        }

        function mapRows(data) {
            return data
                .map((item) => {
                    if (!item || typeof item !== 'object') {
                        return null;
                    }
                    const name = pickValue(item, ['Name', 'name', 'ชื่อ', 'ชื่อ-สกุล', 'FullName', 'fullname']);
                    const school = pickValue(item, ['School', 'school', 'SchoolName', 'school_name', 'โรงเรียน', 'สถานศึกษา', 'ชื่อโรงเรียน']);
                    if (!name && !school) {
                        return null;
                    }
                    return { name, school };
                })
                .filter(Boolean);
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
                allRows = mapRows(data);
                sessionStorage.setItem(cacheKey, JSON.stringify({
                    timestamp: Date.now(),
                    data: allRows
                }));
                applyFilter();
                setStatus('อัปเดตล่าสุดเรียบร้อย');
            } catch (error) {
                tableBody.innerHTML = '';
                const errorRow = document.createElement('tr');
                const errorCell = document.createElement('td');
                errorCell.colSpan = 2;
                errorCell.className = 'text-center text-danger py-4';
                errorCell.textContent = 'ไม่สามารถโหลดข้อมูลได้ โปรดลองใหม่ภายหลัง';
                errorRow.appendChild(errorCell);
                tableBody.appendChild(errorRow);
                countEl.textContent = '';
                countFooterEl.textContent = '';
                setStatus('');
            }
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
                    cell.click();
                }
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', applyFilter);
        }

        loadData();
    });
</script>
@endpush
