@extends('layouts.container')
@section('title', 'تحويل أموال جديد')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
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
    .transfer-card {
        transition: all 0.2s ease-in-out;
        border: 1px solid #e3e6f0;
        border-radius: .5rem;
    }
    .transfer-card:hover {
        border-color: #4e73df;
    }
    .transfer-arrow {
        font-size: 3rem;
        color: #d1d3e2;
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
    .category-header {
        padding: 0.5rem 1rem;
        margin-bottom: 0.5rem;
        border-radius: 0.25rem;
        font-weight: bold;
    }
    .header-cash { background-color: #f6c23e; color: #fff; }
    .header-bank { background-color: #36b9cc; color: #fff; }
    .header-khaled { background-color: #4e73df; color: #fff; }
    .header-mohammed { background-color: #1cc88a; color: #fff; }
    .header-wali { background-color: #e74c3c; color: #fff; }
    .balance-info {
        font-size: 0.8rem;
        color: #6c757d;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">تحويل أموال جديد</h1>
            <p class="mb-0 text-muted">قم بإدخال بيانات التحويل الجديد بين الحسابات.</p>
        </div>
        <a href="{{ route('dashboard.fund-transfers.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-right ml-1"></i>العودة للقائمة
        </a>
    </div>

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle ml-1"></i>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Transfer Form Card -->
    <div class="card shadow-sm">
        <div class="card-header py-3 gradient-bg">
            <h6 class="m-0 font-weight-bold text-white">
                <i class="fas fa-paper-plane ml-1"></i>بيانات التحويل
            </h6>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('dashboard.fund-transfers.store') }}" method="POST">
                @csrf
                <div class="row align-items-center mb-4">
                    <!-- From Account -->
                    <div class="col-lg-5">
                        <div class="card transfer-card">
                            <div class="card-body">
                                <h6 class="font-weight-bold text-primary mb-3">من حساب:</h6>
                                <div class="form-group mb-0">
                                    <select id="from_account" name="from_account" class="form-control select2-search" required>
                                        <option value="">-- اختر الحساب المصدر --</option>

                                        <!-- الكاش -->
                                        <optgroup label="الكاش (الخزائن)">
                                            @foreach($cashSafes as $safe)
                                                <option value="cash-{{ $safe->id }}" {{ old('from_account') == 'cash-'.$safe->id ? 'selected' : '' }}>
                                                    {{ $safe->name }} (الرصيد: {{ number_format($safe->balance, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>

                                        <!-- البنكي -->
                                        <optgroup label="البنكي (الحسابات البنكية)">
                                            @foreach($bankAccounts as $account)
                                                <option value="bank-{{ $account->id }}" {{ old('from_account') == 'bank-'.$account->id ? 'selected' : '' }}>
                                                    {{ $account->account_name }} ({{ $account->bank->name ?? 'بنك' }}) - الرصيد: {{ number_format($account->resolved_balance, 2) }}
                                                </option>
                                            @endforeach
                                        </optgroup>

                                        <!-- خالد -->
                                        @if($khaledVouchers->count() > 0)
                                        <optgroup label="خالد">
                                            @foreach($khaledVouchers as $voucher)
                                                <option value="khaled-{{ $voucher->id }}" {{ old('from_account') == 'khaled-'.$voucher->id ? 'selected' : '' }}>
                                                    {{ $voucher->description ?? 'سند رقم ' . $voucher->id }} (المبلغ: {{ number_format($voucher->amount ?? 0, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        @endif

                                        <!-- محمد -->
                                        @if($mohammedVouchers->count() > 0)
                                        <optgroup label="محمد">
                                            @foreach($mohammedVouchers as $voucher)
                                                <option value="mohammed-{{ $voucher->id }}" {{ old('from_account') == 'mohammed-'.$voucher->id ? 'selected' : '' }}>
                                                    {{ $voucher->description ?? 'سند رقم ' . $voucher->id }} (المبلغ: {{ number_format($voucher->amount ?? 0, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        @endif

                                        <!-- وليد -->
                                        @if($waliVouchers->count() > 0)
                                        <optgroup label="وليد">
                                            @foreach($waliVouchers as $voucher)
                                                <option value="wali-{{ $voucher->id }}" {{ old('from_account') == 'wali-'.$voucher->id ? 'selected' : '' }}>
                                                    {{ $voucher->description ?? 'سند رقم ' . $voucher->id }} (المبلغ: {{ number_format($voucher->amount ?? 0, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Arrow -->
                    <div class="col-lg-2 text-center d-none d-lg-block">
                        <i class="fas fa-long-arrow-alt-right transfer-arrow text-primary"></i>
                    </div>

                    <!-- To Account -->
                    <div class="col-lg-5">
                        <div class="card transfer-card">
                            <div class="card-body">
                                <h6 class="font-weight-bold text-success mb-3">إلى حساب:</h6>
                                <div class="form-group mb-0">
                                    <select id="to_account" name="to_account" class="form-control select2-search" required>
                                        <option value="">-- اختر الحساب الهدف --</option>

                                        <!-- الكاش -->
                                        <optgroup label="الكاش (الخزائن)">
                                            @foreach($cashSafes as $safe)
                                                <option value="cash-{{ $safe->id }}" {{ old('to_account') == 'cash-'.$safe->id ? 'selected' : '' }}>
                                                    {{ $safe->name }} (الرصيد: {{ number_format($safe->balance, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>

                                        <!-- البنكي -->
                                        <optgroup label="البنكي (الحسابات البنكية)">
                                            @foreach($bankAccounts as $account)
                                                <option value="bank-{{ $account->id }}" {{ old('to_account') == 'bank-'.$account->id ? 'selected' : '' }}>
                                                    {{ $account->account_name }} ({{ $account->bank->name ?? 'بنك' }}) - الرصيد: {{ number_format($account->resolved_balance, 2) }}
                                                </option>
                                            @endforeach
                                        </optgroup>

                                        <!-- خالد -->
                                        @if($khaledVouchers->count() > 0)
                                        <optgroup label="خالد">
                                            @foreach($khaledVouchers as $voucher)
                                                <option value="khaled-{{ $voucher->id }}" {{ old('to_account') == 'khaled-'.$voucher->id ? 'selected' : '' }}>
                                                    {{ $voucher->description ?? 'سند رقم ' . $voucher->id }} (المبلغ: {{ number_format($voucher->amount ?? 0, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        @endif

                                        <!-- محمد -->
                                        @if($mohammedVouchers->count() > 0)
                                        <optgroup label="محمد">
                                            @foreach($mohammedVouchers as $voucher)
                                                <option value="mohammed-{{ $voucher->id }}" {{ old('to_account') == 'mohammed-'.$voucher->id ? 'selected' : '' }}>
                                                    {{ $voucher->description ?? 'سند رقم ' . $voucher->id }} (المبلغ: {{ number_format($voucher->amount ?? 0, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        @endif

                                        <!-- وليد -->
                                        @if($waliVouchers->count() > 0)
                                        <optgroup label="وليد">
                                            @foreach($waliVouchers as $voucher)
                                                <option value="wali-{{ $voucher->id }}" {{ old('to_account') == 'wali-'.$voucher->id ? 'selected' : '' }}>
                                                    {{ $voucher->description ?? 'سند رقم ' . $voucher->id }} (المبلغ: {{ number_format($voucher->amount ?? 0, 2) }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row">
                    <div class="col-lg-4 form-group">
                        <label for="amount">المبلغ <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave text-success"></i></span>
                            </div>
                            <input type="number" id="amount" name="amount" class="form-control"
                                   step="0.01" min="0.01"
                                   value="{{ old('amount') }}"
                                   placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="currency">العملة <span class="text-danger">*</span></label>
                        <select id="currency" name="currency" class="form-control" required>
                            <option value="ILS" {{ old('currency') == 'ILS' ? 'selected' : '' }}>ILS - شيكل</option>
                            <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD - دولار</option>
                            <option value="JOD" {{ old('currency') == 'JOD' ? 'selected' : '' }}>JOD - دينار</option>
                        </select>
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="date">تاريخ التحويل <span class="text-danger">*</span></label>
                        <input type="date" id="date" name="date" class="form-control"
                               value="{{ old('date', date('Y-m-d')) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label for="notes">ملاحظات</label>
                        <input type="text" id="notes" name="notes" class="form-control"
                               value="{{ old('notes') }}"
                               placeholder="سبب التحويل (اختياري)">
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-gradient btn-lg px-5 py-2">
                        <i class="fas fa-check ml-1"></i>تنفيذ التحويل
                    </button>
                    <a href="{{ route('dashboard.fund-transfers.index') }}" class="btn btn-secondary btn-lg px-5 py-2 mr-2">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2-search').select2({
            width: '100%',
            dir: 'rtl'
        });
    });
</script>
@endpush
