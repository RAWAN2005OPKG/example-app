@extends('layouts.container')
@section('title', 'تفاصيل الموظف')
@section('content')
<main class="main-content">
    <div class="card card-custom" style="max-width: 800px; margin: auto;">
        <div class="card-header">
            <h3 class="card-title">ملف الموظف: {{ $employee->name }}</h3>
            <div class="card-toolbar">
                <a href="{{ route('dashboard.employees.edit', $employee->id) }}" class="btn btn-success">تعديل</a>
            </div>
        </div>
        <div class="card-body">
            <p><strong>المنصب:</strong> {{ $employee->position }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $employee->email ?? 'لا يوجد' }}</p>
            <p><strong>الهاتف:</strong> {{ $employee->phone ?? 'لا يوجد' }}</p>
            <p><strong>الراتب:</strong> {{ number_format($employee->salary, 2) }} {{ $employee->currency }}</p>
            <hr>
            <h4>المعلومات البنكية</h4>
            {{-- ===== عرض البيانات من خلال العلاقة ===== --}}
            @if($employee->bankAccount)
                <p><strong>البنك:</strong> {{ $employee->bankAccount->bank->name ?? 'N/A' }}</p>
                <p><strong>اسم الحساب:</strong> {{ $employee->bankAccount->account_name }}</p>
                <p><strong>رقم الحساب:</strong> {{ $employee->bankAccount->account_number }}</p>
                <p><strong>عملة الحساب:</strong> {{ $employee->bankAccount->currency }}</p>
            @else
                <p class="text-muted">لا يوجد حساب بنكي مرتبط بهذا الموظف (يتم الدفع نقداً).</p>
            @endif
        </div>
    </div>
</main>
@endsection
