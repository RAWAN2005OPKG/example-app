@extends('layouts.container')
@section('title', 'كشف حساب: ' . $bankAccount->account_name)

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-landmark"></i> {{ $bankAccount->account_name }} ({{ $bankAccount->bank_name }})</h1>
            <p class="text-muted mb-0">رقم الحساب: {{ $bankAccount->account_number }}</p>
        </div>
        <a href="{{ route('dashboard.bank-accounts.index') }}" class="btn btn-secondary">العودة لقائمة الحسابات</a>
    </div>

    <!-- Balance Card -->
    <div class="card card-custom gutter-b bg-primary text-white">
        <div class="card-body text-center">
            <h3 class="text-white">الرصيد الحالي</h3>
            <div class="display-4 font-weight-bolder">{{ number_format($bankAccount->balance, 2) }}</div>
            <span class="text-white-50">الرصيد يتم تحديثه تلقائياً بعد كل حركة</span>
        </div>
    </div>

    <!-- Form Container -->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">تسجيل حركة بنكية جديدة</h3>
        </div>
        <form class="form" action="{{ route('dashboard.bank-accounts.transactions.store', $bankAccount->id) }}" method="POST">
            @csrf
            <div class="card-body">
                @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                {{-- الحقول الأساسية --}}
                <div class="row">
                    <div class="col-md-3 form-group"><label>تاريخ الحركة <span class="text-danger">*</span></label><input type="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" required></div>
                    <div class="col-md-3 form-group"><label>نوع الحركة <span class="text-danger">*</span></label><select name="type" class="form-control" required><option value="deposit">إيداع</option><option value="withdrawal">سحب نقدي</option><option value="transfer">حوالة بنكية</option><option value="personal_withdrawal">مسحوبات شخصية</option></select></div>
                    <div class="col-md-3 form-group"><label>المبلغ <span class="text-danger">*</span></label><input type="number" name="amount" class="form-control" step="0.01" required value="{{ old('amount') }}"></div>
                    <div class="col-md-3 form-group"><label>العملة <span class="text-danger">*</span></label><select name="currency" class="form-control" required><option value="SAR">ريال سعودي</option><option value="USD">دولار أمريكي</option></select></div>
                </div>

                <div class="separator separator-dashed my-5"></div>
                <h5 class="text-dark font-weight-bold mb-4">تفاصيل إضافية (اختياري)</h5>

                {{-- حقول العميل والمشروع --}}
                <div class="row">
                    <div class="col-md-3 form-group"><label>اسم العميل</label><input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}"></div>
                    <div class="col-md-3 form-group"><label>رقم الجوال</label><input type="text" name="client_phone" class="form-control" value="{{ old('client_phone') }}"></div>
                    <div class="col-md-3 form-group"><label>رقم الهوية</label><input type="text" name="payer_id_number" class="form-control" value="{{ old('payer_id_number') }}"></div>
                    <div class="col-md-3 form-group"><label>اسم المشروع</label><input type="text" name="project_name" class="form-control" value="{{ old('project_name') }}"></div>
                </div>

                {{-- حقول الحوالة --}}
                <div class="row">
                    <div class="col-md-4 form-group"><label>مصدر المبلغ</label><input type="text" name="source" class="form-control" value="{{ old('source') }}"></div>
                    <div class="col-md-4 form-group"><label>رقم التحويلة</label><input type="text" name="transfer_number" class="form-control" value="{{ old('transfer_number') }}"></div>
                    <div class="col-md-4 form-group"><label>تفاصيل الحوالة</label><input type="text" name="transfer_details" class="form-control" value="{{ old('transfer_details') }}"></div>
                </div>

                {{-- حقول البنوك --}}
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>البنك المرسل</label>
                        <select name="payer_bank_name" class="form-control">
                            <option value="">-- اختر من الدليل --</option>
                            @foreach($banks as $bank_name) <option value="{{ $bank_name }}" @selected(old('payer_bank_name') == $bank_name)>{{ $bank_name }}</option> @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>البنك المستقبل</label>
                        <select name="beneficiary_bank_name" class="form-control">
                            <option value="">-- اختر من الدليل --</option>
                            @foreach($banks as $bank_name) <option value="{{ $bank_name }}" @selected(old('beneficiary_bank_name') == $bank_name)>{{ $bank_name }}</option> @endforeach
                        </select>
                    </div>
                </div>

                {{-- حقول الملاحظات --}}
                <div class="form-group"><label>تفاصيل إضافية</label><textarea name="details" class="form-control" rows="2">{{ old('details') }}</textarea></div>
                <div class="form-group"><label>ملاحظات</label><textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success mr-2">حفظ الحركة وتحديث الرصيد</button>
            </div>
        </form>
    </div>

    <!-- Transactions Table -->
    <div class="card card-custom">
        <div class="card-header"><h3 class="card-title">سجل الحركات</h3></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-uppercase">
                            <th>التاريخ</th><th>النوع</th><th>المبلغ</th><th>العميل</th><th>المشروع</th><th>التفاصيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                        <tr class="{{ $transaction->type == 'deposit' ? 'table-light-success' : 'table-light-danger' }}">
                            <td>{{ $transaction->date->format('Y-m-d') }}</td>
                            <td>{{ $transaction->type }}</td>
                            <td class="font-weight-bold">{{ number_format($transaction->amount, 2) }} {{ $transaction->currency }}</td>
                            <td>{{ $transaction->client_name ?? '-' }}</td>
                            <td>{{ $transaction->project_name ?? '-' }}</td>
                            <td>{{ $transaction->details ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center p-5 text-muted">لا توجد حركات سابقة لهذا الحساب.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">{{ $transactions->links() }}</div>
        </div>
    </div>
</div>
@endsection
