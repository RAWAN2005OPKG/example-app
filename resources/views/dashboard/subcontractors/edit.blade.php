@extends('layouts.container')
@section('title', 'تعديل بيانات المورد: ' . $subcontractor->name)

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title">تعديل بيانات: {{ $subcontractor->name }}</h3>
    </div>
    {{-- النموذج يشير إلى دالة update مع استخدام الطريقة PUT --}}
    <form action="{{ route('dashboard.subcontractors.update', $subcontractor->id) }}" method="POST" id="subcontractor-form">
        @csrf
        @method('PUT')
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif

            <h4 class="mb-5 text-dark">1. بيانات المقاول/المورد الأساسية</h4>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>الاسم <span class="text-danger">*</span></label>
                    {{-- عرض القيمة الحالية للمورد --}}
                    <input type="text" name="name" class="form-control" value="{{ old('name', $subcontractor->name) }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>التخصص <span class="text-danger">*</span></label>
                    <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $subcontractor->specialization) }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>رقم الهوية/الشركة</label>
                    <input type="text" name="id_number" class="form-control" value="{{ old('id_number', $subcontractor->id_number) }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>رقم الجوال</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $subcontractor->phone) }}">
                </div>
            </div>
            <div class="form-group">
                <label>ملاحظات</label>
                <textarea name="notes" class="form-control" rows="2">{{ old('notes', $subcontractor->notes) }}</textarea>
            </div>

            {{-- ملاحظة: تعديل العقود أكثر تعقيداً وسنضيفه لاحقاً إذا احتجنا إليه --}}
            {{-- حالياً، التركيز على تعديل البيانات الأساسية --}}

        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-success mr-2">حفظ التعديلات</button>
            <a href="{{ route('dashboard.subcontractors.show', $subcontractor->id) }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection
