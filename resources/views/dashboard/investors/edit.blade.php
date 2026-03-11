@extends('layouts.container')
@section('title', 'تعديل بيانات المستثمر: ' . $investor->name)

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
    .form-section { background-color: #f9fafb; padding: 2rem; border-radius: 0.75rem; margin-bottom: 2.5rem; border: 1px solid #e5e7eb; }
    .form-section-title { font-size: 1.5rem; font-weight: 600; color: #4f46e5; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid #e5e7eb; }
    .sub-item-card { background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.5rem; margin-bottom: 1.5rem; }
    .sub-item-header { background-color: #f9fafb; padding: 0.75rem 1.25rem; border-bottom: 1px solid #e5e7eb; }
    .sub-item-body { padding: 1.5rem; }
</style>
@endpush

@section('content'  )
<div class="card card-custom" style="border: none; background: transparent;">
    <form action="{{ route('dashboard.investors.update', $investor->id) }}" method="POST" id="investor-form">
        @csrf
        @method('PUT')
        <div class="card-body p-0">
            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

            <div class="form-section">
                <h4 class="form-section-title">1. البيانات الأساسية للمستثمر</h4>
                <div class="row">
                    <div class="col-md-6 form-group"><label>اسم المستثمر <span class="text-danger">*</span></label><input type="text" name="name" class="form-control" value="{{ old('name', $investor->name) }}" required></div>
                    <div class="col-md-6 form-group"><label>الشركة</label><input type="text" name="company" class="form-control" value="{{ old('company', $investor->company) }}"></div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group"><label>رقم الهوية</label><input type="text" name="id_number" class="form-control" value="{{ old('id_number', $investor->id_number) }}"></div>
                    <div class="col-md-6 form-group"><label>رقم الجوال</label><input type="text" name="phone" class="form-control" value="{{ old('phone', $investor->phone) }}"></div>
                </div>
            </div>

            <div class="form-section">
                <h4 class="form-section-title">2. المشاريع المستثمر فيها</h4>
                <div id="investments-container"></div>
                <button type="button" id="add-investment-btn" class="btn btn-warning btn-sm mt-3"><i class="fas fa-plus"></i> إضافة استثمار</button>
            </div>
        </div>
        <div class="card-footer text-left bg-white border-0 pt-0">
            <button type="submit" class="btn btn-primary btn-lg mr-2">حفظ التعديلات</button>
            <a href="{{ route('dashboard.investors.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document ).ready(function() {
        let investmentIndex = 0;
        const projectsList = @json($projects);
        const exchangeRates = { 'USD': 3.75, 'JOD': 5.20, 'ILS': 1 };
        let cleaveInstances = {};

        function applyCleave(selector, index) {
            cleaveInstances[index] = new Cleave(selector, { numeral: true, numeralThousandsGroupStyle: 'thousand' });
        }

        function calculateILS(index) {
            const cleave = cleaveInstances[index];
            if (!cleave) return;
            const amount = parseFloat(cleave.getRawValue()) || 0;
            const currency = $(`#currency_${index}`).val();
            const exchangeRateInput = $(`#exchange_rate_${index}`);

            if (currency === 'ILS') {
                exchangeRateInput.val(1).closest('.form-group').hide();
            } else {
                exchangeRateInput.closest('.form-group').show();
                if (parseFloat(exchangeRateInput.val()) === 1 || exchangeRateInput.val() === '') {
                    exchangeRateInput.val(exchangeRates[currency] || 1);
                }
            }
            const rate = parseFloat(exchangeRateInput.val()) || 1;
            const amountILS = amount * rate;
            $(`#amount_ils_display_${index}`).val(new Intl.NumberFormat('en-US').format(amountILS.toFixed(2)));
            $(`#invested_amount_ils_${index}`).val(amountILS.toFixed(2));
        }

        function addInvestmentField(investment = {}) {
            const currentIndex = investmentIndex;
            let projectOptions = '<option value="">اختر مشروع...</option>';
            projectsList.forEach(p => {
                projectOptions += `<option value="${p.id}" ${investment.project_id == p.id ? 'selected' : ''}>${p.name}</option>`;
            });

            const investmentHtml = `
                <div class="sub-item-card investment-item" data-index="${currentIndex}">
                    <div class="sub-item-header d-flex justify-content-between align-items-center">
                        <h5>تفاصيل الاستثمار #${currentIndex + 1}</h5>
                        <button type="button" class="btn btn-danger btn-sm remove-item-btn" data-type="الاستثمار"><i class="fas fa-trash"></i></button>
                    </div>
                    <div class="sub-item-body">
                        <div class="row">
                            <div class="col-md-6 form-group"><label>المشروع <span class="text-danger">*</span></label><select name="projects[${currentIndex}][project_id]" class="form-control project-select" required>${projectOptions}</select></div>
                            <div class="col-md-6 form-group"><label>نسبة الاستثمار (%)</label><input type="number" name="projects[${currentIndex}][investment_percentage]" class="form-control" step="0.01" value="${investment.investment_percentage || ''}"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>المبلغ المستثمر <span class="text-danger">*</span></label>
                                <input type="text" id="invested_amount_formatted_${currentIndex}" class="form-control" value="${investment.invested_amount || ''}" required>
                                <input type="hidden" name="projects[${currentIndex}][invested_amount]" id="invested_amount_${currentIndex}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>العملة <span class="text-danger">*</span></label>
                                <select name="projects[${currentIndex}][currency]" id="currency_${currentIndex}" class="form-control currency-select" data-index="${currentIndex}" required>
                                    <option value="USD" ${investment.currency === 'USD' ? 'selected' : ''}>دولار (USD)</option>
                                    <option value="JOD" ${investment.currency === 'JOD' ? 'selected' : ''}>دينار (JOD)</option>
                                    <option value="ILS" ${investment.currency === 'ILS' ? 'selected' : ''}>شيكل (ILS)</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>سعر الصرف</label>
                                <input type="number" name="projects[${currentIndex}][exchange_rate]" id="exchange_rate_${currentIndex}" class="form-control exchange-rate" data-index="${currentIndex}" step="0.0001" value="${investment.exchange_rate || '1'}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>القيمة بالشيكل (محسوبة)</label>
                                <input type="text" id="amount_ils_display_${currentIndex}" class="form-control" readonly style="background-color: #e9ecef;">
                                <input type="hidden" name="projects[${currentIndex}][invested_amount_ils]" id="invested_amount_ils_${currentIndex}">
                            </div>
                        </div>
                    </div>
                </div>`;
            $('#investments-container').append(investmentHtml);

            $(`select[name="projects[${currentIndex}][project_id]"]`).select2({ placeholder: "اختر مشروعاً..." });
            applyCleave($(`#invested_amount_formatted_${currentIndex}`)[0], currentIndex);
            calculateILS(currentIndex);
            investmentIndex++;
        }

        $('#add-investment-btn').on('click', () => addInvestmentField());

        $(document).on('click', '.remove-item-btn', function() {
            if (confirm(`هل أنت متأكد من حذف هذا الاستثمار؟`)) {
                $(this).closest('.sub-item-card').remove();
            }
        });

        $(document).on('input change', '.currency-select, .exchange-rate', function() {
            calculateILS($(this).closest('.investment-item').data('index'));
        });
        $(document).on('input', 'input[id^="invested_amount_formatted_"]', function() {
            calculateILS($(this).closest('.investment-item').data('index'));
        });

        // --- [الكود المصحح 100%] ---
        const oldProjects = @json(old('projects'));
        const currentInvestments = @json($investor->projects->map(function($p) {
            return [
                'project_id' => $p->id,
                'investment_percentage' => $p->pivot->investment_percentage,
                'invested_amount' => $p->pivot->invested_amount,
                'currency' => $p->pivot->currency,
                'exchange_rate' => $p->pivot->exchange_rate,
            ];
        }));

        const dataToLoad = (oldProjects && oldProjects.length > 0) ? oldProjects : currentInvestments;

        if (dataToLoad && dataToLoad.length > 0) {
            dataToLoad.forEach(inv => addInvestmentField(inv));
        } else {
            addInvestmentField();
        }

        $('#investor-form').on('submit', function() {
            $('.investment-item').each(function() {
                const index = $(this).data('index');
                const cleave = cleaveInstances[index];
                if (cleave) {
                    $(`#invested_amount_${index}`).val(cleave.getRawValue());
                }
                calculateILS(index);
            });
            return true;
        });
    });
</script>
@endpush
