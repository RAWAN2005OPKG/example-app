@extends('layouts.container')
@section('title', 'إعدادات النظام')

@section('content')
<div class="card card-custom" style="max-width: 800px; margin: 40px auto;">
    <div class="card-header">
        <h3 class="card-title">إعدادات النظام</h3>
    </div>
    <form action="{{ route('dashboard.settings.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

            <h4 class="text-primary mb-4">الإعدادات المالية</h4>
            <div class="form-group">
                <label for="opening_balance">الرصيد الافتتاحي (ILS)</label>
                <input type="number" name="opening_balance" id="opening_balance" class="form-control"
                       value="{{ old('opening_balance', $settings['opening_balance'] ?? 0) }}"
                       step="0.01" placeholder="أدخل المبلغ الذي بدأت به الشركة">
                <small class="form-text text-muted">هذا هو المبلغ المالي الذي كان متوفراً في الصندوق أو البنك عند بدء استخدام النظام.</small>
            </div>


        </div>
        <div class="card-footer text-left">
            <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
        </div>
    </form>
</div>
@endsection
