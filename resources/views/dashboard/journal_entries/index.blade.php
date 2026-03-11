@extends('layouts.container')
@section('title', 'قيود اليومية')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--single {
        height: 45px;
        padding: 8px 12px;
        border: 1px solid #ced4da;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 43px;
    }
    .modal-body .table td, .modal-body .table th {
        vertical-align: middle;
    }
</style>
@endsection

@section('content' )
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">قيود اليومية</h1>
            <p class="mb-0 text-muted">سجل لجميع المعاملات المالية في النظام.</p>
        </div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addEntryModal">
            <i class="fas fa-plus"></i> إضافة قيد يومية
        </button>
    </div>

    <!-- Filters -->
    <div class="card card-custom mb-4">
        <div class="card-body">
            <form action="{{ route('dashboard.journal-entries.index') }}" method="GET" class="row align-items-end">
                <div class="col-md-5">
                    <label for="search">ابحث بالرقم المرجعي أو البيان..</label>
                    <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="بحث...">
                </div>
                <div class="col-md-3">
                    <label for="date_from">من:</label>
                    <input type="date" name="date_from" id="date_from" class="form-control" value="{{ request('date_from') }}">
                </div>
                <div class="col-md-3">
                    <label for="date_to">إلى:</label>
                    <input type="date" name="date_to" id="date_to" class="form-control" value="{{ request('date_to') }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-secondary w-100">فلتر</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="card card-custom">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>التاريخ</th>
                            <th>البيان</th>
                            <th>التفاصيل</th>
                            <th>الإجمالي</th>
                            <th>تحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($journalEntries as $entry)
                            <tr>
                                <td>{{ $entry->id }}</td>
                                <td>{{ $entry->date->format('Y-m-d') }}</td>
                                <td>{{ $entry->description }}</td>
                                <td>
                                    @foreach($entry->items as $item)
                                        <div class="small">
                                            <span class="text-info">{{ $item->account->name }}</span>:
                                            @if($item->debit > 0)
                                                <span class="text-success">مدين بـ {{ number_format($item->debit, 2) }}</span>
                                            @else
                                                <span class="text-danger">دائن بـ {{ number_format($item->credit, 2) }}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </td>
                                <td>{{ number_format($entry->items->sum('debit'), 2) }}</td>
                                <td>
                                    <form action="{{ route('dashboard.journal-entries.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا القيد؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-light-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    <h4>لا توجد قيود يومية للعرض.</h4>
                                    <p>يمكنك البدء بإضافة قيد جديد.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($journalEntries->hasPages())
                <div class="mt-4">{{ $journalEntries->links() }}</div>
            @endif
        </div>
    </div>
</div>

<!-- Add Entry Modal -->
@include('dashboard.journal_entries.partials.add_modal', ['accounts' => $accounts])

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function ( ) {
        // تهيئة Select2 داخل الـ Modal
        $('#addEntryModal').on('shown.bs.modal', function () {
            $('.select2-account').select2({
                dropdownParent: $('#addEntryModal'),
                placeholder: "اختر أو اكتب اسم الحساب",
                width: '100%'
            });
        });

        // إضافة سطر جديد في جدول القيد
        const addRowBtn = document.getElementById('add-row');
        const tableBody = document.getElementById('journal-items-body');
        let rowCounter = tableBody.rows.length;

        addRowBtn.addEventListener('click', function () {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <select name="items[${rowCounter}][account_id]" class="form-control select2-account" required>
                        <option></option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->name }} ({{ $account->code }})</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="items[${rowCounter}][debit]" class="form-control debit-input" step="0.01" placeholder="0.00"></td>
                <td><input type="number" name="items[${rowCounter}][credit]" class="form-control credit-input" step="0.01" placeholder="0.00"></td>
                <td><button type="button" class="btn btn-sm btn-light-danger remove-row"><i class="fas fa-trash"></i></button></td>
            `;
            tableBody.appendChild(newRow);

            // إعادة تهيئة Select2 على السطر الجديد
            $(newRow).find('.select2-account').select2({
                dropdownParent: $('#addEntryModal'),
                placeholder: "اختر أو اكتب اسم الحساب",
                width: '100%'
            });

            rowCounter++;
            updateTotals();
        });

        // حذف سطر من جدول القيد
        tableBody.addEventListener('click', function (e) {
            if (e.target.closest('.remove-row')) {
                e.target.closest('tr').remove();
                updateTotals();
            }
        });

        // حساب الإجماليات
        function updateTotals() {
            let totalDebit = 0;
            let totalCredit = 0;
            document.querySelectorAll('#journal-items-body tr').forEach(row => {
                const debit = parseFloat(row.querySelector('.debit-input').value) || 0;
                const credit = parseFloat(row.querySelector('.credit-input').value) || 0;
                totalDebit += debit;
                totalCredit += credit;
            });

            document.getElementById('total-debit').textContent = totalDebit.toFixed(2);
            document.getElementById('total-credit').textContent = totalCredit.toFixed(2);

            const difference = totalDebit - totalCredit;
            const diffEl = document.getElementById('total-difference');
            diffEl.textContent = difference.toFixed(2);
            diffEl.style.color = difference === 0 ? 'green' : 'red';
        }

        // تحديث الإجماليات عند تغيير أي قيمة
        tableBody.addEventListener('input', function(e) {
            if (e.target.classList.contains('debit-input') || e.target.classList.contains('credit-input')) {
                updateTotals();
            }
        });

        // إظهار الـ Modal إذا كانت هناك أخطاء validation
        @if ($errors->any())
            $('#addEntryModal').modal('show');
        @endif
    });
</script>
@endpush
