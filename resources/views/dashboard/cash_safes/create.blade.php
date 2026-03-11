@extends('layouts.container')
@section('title', 'إنشاء خزينة جديدة')

@section('content')
<div class="card">
    <div class="card-header"><h4 class="card-title">نموذج إنشاء خزينة نقدية</h4></div>
    <div class="card-body">
        <form action="{{ route('dashboard.cash-safes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">اسم الخزينة <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="currency">العملة <span class="text-danger">*</span></label>
                    <select name="currency" id="currency" class="form-control" required>
                        <option value="ILS">شيكل (ILS)</option>
                        <option value="USD">دولار أمريكي (USD)</option>
                        <option value="JOD">دينار أردني (JOD)</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="balance">الرصيد الافتتاحي <span class="text-danger">*</span></label>
                    <input type="number" name="balance" id="balance" class="form-control" value="{{ old('balance', 0) }}" step="0.01" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">الوصف / ملاحظات</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <div class="form-check">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" checked>
                <label class="form-check-label" for="is_active">تفعيل الخزينة</label>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">حفظ الخزينة</button>
            <a href="{{ route('dashboard.cash-safes.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection
