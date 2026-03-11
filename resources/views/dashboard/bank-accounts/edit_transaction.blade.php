@extends('layouts.container')
@section('title', 'تعديل حركة بنكية')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">تعديل حركة بنكية</h1>
            {{-- ======================================================== --}}
            {{-- ===== هذا هو السطر الذي تم تصحيحه بالكامل ===== --}}
            {{-- ======================================================== --}}
            <p class="text-muted mb-0">
                خاصة بحساب: {{ $transaction->bankAccount->account_name }}
                ({{ $transaction->bankAccount->bank->name ?? 'بنك غير محدد' }})
            </p>
        </div>
    </div>

    <!-- Form Container -->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title">نموذج تعديل الحركة</h3>
        </div>
        {{-- تأكد من أن المسار صحيح ويستخدم ID الحركة --}}
        <form class="form" action="{{ route('dashboard.bank-accounts.transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- مهم جداً لتحديد أن العملية هي تحديث --}}
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                {{-- الحقول الأساسية --}}
                <div class="row">
                    <div class="col-md-3 form-group"><label>تاريخ الحركة <span class="text-danger">*</span></label><input type="date" name="date" class="form-control" value="{{ old('date', $transaction->date->format('Y-m-d')) }}" required></div>
                    <div class="col-md-3 form-group"><label>نوع الحركة <span class="text-danger">*</span></label><select name="type" class="form-control" required><option value="deposit" @selected(old('type', $transaction->type) == 'deposit')>إيداع</option><option value="withdrawal" @selected(old('type', $transaction->type) == 'withdrawal')>سحب نقدي</option><option value="transfer" @selected(old('type', $transaction->type) == 'transfer')>حوالة بنكية</option><option value="personal_withdrawal" @selected(old('type', $transaction->type) == 'personal_withdrawal')>مسحوبات شخصية</option></select></div>
                    <div class="col-md-3 form-group"><label>المبلغ <span class="text-danger">*</span></label><input type="number" name="amount" class="form-control" step="0.01" required value="{{ old('amount', $transaction->amount) }}"></div>
                    <div class="col-md-3 form-group"><label>العملة <span class="text-danger">*</span></label><select name="currency" class="form-control" required><option value="SAR" @selected(old('currency', $transaction->currency) == 'SAR')>ريال سعودي</option><option value="USD" @selected(old('currency', $transaction->currency) == 'USD')>دولار أمريكي</option><option value="ILS" @selected(old('currency', $transaction->currency) == 'ILS')>شيكل</option><option value="JOD" @selected(old('currency', $transaction->currency) == 'JOD')>دينار أردني</option></select></div>
                </div>

                <div class="separator separator-dashed my-5"></div>
                <h5 class="text-dark font-weight-bold mb-4">تفاصيل إضافية (اختياري)</h5>

                {{-- حقول العميل والمشروع --}}
                <div class="row">
                    <div class="col-md-3 form-group"><label>اسم العميل</label><input type="text" name="client_name" class="form-control" value="{{ old('client_name', $transaction->client_name) }}"></div>
                    <div class="col-md-3 form-group"><label>رقم الجوال</label><input type="text" name="client_phone" class="form-control" value="{{ old('client_phone', $transaction->client_phone) }}"></div>
                    <div class="col-md-3 form-group"><label>رقم الهوية</label><input type="text" name="payer_id_number" class="form-control" value="{{ old('payer_id_number', $transaction->payer_id_number) }}"></div>
                    <div class="col-md-3 form-group"><label>اسم المشروع</label><input type="text" name="project_name" class="form-control" value="{{ old('project_name', $transaction->project_name) }}"></div>
                </div>

                {{-- حقول الحوالة --}}
                <div class="row">
                    <div class="col-md-4 form-group"><label>مصدر المبلغ</label><input type="text" name="source" class="form-control" value="{{ old('source', $transaction->source) }}"></div>
                    <div class="col-md-4 form-group"><label>رقم التحويلة</label><input type="text" name="transfer_number" class="form-control" value="{{ old('transfer_number', $transaction->transfer_number) }}"></div>
                    <div class="col-md-4 form-group"><label>تفاصيل الحوالة</label><input type="text" name="transfer_details" class="form-control" value="{{ old('transfer_details', $transaction->transfer_details) }}"></div>
                </div>

                {{-- حقول البنوك --}}
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>البنك المرسل</label>
                        <select name="payer_bank_name" class="form-control">
                            <option value="">-- اختر من الدليل --</option>
                            @foreach($banks as $bank_name) <option value="{{ $bank_name }}" @selected(old('payer_bank_name', $transaction->payer_bank_name) == $bank_name)>{{ $bank_name }}</option> @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>البنك المستقبل</label>
                        <select name="beneficiary_bank_name" class="form-control">
                            <option value="">-- اختر من الدليل --</option>
                            @foreach($banks as $bank_name) <option value="{{ $bank_name }}" @selected(old('beneficiary_bank_name', $transaction->beneficiary_bank_name) == $bank_name)>{{ $bank_name }}</option> @endforeach
                        </select>
                    </div>
                </div>

                {{-- حقول الملاحظات --}}
                <div class="form-group"><label>تفاصيل إضافية</label><textarea name="details" class="form-control" rows="2">{{ old('details', $transaction->details) }}</textarea></div>
                <div class="form-group"><label>ملاحظات</label><textarea name="notes" class="form-control" rows="2">{{ old('notes', $transaction->notes) }}</textarea></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
                {{-- تأكد من أن هذا المسار صحيح ويأخذ ID الحساب البنكي --}}
                <a href="{{ route('dashboard.bank-accounts.show', $transaction->bank_account_id) }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection
