@extends('layouts.container')
@section('title', 'دفع راتب: ' . $employee->name)

@section('content')
<main class="main-content" style="padding-top: 40px;">
    <div class="card card-custom" style="max-width: 800px; margin: auto;">
        <div class="card-header">
            <h3 class="card-title">دفع راتب لـ: {{ $employee->name }}</h3>
            <div class="card-toolbar">
                <a href="{{ route('dashboard.employees.show', $employee->id) }}" class="btn btn-secondary">العودة للتفاصيل</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.employees.pay.store', $employee->id) }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label>الشهر المستحق عنه الراتب *</label>
                    <input type="month" name="salary_month" class="form-control" value="{{ old('salary_month', date('Y-m')) }}" required>
                </div>
                <div class="form-group mb-4">
                    <label>المبلغ المدفوع ({{ $employee->currency }}) *</label>
                    <input type="number" name="amount" class="form-control" value="{{ old('amount', $employee->salary) }}" step="0.01" required>
                </div>
                <div class="form-group mb-4">
                    <label>تاريخ الدفع *</label>
                    <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', date('Y-m-d')) }}" required>
                </div>
                <div class="form-group mb-4">
                    <label>ملاحظات (اختياري)</label>
                    <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success mt-4">تسجيل الدفعة</button>
            </form>
        </div>
    </div>
</main>
@endsection
