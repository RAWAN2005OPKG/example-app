@extends('layouts.container')
@section('title', $pageTitle)

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">{{ $pageTitle }}</h3>
        <div class="card-toolbar">
            <a href="{{ route($routeName.'.edit', $voucher->id) }}" class="btn btn-primary mr-2">تعديل</a>
            <a href="{{ route($routeName.'.index') }}" class="btn btn-secondary">العودة للقائمة</a>
        </div>
    </div>
    <div class="card-body">
        {{-- عرض كل تفاصيل السند هنا بشكل منسق --}}
        <div class="row">
            <div class="col-md-6">
                <p><strong>الرقم التسلسلي:</strong> {{ $voucher->serial_number }}</p>
                <p><strong>التاريخ:</strong> {{ $voucher->voucher_date->format('d-m-Y') }}</p>
                <p><strong>النوع:</strong> {{ $voucher->type == 'receipt' ? 'سند قبض' : 'سند صرف' }}</p>
                <p><strong>البيان:</strong> {{ $voucher->description }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>المبلغ:</strong> {{ number_format($voucher->amount, 2) }} {{ $voucher->currency }}</p>
                @if($voucher->currency !== 'ILS')
                <p><strong>سعر الصرف:</strong> {{ $voucher->exchange_rate }}</p>
                <p><strong>المبلغ بالشيكل:</strong> {{ number_format($voucher->amount_ils, 2) }} ILS</p>
                @endif
            </div>
        </div>
        <hr>
        <h4>تفاصيل الدفع</h4>
        {{-- عرض تفاصيل الدفع بناءً على النوع --}}
        @if($voucher->payment_method == 'cash')
            <p><strong>الخزنة:</strong> {{ $voucher->cashSafe->name ?? 'N/A' }}</p>
            <p><strong>المستلم/المسلم:</strong> {{ $voucher->handler_name ?? 'N/A' }}</p>
        @elseif($voucher->payment_method == 'bank_transfer')
            <p><strong>من حساب:</strong> {{ $voucher->fromBankAccount->account_name ?? 'N/A' }}</p>
            <p><strong>إلى حساب:</strong> {{ $voucher->toBankAccount->account_name ?? 'N/A' }}</p>
        @elseif($voucher->payment_method == 'check')
            {{-- تفاصيل الشيك --}}
        @endif
    </div>
</div>
@endsection
