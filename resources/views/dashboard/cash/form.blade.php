<div class="card-body">
    @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <div class="row">
        <div class="col-md-6 form-group">
            <label>تاريخ الحركة <span class="text-danger">*</span></label>
            <input type="date" name="transaction_date" class="form-control"
                   value="{{ old('transaction_date', isset($transaction->transaction_date) ? $transaction->transaction_date->format('Y-m-d') : date('Y-m-d')) }}"
                   required>
        </div>
        <div class="col-md-6 form-group">
            <label>نوع الحركة <span class="text-danger">*</span></label>
            <select name="type" class="form-control">
                <option value="in" @selected(old('type', $transaction->type ?? '') == 'in')>إيداع (مقبوضات)</option>
                <option value="out" @selected(old('type', $transaction->type ?? '') == 'out')>سحب (مدفوعات)</option>
            </select>
        </div>
        <div class="col-12 form-group">
            <label>المصدر/البيان <span class="text-danger">*</span></label>
            <input type="text" name="source" class="form-control" value="{{ old('source', $transaction->source ?? '') }}" placeholder="مثال: دفعة من العميل فلان، شراء قرطاسية..." required>
        </div>
        <div class="col-md-3 form-group">
            <label>قيمة المبلغ <span class="text-danger">*</span></label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $transaction->amount ?? '') }}" step="0.01" required>
        </div>
        <div class="col-md-3 form-group">
            <label>العملة <span class="text-danger">*</span></label>
            <select name="currency" id="currency" class="form-control">
                <option value="ILS" @selected(old('currency', $transaction->currency ?? 'ILS') == 'ILS')>شيكل</option>
                <option value="USD" @selected(old('currency', $transaction->currency ?? '') == 'USD')>دولار</option>
                <option value="JOD" @selected(old('currency', $transaction->currency ?? '') == 'JOD')>دينار</option>
            </select>
        </div>
        <div class="col-md-3 form-group">
            <label>سعر الصرف <span class="text-danger">*</span></label>
            <input type="number" name="exchange_rate" id="exchange_rate" class="form-control" value="{{ old('exchange_rate', $transaction->exchange_rate ?? 1) }}" step="0.0001" required>
        </div>
        <div class="col-md-3 form-group">
            <label>القيمة المحولة (شيكل)</label>
            <input type="text" id="ils_value_display" class="form-control" readonly style="background-color: #e9ecef; font-weight: bold; text-align: center;">
        </div>
        <div class="col-12 form-group">
            <label>التفاصيل/الملاحظات</label>
            <textarea name="details" class="form-control" rows="3">{{ old('details', $transaction->details ?? '') }}</textarea>
        </div>
    </div>
</div>
<div class="card-footer text-left">
    <button type="submit" class="btn btn-primary">حفظ</button>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const amountInput = document.getElementById('amount');
    const currencySelect = document.getElementById('currency');
    const exchangeRateInput = document.getElementById('exchange_rate');
    const ilsValueDisplay = document.getElementById('ils_value_display');
    const exchangeRates = {'USD': 3.75, 'JOD': 5.20, 'ILS': 1};
    function calculateILS() {
        const amount = parseFloat(amountInput.value) || 0;
        const rate = parseFloat(exchangeRateInput.value) || 0;
        const ilsValue = amount * rate;
        ilsValueDisplay.value = new Intl.NumberFormat('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(ilsValue);
    }
    currencySelect.addEventListener('change', function() {
        exchangeRateInput.value = exchangeRates[this.value] || 1;
        calculateILS();
    });
    amountInput.addEventListener('input', calculateILS);
    exchangeRateInput.addEventListener('input', calculateILS);
    calculateILS();
});
</script>
@endpush
