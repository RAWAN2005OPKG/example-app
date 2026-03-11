@extends('layouts.container')
@section('title', 'تفاصيل القيد رقم ' . $payment->id)

@push('styles')
<style>
    .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, .15); font-size: 16px; line-height: 24px; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #555; }
    .invoice-box table { width: 100%; line-height: inherit; text-align: left; }
    .invoice-box table td { padding: 5px; vertical-align: top; }
    .invoice-box table tr.top table td { padding-bottom: 20px; }
    .invoice-box table tr.information table td { padding-bottom: 40px; }
    .invoice-box table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; text-align: right; }
    .invoice-box table tr.details td { padding-bottom: 20px; text-align: right; }
    .invoice-box table tr.item td { border-bottom: 1px solid #eee; text-align: right; }
    .invoice-box table tr.total td:nth-child(2) { border-top: 2px solid #eee; font-weight: bold; }
    .rtl { direction: rtl; font-family: 'Tajawal', sans-serif; }
    .text-left { text-align: left !important; }
    @media print {
        body, .invoice-box { -webkit-print-color-adjust: exact; }
        .no-print { display: none; }
        .invoice-box { box-shadow: none; border: none; margin: 0; padding: 0; }
    }
</style>
@endpush

@section('content')
<div class="no-print mb-4 text-center">
    <button onclick="window.print();" class="btn btn-primary"><i class="fas fa-print"></i> طباعة</button>
    <a href="{{ route('dashboard.payments.edit', $payment->id) }}" class="btn btn-success"><i class="fas fa-edit"></i> تعديل</a>
</div>

<div class="invoice-box rtl">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            {{-- <img src="logo.png" style="width:100%; max-width:300px;"> --}}
                            <h2>سند {{ $payment->type == 'in' ? 'قبض' : 'صرف' }}</h2>
                        </td>
                        <td class="text-left">
                            رقم السند: #{{ $payment->id }}

                            تاريخ الإنشاء: {{ $payment->created_at->format('Y-m-d') }}

                            تاريخ القيد: {{ $payment->payment_date->format('Y-m-d') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <strong>من/إلى: {{ $payment->payable->name ?? 'كيان محذوف' }}</strong>

                            الرقم التعريفي: {{ $payment->payable->unique_id ?? 'N/A' }}

                            الجوال: {{ $payment->payable->phone ?? 'N/A' }}
                        </td>
                        <td class="text-left">
                            @if($payment->contract)
                                <strong>العقد المرتبط: #{{ $payment->contract_id }}</strong>

                                المشروع: {{ $payment->contract->project->name ?? 'غير محدد' }}
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="heading">
            <td>وصف الحركة</td>
            <td class="text-left">المبلغ</td>
        </tr>
        <tr class="item">
            <td>
                دفعة {{ $payment->type == 'in' ? 'مقبوضة' : 'مصروفة' }}
                @if($payment->notes)
<small>ملاحظات: {{ $payment->notes }}</small> @endif
            </td>
            <td class="text-left">{{ number_format($payment->amount, 2) }} {{ $payment->currency }}</td>
        </tr>
        @if($payment->currency !== 'ILS')
        <tr class="item">
            <td>سعر الصرف: {{ $payment->exchange_rate }}</td>
            <td class="text-left">القيمة بالشيكل: {{ number_format($payment->amount * $payment->exchange_rate, 2) }} ILS</td>
        </tr>
        @endif
        <tr class="heading">
            <td>تفاصيل الدفع ({{ $payment->method }})</td>
            <td></td>
        </tr>
        @if($payment->method == 'cash' && $payment->details)
            <tr class="details"><td>تم التسليم بواسطة: {{ $payment->details->delivered_by }}</td><td class="text-left">تم الاستلام بواسطة: {{ $payment->details->received_by }}</td></tr>
        @elseif($payment->method == 'check' && $payment->details)
            <tr class="details"><td>رقم الشيك: {{ $payment->details->check_number }}</td><td class="text-left">تاريخ الاستحقاق: {{ $payment->details->due_date }}</td></tr>
            <tr class="details"><td>اسم المالك: {{ $payment->details->check_owner }}</td><td></td></tr>
        @elseif($payment->method == 'bank_transfer' && $payment->details)
            <tr class="details"><td>من حساب: {{ $payment->details->senderBankAccount->full_name ?? 'N/A' }}</td><td class="text-left">إلى حساب: {{ $payment->details->receiverBankAccount->full_name ?? 'N/A' }}</td></tr>
            <tr class="details"><td>مرجع التحويل: {{ $payment->details->transaction_reference }}</td><td></td></tr>
        @endif
    </table>
</div>
@endsection
