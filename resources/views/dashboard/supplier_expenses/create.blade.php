@extends('layouts.container')
@section('title', 'إضافة مصروف مورد جديد')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-money-bill-wave text-success mr-2"></i> تسجيل دفعة جديدة لمورد/مقاول</h3>
    </div>
    <form action="{{ route('dashboard.supplier_expenses.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>التاريخ <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control" value="{{ now()->toDateString() }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>المبلغ (بالشيكل) <span class="text-danger">*</span></label>
                    <input type="number" name="amount" class="form-control" step="0.01" placeholder="أدخل المبلغ المدفوع" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>يُصرف لِـ (المورد/المقاول) <span class="text-danger">*</span></label>
                    <select name="subcontractor_id" class="form-control" required>
                        <option value="" disabled selected>اختر المورد...</option>
                        @foreach($subcontractors as $subcontractor)
                            <option value="{{ $subcontractor->id }}">{{ $subcontractor->name }} ({{ $subcontractor->specialization }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>مصدر المبلغ (الصندوق/الحساب)</label>
                    <input type="text" name="source_of_funds" class="form-control" placeholder="مثال: صندوق الكاش، حساب بنكي">
                </div>
            </div>

            <div class="form-group">
                <label>البيان (ملاحظات)</label>
                <textarea name="notes" class="form-control" rows="3" placeholder="اكتب أي تفاصيل إضافية عن هذه الدفعة..."></textarea>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-success mr-2">حفظ الدفعة</button>
            <a href="{{ route('dashboard.supplier_expenses.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection
