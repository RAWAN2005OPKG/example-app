@extends('layouts.container')
@section('title', 'تعديل الخزينة: ' . $cashSafe->name)

@section('content')
<div class="card">
    <div class="card-header"><h4 class="card-title">تعديل الخزينة: {{ $cashSafe->name }}</h4></div>
    <div class="card-body">
        <form action="{{ route('dashboard.cash-safes.update', $cashSafe->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">اسم الخزينة <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $cashSafe->name) }}" required>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="currency">العملة <span class="text-danger">*</span></label>
                    <select name="currency" id="currency" class="form-control" required>
                        <option value="ILS" {{ $cashSafe->currency == 'ILS' ? 'selected' : '' }}>شيكل (ILS)</option>
                        <option value="USD" {{ $cashSafe->currency == 'USD' ? 'selected' : '' }}>دولار أمريكي (USD)</option>
                        <option value="JOD" {{ $cashSafe->currency == 'JOD' ? 'selected' : '' }}>دينار أردني (JOD)</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="balance">الرصيد الحالي <span class="text-danger">*</span></label>
                    <input type="number" name="balance" id="balance" class="form-control" value="{{ old('balance', $cashSafe->balance) }}" step="0.01" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">الوصف / ملاحظات</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $cashSafe->description) }}</textarea>
            </div>
            <div class="form-check">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ $cashSafe->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">تفعيل الخزينة</label>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">تحديث الخزينة</button>
            <a href="{{ route('dashboard.cash-safes.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection
