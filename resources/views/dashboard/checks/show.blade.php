@extends('layouts.container')
@section('title', 'تفاصيل الشيك رقم: ' . $check->check_number)

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">تفاصيل الشيك: {{ $check->party_name }}</h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.checks.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                <i class="la la-arrow-right"></i> عودة للقائمة
            </a>
            <a href="{{ route('dashboard.checks.edit', $check->id) }}" class="btn btn-warning font-weight-bolder">
                <i class="la la-edit"></i> تعديل البيانات
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-6">
            <div class="col-md-4">
                <label class="text-muted">رقم الشيك:</label>
                <p class="font-weight-bold font-size-h4">{{ $check->check_number }}</p>
            </div>
            <div class="col-md-4">
                <label class="text-muted">اسم البنك:</label>
                <p class="font-weight-bold font-size-h4">{{ $check->bank_name }}</p>
            </div>
            <div class="col-md-4">
                <label class="text-muted">نوع الشيك:</label>
                <p>
                    @if($check->type == 'receivable')
                        <span class="label label-xl label-light-success label-inline">وارد (قبض)</span>
                    @else
                        <span class="label label-xl label-light-danger label-inline">صادر (دفع)</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="row mb-6">
            <div class="col-md-4">
                <label class="text-muted">تاريخ التحرير:</label>
                <p class="font-weight-bold">{{ $check->issue_date->format('Y-m-d') }}</p>
            </div>
            <div class="col-md-4">
                <label class="text-muted">تاريخ الاستحقاق:</label>
                <p class="font-weight-bold text-primary font-size-h4">{{ $check->due_date->format('Y-m-d') }}</p>
            </div>
            <div class="col-md-4">
                <label class="text-muted">الطرف الثاني:</label>
                <p class="font-weight-bold font-size-h4">{{ $check->party_name }}</p>
            </div>
        </div>

        <div class="separator separator-dashed my-8"></div>

        <div class="row mb-6">
            <div class="col-md-4">
                <label class="text-muted">المبلغ:</label>
                <p class="font-weight-bold font-size-h3 text-dark">{{ number_format($check->amount, 2) }} {{ $check->currency }}</p>
            </div>
            <div class="col-md-4">
                <label class="text-muted">سعر الصرف:</label>
                <p class="font-weight-bold">{{ $check->exchange_rate }}</p>
            </div>
            <div class="col-md-4">
                <label class="text-muted">القيمة بالشيكل:</label>
                <p class="font-weight-bold text-success font-size-h3">{{ number_format($check->amount_ils, 2) }} ILS</p>
            </div>
        </div>

        <div class="separator separator-dashed my-8"></div>

        <div class="row mb-6">
            <div class="col-md-6">
                <label class="text-muted">الحساب البنكي المرتبط:</label>
                <p class="font-weight-bold">
                    @if($check->type == 'receivable')
                        {{ $check->depositBankAccount->account_name ?? 'غير محدد' }}
                    @else
                        {{ $check->paymentBankAccount->account_name ?? 'غير محدد' }}
                    @endif
                </p>
            </div>
            <div class="col-md-3">
                <label class="text-muted">المشروع:</label>
                <p class="font-weight-bold">{{ $check->project->name ?? 'غير مرتبط بمشروع' }}</p>
            </div>
            <div class="col-md-3">
                <label class="text-muted">الوحدة العقارية:</label>
                <p class="font-weight-bold">{{ $check->projectUnit->unit_number ?? 'غير مرتبط بوحدة' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label class="text-muted">ملاحظات:</label>
                <div class="bg-light p-5 rounded">
                    {{ $check->notes ?: 'لا توجد ملاحظات إضافية' }}
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <form action="{{ route('dashboard.checks.destroy', $check->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger font-weight-bold" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف الشيك</button>
        </form>
        <p class="text-muted font-size-sm">تاريخ الإضافة: {{ $check->created_at->format('Y-m-d H:i') }}</p>
    </div>
</div>
@endsection
