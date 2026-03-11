{{-- resources/views/dashboard/projects/_form.blade.php --}}
<div class="form-section">
    <div class="section-header"><i class="fas fa-info-circle"></i><h3>المعلومات الأساسية</h3></div>
    <div class="form-grid">

        {{-- تاريخ الإنشاء --}}
        <div class="form-group">
            <label>تاريخ الانشاء</label>
            <input type="date" name="start_date"
                   value="{{ old('start_date', $project->due_date ?? '') }}"
                   @if(!empty($readonly)) readonly @endif>
        </div>

        {{-- اسم المشروع --}}
        <div class="form-group">
            <label>اسم المشروع</label>
            <input type="text" name="project_name"
           value="{{ old('project_name', $project->project_name ?? '') }}"
                   @if(!empty($readonly)) readonly @endif>
        </div>

        {{-- عنوان المشروع --}}
        <div class="form-group">
            <label>عنوان المشروع</label>
            <input type="text" name="project_title"
                   value="{{ old('project_title', $project->project_title ?? '') }}"
                   @if(!empty($readonly)) readonly @endif>
        </div>

        {{-- نوع العملة --}}
        <div class="form-group">
            <label>نوع العملة</label>
            <select name="currency" @if(!empty($readonly)) disabled @endif>
                <option value="">اختر العملة</option>
                <option value="ils" @if(($project->currency ?? '') == 'ils') selected @endif>شيكل</option>
                <option value="jod" @if(($project->currency ?? '') == 'jod') selected @endif>دينار</option>
                <option value="usd" @if(($project->currency ?? '') == 'usd') selected @endif>دولار</option>
            </select>
        </div>

        {{-- سعر الشقة --}}
        <div class="form-group">
            <label>سعر الشقة</label>
            <input type="text" name="apartment_price"
                   value="{{ old('apartment_price', $project->apartment_price ?? '') }}"
                   @if(!empty($readonly)) readonly @endif>
        </div>

        {{-- الدفعة الأولى --}}
        <div class="form-group">
            <label>الدفعة الأولى اللازمة للشقة</label>
            <select name="down_payment" @if(!empty($readonly)) disabled @endif>
                <option value="">اختر مبلغ الدفعة الأولى</option>
                @for($i = 100000; $i <= 2000000; $i+=50000)
                    <option value="{{ $i }}" @if(($project->down_payment ?? '') == $i) selected @endif>{{ number_format($i) }}</option>
                @endfor
            </select>
        </div>
        {{-- الميزانية --}}
     <div class="form-group">
    <label>ميزانية المشروع</label>
    <input type="number" name="budget"
           value="{{ old('budget', $project->budget ?? '') }}"
           placeholder="أدخل ميزانية المشروع"
           min="0" step="0.01"
           @if(!empty($readonly)) readonly @endif>
    </div>

        {{-- حالة المشروع --}}
        <div class="form-group">
            <label>حالة المشروع الحالية</label>
            <select name="project_status" @if(!empty($readonly)) disabled @endif>
                <option value="">اختر الحالة</option>
                <option value="on_plan" @if(($project->project_status ?? '') == 'on_plan') selected @endif>مشروع على مخطط</option>
                <option value="licensing" @if(($project->project_status ?? '') == 'licensing') selected @endif>قيد الترخيص</option>
                <option value="excavation" @if(($project->project_status ?? '') == 'excavation') selected @endif>قيد الحفر</option>
                <option value="under_construction" @if(($project->project_status ?? '') == 'under_construction') selected @endif>قيد الإنشاء</option>
                <option value="ready_structure" @if(($project->project_status ?? '') == 'ready_structure') selected @endif>مشروع جاهز عظم</option>
                <option value="ready_finished" @if(($project->project_status ?? '') == 'ready_finished') selected @endif>مشروع جاهز تشطيب</option>
            </select>
        </div>

         <div class="form-group">
            <label>تاريخ الانتهاء</label>
            <input type="date" name="end_date"
                   value="{{ old('end_date', $project->end_date ?? '') }}"
                   @if(!empty($readonly)) readonly @endif>
        </div>


@if(!empty($readonly) && !empty($project->project_media))
    @if(pathinfo($project->project_media, PATHINFO_EXTENSION) == 'mp4')
        <video src="{{ asset('storage/'.$project->project_media) }}" controls></video>
    @else
        <img src="{{ asset('storage/'.$project->project_media) }}" alt="صورة المشروع">
    @endif
@else
    <input type="file" name="project_media" @if(!empty($readonly)) disabled @endif>
@endif
