@extends('layouts.container')
@section('title', 'سند ' . ($transaction->type == 'in' ? 'قبض' : 'صرف') . ' رقم: ' . $transaction->voucher_id)

@push('styles')
<style>
    .voucher-container { max-width: 800px; margin: 40px auto; background: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-top: 8px solid {{ $transaction->type == 'in' ? '#28a745' : '#dc3545' }}; }
    .voucher-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 40px; }
    .voucher-header .logo { font-size: 1.8rem; font-weight: bold; color: #333; }
    .voucher-title { text-align: center; margin-bottom: 30px; }
    .voucher-title h1 { font-size: 2.5rem; font-weight: 700; color: #333; border-bottom: 2px solid #eee; padding-bottom: 10px; display: inline-block; }
    .voucher-details { font-size: 1.1rem; line-height: 2; }
    .voucher-details strong { min-width: 120px; display: inline-block; }
    .amount-in-words { background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 30px; font-weight: bold; text-align: center; }
    .voucher-footer { display: flex; justify-content: space-between; margin-top: 60px; text-align: center; }
    .signature-box { border-top: 1px solid #ccc; padding-top: 10px; width: 200px; }
    @media print {
        body * { visibility: hidden; }
        .voucher-container, .voucher-container * { visibility: visible; }
        .voucher-container { position: absolute; left: 0; top: 0; width: 100%; margin: 0; padding: 20px; box-shadow: none; border-radius: 0; }
        .no-print { display: none; }
    }
</style>
@endpush

@section('content')
<div class="text-center mb-4 no-print">
    <a href="{{ route('dashboard.cash.index') }}" class="btn btn-secondary mr-2"><i class="la la-arrow-right"></i> العودة للكشف</a>
    <button onclick="window.print();" class="btn btn-primary"><i class="la la-print"></i> طباعة السند</button>
</div>

<div class="voucher-container">
    <div class="voucher-header">
        <div class="logo">اسم شركتك</div>
        <div>
            <div><strong>التاريخ:</strong> {{ $transaction->transaction_date->format('Y-m-d') }}</div>
            <div><strong>رقم السند:</strong> {{ $transaction->voucher_id }}</div>
        </div>
    </div>

    <div class="voucher-title">
        <h1>سند {{ $transaction->type == 'in' ? 'قبض' : 'صرف' }}</h1>
    </div>

    <div class="voucher-details">
        <div><strong>{{ $transaction->type == 'in' ? 'استلمنا من السيد/السادة:' : 'صرفنا للسيد/السادة:' }}</strong> {{ $transaction->source }}</div>
        <div><strong>مبلغ وقدره:</strong> <span class="font-weight-bolder h4">{{ number_format($transaction->amount, 2) }} {{ $transaction->currency }}</span></div>
        <div class="amount-in-words">
            فقط {{ number_format($transaction->amount, 2) }} {{ $transaction->currency }} لا غير
        </div>
        <div><strong>وذلك عن:</strong> {{ $transaction->details ?? $transaction->source }}</div>
    </div>

    <div class="voucher-footer">
        <div class="signature-box">المستلم</div>
        <div class="signature-box">المحاسب</div>
    </div>
</div>
@endsection
