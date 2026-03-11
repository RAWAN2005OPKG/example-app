@extends('layouts.container')
@section('title', 'تحويل الأموال')

@section('styles')
{{-- استدعاء مكتبة Select2 للتصميم الأنيق للقوائم المنسدلة --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /* تعديلات لجعل Select2 متوافقاً مع تصميم Bootstrap */
    .select2-container .select2-selection--single {
        height: calc(1.5em + .75rem + 2px );
        padding: .375rem .75rem;
        border: 1px solid #d1d3e2;
        border-radius: .35rem;
        background-color: #fff;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: calc(1.5em + .75rem);
    }
    .input-group-text {
        background-color: #f8f9fc;
        border-color: #d1d3e2;
    }
    .card-header.gradient-bg {
        background: linear-gradient(to right, #4e73df, #36b9cc);
        color: white;
    }
    .transfer-card {
        transition: all 0.2s ease-in-out;
        border: 1px solid #e3e6f0;
        border-radius: .5rem;
    }
    .transfer-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15) !important;
        border-color: #4e73df;
    }
    .transfer-arrow {
        font-size: 3rem;
        color: #d1d3e2;
        transition: color 0.2s ease-in-out;
    }
    .main-transfer-card:hover .transfer-arrow {
        color: #4e73df;
    }
    .btn-gradient {
        background-image: linear-gradient(to right, #1cc88a 0%, #17a673 51%, #1cc88a 100%);
        color: white;
        transition: 0.5s;
        background-size: 200% auto;
        border: none;
        border-radius: .35rem;
    }
    .btn-gradient:hover {
        background-position: right center;
        color: #fff;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">تحويل الأموال بين الحسابات</h1>
            <p class="mb-0 text-muted">قم بإجراء تحويل جديد أو استعرض سجل التحويلات السابقة.</p>
        </div>
    </div>

    <!-- Main Transfer Card -->
    <div class="card shadow-sm mb-4 main-transfer-card">
        <div class="card-header py-3 gradient-bg">
            <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-paper-plane mr-2"></i>عملية تحويل جديدة</h6>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('dashboard.fund-transfers.store') }}" method="POST">
                @csrf
                <div class="row align-items-center">
                    {{-- From Account Card --}}
                    <div class="col-lg-5">
                        <div class="card transfer-card">
                            <div class="card-body">
                                <h6 class="font-weight-bold text-primary">من حساب:</h6>
                                <div class="form-group mb-0">
                                    <select id="from_account" name="from_account" class="form-control select2-search" required>
                                        <option value="">-- اختر الحساب المصدر --</option>
                                        <optgroup label="الخزائن النقدية">
                                            @foreach($cashSafes as $safe)
                                                <option value="cash-{{ $safe->id }}">
                                                    {{ $safe->name }} (الرصيد: {{ number_format($safe->balance, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="الحسابات البنكية">
                                            @foreach($bankAccounts as $account)
                                                <option value="bank-{{ $account->id }}">
                                                    {{ $account->account_name }} ({{ $account->bank_name }}) (الرصيد: {{ number_format($account->balance, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Arrow Icon --}}
                    <div class="col-lg-2 text-center d-none d-lg-block">
                        <i class="fas fa-long-arrow-alt-right transfer-arrow"></i>
                    </div>

                    {{-- To Account Card --}}
                    <div class="col-lg-5">
                        <div class="card transfer-card">
                            <div class="card-body">
                                <h6 class="font-weight-bold text-success">إلى حساب:</h6>
                                <div class="form-group mb-0">
                                    <select id="to_account" name="to_account" class="form-control select2-search" required>
                                        <option value="">-- اختر الحساب الهدف --</option>
                                        <optgroup label="الخزائن النقدية">
                                            @foreach($cashSafes as $safe)
                                                <option value="cash-{{ $safe->id }}">{{ $safe->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="الحسابات البنكية">
                                            @foreach($bankAccounts as $account)
                                                <option value="bank-{{ $account->id }}">{{ $account->account_name }} ({{ $account->bank_name }})</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row">
                    <div class="col-lg-5 form-group">
                        <label for="amount">المبلغ والعملة</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave text-success"></i></span>
                            </div>
                            <input type="number" id="amount" name="amount" class="form-control" step="0.01" placeholder="0.00" required>
                            <select id="currency" name="currency" class="form-control" required style="max-width: 120px;">
                                <option value="SAR" selected>SAR</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label for="date">تاريخ التحويل</label>
                        <input type="date" id="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="notes">ملاحظات</label>
                        <input type="text" id="notes" name="notes" class="form-control" placeholder="سبب التحويل (اختياري)">
                    </div>
                </div>

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-gradient btn-lg shadow-sm px-5 py-2">تنفيذ التحويل</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Recent Transfers Table Card -->
    <div class="card shadow-sm">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-history mr-2"></i>سجل التحويلات</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" style="font-size: 0.9rem;">
                    <thead class="thead-light">
                        <tr>
                            <th>التاريخ</th>
                            <th>المبلغ</th>
                            <th>من</th>
                            <th>إلى</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transfers as $transfer)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($transfer->date)->format('Y-m-d') }}</td>
                                <td class="font-weight-bold text-success">{{ number_format($transfer->amount, 2) }} <span class="text-muted small">{{$transfer->currency}}</span></td>
                                <td>{{ $transfer->fromAccountName }}</td>
                                <td>{{ $transfer->toAccountName }}</td>
                                <td>{{ $transfer->notes ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle fa-2x mb-2 text-gray-400"></i>
                                    <p class="mb-0">لا توجد عمليات تحويل سابقة لعرضها.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- استدعاء JavaScript الخاص بمكتبة Select2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document ).ready(function() {
        $('.select2-search').select2({
            width: '100%'
        });
    });
</script>
@endpush
