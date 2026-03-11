@extends('layouts.container')
@section('title', 'عرض سند محمد رقم ' . $voucher->id)

@push('styles')
<style>
    .details-card { border: 1px solid #eee; border-radius: 8px; }
    .details-card .card-header { background-color: #f7f7f7; }
    .details-card .list-group-item { border-left: 0; border-right: 0; }
    .details-card .list-group-item strong { min-width: 150px; display: inline-block; }
</style>
@endpush

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-receipt text-info mr-2"></i>
            تفاصيل السند رقم: {{ $voucher->id }}
        </h3>
        <div class="card-toolbar">
            <a href="#" class="btn btn-light-primary font-weight-bold mr-2" onclick="window.print();"><i class="fas fa-print"></i> طباعة</a>
            <a href="{{ route('dashboard.mohammed.index') }}" class="btn btn-secondary">العودة إلى القائمة</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            {{-- معلومات السند الأساسية --}}
            <div class="col-md-6">
                <div class="card details-card mb-5">
                    <div class="card-header"><h5 class="card-title m-0">المعلومات الأساسية</h5></div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>رقم السند:</strong> {{ $voucher->id }}</li>
                        <li class="list-group-item"><strong>تاريخ السند:</strong> {{ $voucher->voucher_date->format('d-m-Y') }}</li>
                        <li class="list-group-item"><strong>نوع السند:</strong> 
                            @if($voucher->type == 'receipt')<span class="badge badge-success">سند قبض</span>@else<span class="badge badge-danger">سند صرف</span>@endif
                        </li>
                        <li class="list-group-item"><strong>البيان:</strong> {{ $voucher->description }}</li>
                        <li class="list-group-item"><strong>أنشئ بواسطة:</strong> {{ $voucher->user->name ?? 'غير معروف' }}</li>
                        <li class="list-group-item"><strong>تاريخ الإنشاء:</strong> {{ $voucher->created_at->format('d-m-Y H:i A') }}</li>
                    </ul>
                </div>
            </div>

            {{-- المعلومات المالية --}}
            <div class="col-md-6">
                <div class="card details-card mb-5">
                    <div class="card-header"><h5 class="card-title m-0">المعلومات المالية</h5></div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>المبلغ:</strong> <span class="font-weight-bolder h4 text-success">{{ number_format($voucher->amount, 2) }} {{ $voucher->currency }}</span></li>
                        <li class="list-group-item"><strong>سعر الصرف:</strong> {{ number_format($voucher->exchange_rate, 4) }}</li>
                        <li class="list-group-item"><strong>القيمة بالشيكل:</strong> {{ number_format($voucher->amount * $voucher->exchange_rate, 2) }} ILS</li>
                        <li class="list-group-item"><strong>طريقة الدفع:</strong> {{ $voucher->payment_method }}</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- تفاصيل طريقة الدفع --}}
        <div class="card details-card mb-5">
            <div class="card-header"><h5 class="card-title m-0">تفاصيل طريقة الدفع</h5></div>
            <div class="card-body">
                @if($voucher->payment_method == 'cash' && $voucher->details)
                    <p><strong>{{ $voucher->type == 'receipt' ? 'تم القبض من' : 'تم الصرف إلى' }}:</strong> <span class="font-weight-bold">{{ $voucher->details->cash_source_name }}</span></p>
                    <p><strong>اسم المستلم/المسلم:</strong> {{ $voucher->details->handler_name ?? '-' }}</p>
                @elseif($voucher->payment_method == 'check' && $voucher->details)
                    <p><strong>رقم الشيك:</strong> {{ $voucher->details->check_number }}</p>
                    <p><strong>اسم صاحب الشيك:</strong> {{ $voucher->details->check_owner_name }}</p>
                    <p><strong>اسم البنك:</strong> {{ $voucher->details->check_bank_name }}</p>
                    <p><strong>تاريخ الاستحقاق:</strong> {{ \Carbon\Carbon::parse($voucher->details->check_due_date)->format('d-m-Y') }}</p>
                @elseif($voucher->payment_method == 'bank_transfer' && $voucher->details)
                    <p><strong>من حساب بنكي:</strong> {{ $voucher->details->fromBankAccount->account_name ?? '-' }}</p>
                    <p><strong>إلى حساب بنكي:</strong> {{ $voucher->details->toBankAccount->account_name ?? '-' }}</p>
                @else
                    <p class="text-muted">لا توجد تفاصيل إضافية لطريقة الدفع هذه.</p>
                @endif
            </div>
        </div>

        {{-- معلومات الربط --}}
        <div class="card details-card">
            <div class="card-header"><h5 class="card-title m-0">معلومات الربط</h5></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>المشروع المرتبط:</strong> {{ $voucher->project->name ?? '-' }}</li>
                <li class="list-group-item"><strong>العميل المرتبط:</strong> {{ $voucher->client->name ?? '-' }}</li>
                <li class="list-group-item"><strong>المستثمر المرتبط:</strong> {{ $voucher->investor->name ?? '-' }}</li>
                <li class="list-group-item"><strong>ملاحظات:</strong> {{ $voucher->notes ?? '-' }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
