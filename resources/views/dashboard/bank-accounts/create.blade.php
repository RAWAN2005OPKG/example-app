
@extends('layouts.container')
@section('title', 'إضافة حساب بنكي جديد')

@section('content')
<div class="card card-custom" style="max-width: 800px; margin: auto;">
    <div class="card-header">
        <h3 class="card-title">إضافة حساب بنكي جديد</h3>
    </div>
    <form class="form" action="{{ route('dashboard.bank-accounts.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <div class="form-group">
                <label for="bank_id">اختر البنك <span class="text-danger">*</span></label>
                <select name="bank_id" id="bank_id" class="form-control" required>
                    <option value="">-- يرجى اختيار البنك --</option>
                    @foreach($banks as $bank)
                        <option value="{{ $bank->id }}" @selected(old('bank_id') == $bank->id)>
                            {{ $bank->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>اسم الحساب (للتمييز) <span class="text-danger">*</span></label>
                <input type="text" name="account_name" class="form-control" placeholder="مثال: حساب الشركة الرئيسي" value="{{ old('account_name') }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>رقم الحساب <span class="text-danger">*</span></label>
                    <input type="text" name="account_number" class="form-control" value="{{ old('account_number') }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>رقم الآيبان (IBAN) (اختياري)</label>
                    <input type="text" name="iban" class="form-control" value="{{ old('iban') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>عملة الحساب <span class="text-danger">*</span></label>
                    <select name="currency" class="form-control" required>
                        <option value="ILS" @selected(old('currency') == 'ILS')>شيكل</option>
                        <option value="USD" @selected(old('currency') == 'USD')>دولار أمريكي</option>
                        <option value="JOD" @selected(old('currency') == 'JOD')>دينار أردني</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>الرصيد الافتتاحي (اختياري)</label>
                    <input type="number" name="current_balance" class="form-control" step="0.01" value="{{ old('current_balance', 0) }}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">حفظ الحساب</button>
            <a href="{{ route('dashboard.bank-accounts.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection
