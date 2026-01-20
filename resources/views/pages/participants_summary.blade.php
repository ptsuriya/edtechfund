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
                <div class="text-muted small">แหล่งข้อมูล: storage/app/participants_summary.json</div>
                <div class="text-muted small">ทั้งหมด {{ count($rows) }} รายการ</div>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
                <div class="text-muted small">ค้นหา: ชื่อ, โรงเรียน, เขต</div>
                <div class="w-100 w-md-auto">
                    <label for="participants-search" class="form-label mb-1">ค้นหา</label>
                    <input id="participants-search" type="text" class="form-control"
                        placeholder="พิมพ์ชื่อ โรงเรียน หรือเขต">
                </div>
            </div>

            @php
                $visibleHeaders = $headers ?: ['ลำดับ', 'ชื่อ', 'โรงเรียน', 'เขต'];
                $visibleHeaders = array_slice($visibleHeaders, 0, 4);
                $visibleRows = $rows ?? [];
            @endphp

            @if ($errorMessage)
                <div class="alert alert-warning">{{ $errorMessage }}</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered align-middle participants-table">
                        <colgroup>
                            <col style="width: 80px;">
                            <col style="width: 30%;">
                            <col style="width: 30%;">
                            <col>
                        </colgroup>
                        <thead class="table-light">
                            <tr>
                                @foreach ($visibleHeaders as $index => $header)
                                    <th class="sortable-head" data-sort-key="{{ $index }}" role="button" tabindex="0">
                                        {{ $header !== '' ? $header : 'คอลัมน์ ' . ($index + 1) }}
                                        <i class="bi bi-arrow-down-up ms-1"></i>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="participants-table-body"></tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
<style>
    .participants-table th,
    .participants-table td {
        white-space: normal;
        word-break: break-word;
    }

    .participants-table .row-index {
        font-weight: 600;
        text-align: center;
    }

    .sortable-head {
        cursor: pointer;
        user-select: none;
    }

    @media (max-width: 575px) {
        .participants-table thead {
            display: none;
        }

        .participants-table tbody tr {
            display: grid;
            grid-template-columns: 64px 1fr;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            margin-bottom: 0.75rem;
            padding: 0.5rem 0.75rem;
        }

        .participants-table tbody td {
            border: none;
            padding: 0.25rem 0;
        }

        .participants-table tbody td.row-index {
            grid-row: 1 / span 3;
            align-self: center;
        }

        .participants-table tbody td:not(.row-index) {
            display: flex;
            gap: 0.5rem;
        }

        .participants-table tbody td:not(.row-index)::before {
            content: attr(data-label);
            font-weight: 600;
            color: #1f4ea5;
            min-width: 110px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const headers = @json($visibleHeaders);
        const rows = @json($visibleRows);
        const tableBody = document.getElementById('participants-table-body');
        const searchInput = document.getElementById('participants-search');
        let sortKey = 0;
        let sortDirection = 'asc';

        function renderRows(list) {
            tableBody.innerHTML = '';
            if (!list.length) {
                const emptyRow = document.createElement('tr');
                const emptyCell = document.createElement('td');
                emptyCell.colSpan = Math.max(1, headers.length);
                emptyCell.className = 'text-center text-muted py-4';
                emptyCell.textContent = 'ไม่พบข้อมูล';
                emptyRow.appendChild(emptyCell);
                tableBody.appendChild(emptyRow);
                return;
            }

            list.forEach((row) => {
                const tr = document.createElement('tr');
                row.slice(0, headers.length).forEach((cell, index) => {
                    const td = document.createElement('td');
                    td.textContent = cell !== '' ? cell : '-';
                    td.setAttribute('data-label', headers[index] || `คอลัมน์ ${index + 1}`);
                    if (index === 0) {
                        td.className = 'row-index text-nowrap';
                    }
                    tr.appendChild(td);
                });
                tableBody.appendChild(tr);
            });
        }

        function sortRows(list) {
            return [...list].sort((a, b) => {
                if (sortKey === 0) {
                    const numA = parseInt(a[0], 10) || 0;
                    const numB = parseInt(b[0], 10) || 0;
                    return sortDirection === 'asc' ? numA - numB : numB - numA;
                }
                const valueA = (a[sortKey] || '').toString();
                const valueB = (b[sortKey] || '').toString();
                const result = valueA.localeCompare(valueB, 'th', { sensitivity: 'base' });
                return sortDirection === 'asc' ? result : -result;
            });
        }

        function applyFilter() {
            const keyword = (searchInput.value || '').trim().toLowerCase();
            const filtered = rows.filter((row) => {
                if (!keyword) {
                    return true;
                }
                return row.some((cell) => (cell || '').toString().toLowerCase().includes(keyword));
            });
            renderRows(sortRows(filtered));
        }

        document.querySelectorAll('.sortable-head').forEach((cell) => {
            cell.addEventListener('click', () => {
                const key = parseInt(cell.getAttribute('data-sort-key'), 10);
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

        applyFilter();
    });
</script>
@endpush
