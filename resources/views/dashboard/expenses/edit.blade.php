@extends('layouts.container')
@section('title', 'تعديل المصروف رقم ' . $expense->id)

@push('styles')
    <style>
        .hidden { display: none; }
        .form-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .form-group { display: flex; flex-direction: column; }
        .form-group label { margin-bottom: 8px; font-weight: 600; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; }
        .btn-submit { width: 100%; grid-column: 1 / -1; margin-top: 20px; }
    </style>
@endpush

@section('content')
<main class="main-content">
    <div class="page-header"><h1><i class="fas fa-edit"></i> تعديل المصروف رقم {{ $expense->id }}</h1></div>
    <div class="form-container card card-custom">
        <div class="card-body">
            <h2 class="container-title"><i class="fas fa-money-bill-wave"></i> بيانات المصروف</h2>
            <form id="expenseForm" class="form-grid" action="{{ route('dashboard.expenses.update', $expense->id) }}" method="POST">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <div class="alert alert-danger" style="grid-column: 1 / -1;">
                        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                {{-- كل الحقول معبأة بالبيانات القديمة --}}
                <div class="form-group"><label for="date">تاريخ الدفع</label><input type="date" name="date" class="form-control" required value="{{ old('date', $expense->date->format('Y-m-d')) }}"></div>
                <div class="form-group"><label for="receipt_name">اسم الوصل</label><input type="text" name="receipt_name" class="form-control" value="{{ old('receipt_name', $expense->receipt_name) }}"></div>
                <div class="form-group"><label for="receipt_value_shekel">قيمة الوصل (شيكل)</label><input type="number" name="receipt_value_shekel" class="form-control" step="0.01" value="{{ old('receipt_value_shekel', $expense->receipt_value_shekel) }}"></div>
                <div class="form-group"><label for="cost_value_dollar">قيمة التكلفة (دولار)</label><input type="number" name="cost_value_dollar" class="form-control" step="0.01" value="{{ old('cost_value_dollar', $expense->cost_value_dollar) }}"></div>
                <div class="form-group"><label for="payee">اسم المستفيد</label><input type="text" name="payee" class="form-control" required value="{{ old('payee', $expense->payee) }}"></div>
                <div class="form-group"><label for="phone">رقم الجوال</label><input type="tel" name="phone" class="form-control" value="{{ old('phone', $expense->phone) }}"></div>
                <div class="form-group"><label for="job">العمل/المهنة</label><input type="text" name="job" class="form-control" value="{{ old('job', $expense->job) }}"></div>
                <div class="form-group"><label for="id_number">رقم الهوية</label><input type="text" name="id_number" class="form-control" value="{{ old('id_number', $expense->id_number) }}"></div>
                <div class="form-group"><label for="walid_share_amount">وليد الخالص</label><input type="number" name="walid_share_amount" class="form-control" step="0.01" value="{{ old('walid_share_amount', $expense->walid_share_amount) }}"></div>
                <div class="form-group"><label for="mohammad_khalid_share_amount">محمد وخالد</label><input type="number" name="mohammad_khalid_share_amount" class="form-control" step="0.01" value="{{ old('mohammad_khalid_share_amount', $expense->mohammad_khalid_share_amount) }}"></div>
                <div class="form-group">
                    <label for="project_id">المشروع</label>
                    <select name="project_id" class="form-control" required>
                        <option value="0" @selected(old('project_id', $expense->project_id) === null)>مصروف عام</option>
                        @foreach ($projects as $project)<option value="{{ $project->id }}" @selected(old('project_id', $expense->project_id) == $project->id)>{{ $project->project_name }}</option>@endforeach
                    </select>
                </div>
                <div class="form-group"><label for="amount">المبلغ (الأساسي)</label><input type="number" id="amount" name="amount" class="form-control" step="0.01" required value="{{ old('amount', $expense->amount) }}"></div>
                <div class="form-group"><label for="walid_paid_dollar">المدفوع من وليد (دولار)</label><input type="number" name="walid_paid_dollar" class="form-control" step="0.01" value="{{ old('walid_paid_dollar', $expense->walid_paid_dollar) }}"></div>
                <div class="form-group"><label for="mohammad_khalid_paid_dollar">المدفوع من محمد وخالد (دولار)</label><input type="number" name="mohammad_khalid_paid_dollar" class="form-control" step="0.01" value="{{ old('mohammad_khalid_paid_dollar', $expense->mohammad_khalid_paid_dollar) }}"></div>
                <div class="form-group"><label for="walid_paid_shekel">المدفوع من وليد (شيكل)</label><input type="number" name="walid_paid_shekel" class="form-control" step="0.01" value="{{ old('walid_paid_shekel', $expense->walid_paid_shekel) }}"></div>
                <div class="form-group"><label for="mohammad_khalid_paid_shekel">المدفوع من محمد وخالد (شيكل)</label><input type="number" name="mohammad_khalid_paid_shekel" class="form-control" step="0.01" value="{{ old('mohammad_khalid_paid_shekel', $expense->mohammad_khalid_paid_shekel) }}"></div>
                <div class="form-group"><label for="remaining_amount">المتبقي (شيكل)</label><input type="number" name="remaining_amount" class="form-control" step="0.01" value="{{ old('remaining_amount', $expense->remaining_amount) }}"></div>
                <div class="form-group"><label for="remaining_amount_dollar">المتبقي (دولار)</label><input type="number" name="remaining_amount_dollar" class="form-control" step="0.01" value="{{ old('remaining_amount_dollar', $expense->remaining_amount_dollar) }}"></div>
                <div class="form-group"><label for="difference_in_payments">الفرق بين الدفعات</label><input type="number" name="difference_in_payments" class="form-control" step="0.01" value="{{ old('difference_in_payments', $expense->difference_in_payments) }}"></div>
                <div class="form-group"><label for="total_paid_amount">مجموع المدفوع</label><input type="number" name="total_paid_amount" class="form-control" step="0.01" value="{{ old('total_paid_amount', $expense->total_paid_amount) }}"></div>
                <div class="form-group">
                    <label for="currency">عملة المبلغ الأساسي</label>
                    <select id="currency" name="currency" class="form-control" required>
                        <option value="ILS" @selected(in_array(old('currency', $expense->currency), ['ILS', 'شيكل']))>شيكل (ILS)</option>
                        <option value="USD" @selected(in_array(old('currency', $expense->currency), ['USD', 'دولار']))>دولار (USD)</option>
                        <option value="JOD" @selected(in_array(old('currency', $expense->currency), ['JOD', 'دينار']))>دينار (JOD)</option>
                    </select>
                </div>
                <div id="exchangeRateSection" class="form-group" style="display: none;">
                    <label for="exchange_rate">سعر الصرف مقابل الشيكل</label>
                    <input type="number" id="exchange_rate" name="exchange_rate" class="form-control" step="0.01" value="{{ old('exchange_rate', $expense->exchange_rate) }}">
                    <small>القيمة بالشيكل: <b id="ils_value">0.00</b></small>
                </div>
                <div class="form-group">
                    <label for="payment_method">طريقة الدفع</label>
                    <select name="payment_method" class="form-control" required>
                        <option value="نقداً" @selected(old('payment_method', $expense->payment_method) == 'نقداً')>نقداً</option>
                        <option value="تحويل بنكي" @selected(old('payment_method', $expense->payment_method) == 'تحويل بنكي')>تحويل بنكي</option>
                        <option value="شيك" @selected(old('payment_method', $expense->payment_method) == 'شيك')>شيك</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment_source">مصدر الدفع</label>
                    <select id="payment_source" name="payment_source" class="form-control" required>
                        <option value="خزينة" @selected(old('payment_source', $expense->payment_source) == 'خزينة')>من الخزينة العامة</option>
                        <option value="بنك" @selected(old('payment_source', $expense->payment_source) == 'بنك')>من حساب بنكي</option>
                    </select>
                </div>
                <div id="bankAccountSection" class="form-group" style="display: none;">
                    <label for="sender_bank_account_id">من أي حساب بنكي؟</label>
                    <select id="sender_bank_account_id" name="sender_bank_account_id" class="form-control">
                        <option value="">-- اختر الحساب --</option>
                        @foreach ($bankAccounts as $account)<option value="{{ $account->id }}" @selected(old('sender_bank_account_id', $expense->sender_bank_account_id) == $account->id)>{{ $account->account_name }} ({{ $account->currency }})</option>@endforeach
                    </select>
                </div>
                <div class="form-group" style="grid-column: 1 / -1;"><label for="details">تفاصيل</label><textarea name="details" class="form-control" rows="3">{{ old('details', $expense->details) }}</textarea></div>
                <div class="form-group" style="grid-column: 1 / -1;"><label for="notes">ملاحظات</label><textarea name="notes" class="form-control" rows="3">{{ old('notes', $expense->notes) }}</textarea></div>
                <button type="submit" class="btn btn-primary btn-submit"><i class="fas fa-save"></i> حفظ التعديلات</button>
            </form>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const currencySelect = document.getElementById('currency');
    const exchangeRateSection = document.getElementById('exchangeRateSection');
    const exchangeRateInput = document.getElementById('exchange_rate');
    const amountInput = document.getElementById('amount');
    const ilsValueDisplay = document.getElementById('ils_value');
    const paymentSourceSelect = document.getElementById('payment_source');
    const bankAccountSection = document.getElementById('bankAccountSection');
    const bankAccountSelect = document.getElementById('sender_bank_account_id');

    function calculateILS() {
        const amount = parseFloat(amountInput.value) || 0;
        const rate = parseFloat(exchangeRateInput.value) || 1;
        ilsValueDisplay.textContent = (amount * rate).toFixed(2);
    }

    function toggleExchangeRate() {
        const currency = currencySelect.value;
        if (currency === 'ILS' || currency === 'شيكل') {
            exchangeRateSection.style.display = 'none';
            exchangeRateInput.value = 1;
        } else {
            exchangeRateSection.style.display = 'block';
        }
        calculateILS();
    }

    function toggleBankSection() {
        if (paymentSourceSelect.value === 'بنك') {
            bankAccountSection.style.display = 'block';
            bankAccountSelect.required = true;
        } else {
            bankAccountSection.style.display = 'none';
            bankAccountSelect.required = false;
        }
    }

    currencySelect.addEventListener('change', toggleExchangeRate);
    amountInput.addEventListener('input', calculateILS);
    exchangeRateInput.addEventListener('input', calculateILS);
    paymentSourceSelect.addEventListener('change', toggleBankSection);

    // التشغيل الأولي عند تحميل الصفحة
    toggleExchangeRate();
    toggleBankSection();
});
</script>
@endpush
