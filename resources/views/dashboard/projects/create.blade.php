@extends('layouts.container')
@section('title', 'إنشاء مشروع عقاري جديد')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
    :root { --primary-color: #4f46e5; --primary-hover: #4338ca; --secondary-color: #6b7280; --light-bg: #f9fafb; --border-color: #e5e7eb; --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1 ), 0 2px 4px -2px rgba(0, 0, 0, 0.1); }
    .form-section { background-color: var(--light-bg); padding: 2rem; border-radius: 0.75rem; margin-bottom: 2.5rem; border: 1px solid var(--border-color); box-shadow: var(--card-shadow); }
    .form-section-title { font-size: 1.5rem; font-weight: 600; color: var(--primary-color); margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border-color); display: flex; align-items: center; gap: 0.75rem; }
    .sub-item-card { background-color: #ffffff; border: 1px solid var(--border-color); border-radius: 0.5rem; margin-bottom: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); overflow: hidden; }
    .sub-item-header { background-color: var(--light-bg); padding: 0.75rem 1.25rem; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; }
    .sub-item-header h5 { margin: 0; font-weight: 600; color: #374151; }
    .sub-item-body { padding: 1.25rem; }
    .btn-primary { background-color: var(--primary-color); border-color: var(--primary-color); }
    .btn-primary:hover { background-color: var(--primary-hover); border-color: var(--primary-hover); }
</style>
@endpush

@section('content')
<div class="card card-custom" style="border: none; box-shadow: none; background: transparent;">
    <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data" id="project-form">
        @csrf
        <div class="card-body p-0">

            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

            {{-- 1. تفاصيل المشروع الأساسية --}}
            <div class="form-section">
                <h4 class="form-section-title"><i class="fas fa-info-circle"></i> البيانات الأساسية للمشروع</h4>
                <div class="row">
                    <div class="col-md-6 form-group"><label for="name">اسم المشروع <span class="text-danger">*</span></label><input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required></div>
                    <div class="col-md-6 form-group"><label for="location">الموقع</label><input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}"></div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"><label for="start_date">تاريخ البدء <span class="text-danger">*</span></label><input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', date('Y-m-d')) }}" required></div>
                    <div class="col-md-4 form-group"><label for="estimated_end_date">تاريخ الانتهاء المتوقع</label><input type="date" name="estimated_end_date" id="estimated_end_date" class="form-control" value="{{ old('estimated_end_date') }}"></div>
                    <div class="col-md-4 form-group"><label for="duration_months">مدة البناء (بالشهور)</label><input type="number" name="duration_months" id="duration_months" class="form-control" value="{{ old('duration_months') }}"></div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"><label for="main_contractor">المقاول الرئيسي</label><input type="text" name="main_contractor" id="main_contractor" class="form-control" value="{{ old('main_contractor') }}"></div>
                    <div class="col-md-4 form-group"><label for="architect">المهندس المعماري</label><input type="text" name="architect" id="architect" class="form-control" value="{{ old('architect') }}"></div>
                    <div class="col-md-4 form-group"><label for="estimated_cost_usd_formatted">التكلفة المتوقعة (USD)</label><input type="text" id="estimated_cost_usd_formatted" class="form-control" value="{{ old('estimated_cost_usd') }}"><input type="hidden" name="estimated_cost_usd" id="estimated_cost_usd_raw"></div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group"><label for="exchange_rate">سعر الصرف (مقابل الشيكل) <span class="text-danger">*</span></label><input type="number" name="exchange_rate" id="exchange_rate" class="form-control" value="{{ old('exchange_rate', 3.75) }}" step="0.01" required></div>
                    <div class="col-md-4 form-group"><label for="estimated_cost_ils_display">التكلفة المتوقعة (ILS)</label><input type="text" id="estimated_cost_ils_display" class="form-control" readonly><input type="hidden" name="estimated_cost_ils" id="estimated_cost_ils_raw"></div>
                </div>
                <div class="form-group"><label for="description">وصف المشروع</label><textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea></div>
                <div class="form-group"><label for="notes">ملاحظات إضافية</label><textarea name="notes" id="notes" class="form-control" rows="2">{{ old('notes') }}</textarea></div>
                <div class="form-group"><label for="attachments">مرفقات المشروع</label><input type="file" name="attachments[]" id="attachments" class="form-control-file" multiple></div>
            </div>

            {{-- 2. الوحدات العقارية --}}
            <div class="form-section">
                <h4 class="form-section-title"><i class="fas fa-building"></i> الوحدات العقارية</h4>
                <div id="units-container"></div>
                <button type="button" id="add-unit-btn" class="btn btn-success btn-sm mt-3"><i class="fas fa-plus"></i> إضافة وحدة</button>
            </div>
        </div>
        <div class="card-footer text-left bg-white border-0 pt-0">
            <button type="submit" class="btn btn-primary btn-lg mr-2">حفظ المشروع</button>
            <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary btn-lg">إلغاء</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
    $(document ).ready(function() {
        let unitIndex = 0;
        let unitCleaveInstances = {};
        var projectCostCleave = new Cleave('#estimated_cost_usd_formatted', { numeral: true, numeralThousandsGroupStyle: 'thousand' });

        function applyUnitCleave(selector, index) { unitCleaveInstances[index] = new Cleave(selector, { numeral: true, numeralThousandsGroupStyle: 'thousand' }); }
        function calculateProjectCostILS() {
            const costUSD = parseFloat(projectCostCleave.getRawValue()) || 0;
            const rate = parseFloat($('#exchange_rate').val()) || 0;
            const costILS = costUSD * rate;
            $('#estimated_cost_ils_display').val(new Intl.NumberFormat('en-US').format(costILS.toFixed(2)));
            $('#estimated_cost_ils_raw').val(costILS.toFixed(2));
        }

        function addUnitField() {
            const currentIndex = unitIndex;
            const unitHtml = `<div class="sub-item-card unit-item" data-index="${currentIndex}"><div class="sub-item-header"><h5>تفاصيل الوحدة #${currentIndex + 1}</h5><button type="button" class="btn btn-danger btn-sm remove-item-btn"><i class="fas fa-trash"></i></button></div><div class="sub-item-body"><div class="row"><div class="col-md-3 form-group"><label>رقم الوحدة <span class="text-danger">*</span></label><input type="text" name="units[${currentIndex}][unit_number]" class="form-control" required></div><div class="col-md-3 form-group"><label>نوع الوحدة <span class="text-danger">*</span></label><select name="units[${currentIndex}][unit_type]" class="form-control" required><option value="apartment">شقة</option><option value="office">مكتب</option><option value="commercial">تجاري</option></select></div><div class="col-md-3 form-group"><label>المساحة (م²)<span class="text-danger">*</span></label><input type="number" name="units[${currentIndex}][area]" class="form-control" step="0.01" required></div><div class="col-md-3 form-group"><label>الطابق</label><input type="number" name="units[${currentIndex}][floor]" class="form-control"></div></div><div class="row"><div class="col-md-3 form-group"><label>التشطيب</label><select name="units[${currentIndex}][finish_type]" class="form-control"><option value="unfinished">عظم</option><option value="finished">مشطب</option></select></div><div class="col-md-3 form-group"><label>موقف سيارة</label><select name="units[${currentIndex}][has_parking]" class="form-control"><option value="0">لا</option><option value="1">نعم</option></select></div><div class="col-md-3 form-group"><label>السعر المتوقع (USD)</label><input type="text" id="price_usd_${currentIndex}" class="form-control price-input-formatted"><input type="hidden" name="units[${currentIndex}][price_usd]" id="price_usd_raw_${currentIndex}"></div><div class="col-md-3 form-group"><label>السعر المتوقع (ILS)</label><input type="text" id="price_ils_${currentIndex}" class="form-control" readonly></div></div></div></div>`;
            $('#units-container').append(unitHtml);
            applyUnitCleave($(`#price_usd_${currentIndex}`)[0], currentIndex);
            unitIndex++;
        }

        $('#add-unit-btn').on('click', addUnitField);
        $(document).on('click', '.remove-item-btn', function() { if (confirm(`هل أنت متأكد؟`)) { $(this).closest('.sub-item-card').remove(); } });
        $('#estimated_cost_usd_formatted, #exchange_rate').on('input', calculateProjectCostILS);
        $(document).on('input', '.price-input-formatted', function() {
            const index = $(this).closest('.unit-item').data('index');
            const cleave = unitCleaveInstances[index];
            if (cleave) {
                const priceUSD = parseFloat(cleave.getRawValue()) || 0;
                const rate = parseFloat($('#exchange_rate').val()) || 3.75;
                const priceILS = priceUSD * rate;
                $(`#price_ils_${index}`).val(new Intl.NumberFormat('en-US').format(priceILS.toFixed(2)));
            }
        });
        $('#project-form').on('submit', function() {
            $('#estimated_cost_usd_raw').val(projectCostCleave.getRawValue());
            calculateProjectCostILS();
            $('.unit-item').each(function() {
                const index = $(this).data('index');
                const cleave = unitCleaveInstances[index];
                if (cleave) { $(`#price_usd_raw_${index}`).val(cleave.getRawValue()); }
            });
            return true;
        });

        calculateProjectCostILS();
        addUnitField();
    });
</script>
@endpush
