@extends('layouts.container')
@section('title', 'تعديل الشيك رقم: ' . $check->check_number)

@section('content')
<form action="{{ route('dashboard.checks.update', $check->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">تعديل بيانات الشيك</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>رقم الشيك <span class="text-danger">*</span></label>
                    <input type="text" name="check_number" class="form-control" value="{{ old('check_number', $check->check_number) }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>اسم بنك الشيك <span class="text-danger">*</span></label>
                    <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name', $check->bank_name) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>تاريخ التحرير <span class="text-danger">*</span></label>
                    <input type="date" name="issue_date" class="form-control" value="{{ old('issue_date', $check->issue_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>تاريخ الاستحقاق <span class="text-danger">*</span></label>
                    <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $check->due_date->format('Y-m-d')) }}" required>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>نوع الشيك <span class="text-danger">*</span></label>
                    <select name="type" class="form-control" required>
                        <option value="receivable" {{ old('type', $check->type) == 'receivable' ? 'selected' : '' }}>شيك قبض (وارد)</option>
                        <option value="payable" {{ old('type', $check->type) == 'payable' ? 'selected' : '' }}>شيك دفع (صادر)</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>اسم الطرف (العميل/المورد) <span class="text-danger">*</span></label>
                    <input type="text" name="party_name" class="form-control" value="{{ old('party_name', $check->party_name) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>رقم هاتف الطرف</label>
                    <input type="text" name="party_phone" class="form-control" value="{{ old('party_phone', $check->party_phone) }}">
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>المبلغ <span class="text-danger">*</span></label>
                    <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $check->amount) }}" step="0.01" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>العملة <span class="text-danger">*</span></label>
                    <select name="currency" id="currency" class="form-control" required>
                        <option value="ILS" {{ old('currency', $check->currency) == 'ILS' ? 'selected' : '' }}>ILS</option>
                        <option value="USD" {{ old('currency', $check->currency) == 'USD' ? 'selected' : '' }}>USD</option>
                        <option value="JOD" {{ old('currency', $check->currency) == 'JOD' ? 'selected' : '' }}>JOD</option>
                    </select>
                </div>
                <div class="col-md-2 form-group" id="exchange_rate_wrapper">
                    <label>سعر الصرف</label>
                    <input type="number" name="exchange_rate" id="exchange_rate" class="form-control" value="{{ old('exchange_rate', $check->exchange_rate) }}" step="0.001">
                </div>
                <div class="col-md-3 form-group">
                    <label>القيمة بالشيكل</label>
                    <input type="text" id="amount_ils_display" class="form-control" readonly>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>إيداع في حساب بنكي (لحالة شيكات القبض)</label>
                    <select name="deposit_bank_account_id" class="form-control select2-basic">
                        <option value="">-- اختر حساب --</option>
                        @foreach($bankAccounts as $account)
                            <option value="{{ $account->id }}" {{ old('deposit_bank_account_id', $check->deposit_bank_account_id) == $account->id ? 'selected' : '' }}>
                                {{ $account->account_name }} ({{$account->bank->name}})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>صادر من حساب بنكي (لحالة شيكات الدفع)</label>
                    <select name="payment_bank_account_id" class="form-control select2-basic">
                        <option value="">-- اختر حساب --</option>
                        @foreach($bankAccounts as $account)
                            <option value="{{ $account->id }}" {{ old('payment_bank_account_id', $check->payment_bank_account_id) == $account->id ? 'selected' : '' }}>
                                {{ $account->account_name }} ({{$account->bank->name}})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>ربط بمشروع</label>
                    <select name="project_id" class="form-control select2-basic">
                        <option value="">-- اختر مشروع --</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" {{ old('project_id', $check->project_id) == $project->id ? 'selected' : '' }}>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>ربط بوحدة عقارية</label>
                    <select name="project_unit_id" class="form-control select2-basic">
                        <option value="">-- اختر وحدة --</option>
                        @foreach($projectUnits as $unit)
                            <option value="{{ $unit->id }}" {{ old('project_unit_id', $check->project_unit_id) == $unit->id ? 'selected' : '' }}>
                                {{ $unit->unit_number }} ({{ $unit->project->name ?? '' }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>ملاحظات</label>
                <textarea name="notes" class="form-control" rows="3">{{ old('notes', $check->notes) }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">تحديث البيانات</button>
            <a href="{{ route('dashboard.checks.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </div>
</form>

@push('scripts')
<script>
$(document).ready(function() {
    function calculateILS() {
        const amount = parseFloat($('#amount').val()) || 0;
        const rate = parseFloat($('#exchange_rate').val()) || 1;
        const total = amount * rate;
        $('#amount_ils_display').val(total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
    }

    $('#amount, #exchange_rate').on('input', calculateILS);

    $('#currency').on('change', function() {
        if (this.value === 'ILS') {
            $('#exchange_rate_wrapper').hide();
            $('#exchange_rate').val(1);
        } else {
            $('#exchange_rate_wrapper').show();
        }
        calculateILS();
    });

    // التشغيل الأولي
    $('#currency').trigger('change');
});
</script>
@endpush
@endsection
