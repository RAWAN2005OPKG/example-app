@extends('layouts.container')
@section('title', 'تعديل مصروف مورد')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-edit text-primary mr-2"></i> تعديل بيانات مصروف المورد</h3>
    </div>
    <form action="{{ route('dashboard.supplier_expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>التاريخ <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control" value="{{ $expense->date ? $expense->date->format('Y-m-d') : '' }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>المبلغ (بالشيكل) <span class="text-danger">*</span></label>
                    <input type="number" name="amount" class="form-control" step="0.01" value="{{ $expense->amount }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>المورد/المقاول <span class="text-danger">*</span></label>
                    <select name="subcontractor_id" class="form-control" required>
                        @foreach($subcontractors as $subcontractor)
                            <option value="{{ $subcontractor->id }}" @selected($expense->payable_id == $subcontractor->id)>{{ $subcontractor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>مصدر المبلغ (الصندوق/الحساب)</label>
                    <input type="text" name="source_of_funds" class="form-control" value="{{ $expense->source_of_funds }}">
                </div>
            </div>

            <div class="form-group">
                <label>البيان (ملاحظات)</label>
                <textarea name="notes" class="form-control" rows="3">{{ $expense->notes }}</textarea>
            </div>
        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-primary mr-2">تحديث البيانات</button>
            <a href="{{ route('dashboard.supplier_expenses.index') }}" class="btn btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection
