@extends('layouts.container')
@section('title', 'تفاصيل سند خالد #' . $khaled->id)

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="card-title">تفاصيل السند رقم: {{ $khaled->id }}</h4>
            <div>
                <a href="{{ route('dashboard.khaled.edit', $khaled->id) }}" class="btn btn-primary">تعديل</a>
                <a href="{{ route('dashboard.khaled.index') }}" class="btn btn-secondary">العودة للقائمة</a>
                {{-- Add Print Button if needed --}}
                {{-- <button onclick="window.print()" class="btn btn-info">طباعة</button> --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        {{-- Basic Information --}}
        <div class="mb-4">
            <h5>المعلومات الأساسية</h5>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 20%;">رقم السند</th>
                    <td>{{ $khaled->id }}</td>
                </tr>
                <tr>
                    <th>تاريخ السند</th>
                    <td>{{ $khaled->voucher_date->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>نوع السند</th>
                    <td><span class="badge {{ $khaled->type == 'receipt' ? 'badge-success' : 'badge-danger' }}">{{ $khaled->type == 'receipt' ? 'قبض' : 'صرف' }}</span></td>
                </tr>
                <tr>
                    <th>البيان / الوصف</th>
                    <td>{{ $khaled->description }}</td>
                </tr>
            </table>
        </div>

        {{-- Amount Details --}}
        <div class="mb-4">
            <h5>تفاصيل المبلغ</h5>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 20%;">المبلغ</th>
                    <td>{{ number_format($khaled->amount, 2) }} {{ $khaled->currency }}</td>
                </tr>
                @if($khaled->currency !== 'ILS')
                <tr>
                    <th>سعر الصرف</th>
                    <td>{{ number_format($khaled->exchange_rate, 4) }}</td>
                </tr>
                @endif
                <tr>
                    <th>القيمة النهائية بالشيكل</th>
                    <td><strong>{{ number_format($khaled->amount_ils, 2) }} ILS</strong></td>
                </tr>
            </table>
        </div>

        {{-- Payment Details --}}
        <div class="mb-4">
            <h5>تفاصيل الدفع ({{ $khaled->payment_method == 'cash' ? 'نقدي' : ($khaled->payment_method == 'check' ? 'شيك' : 'تحويل بنكي') }})</h5>
            <table class="table table-bordered">
                @if($khaled->payment_method == 'cash')
                    <tr><th style="width: 20%;">الخزينة</th><td>{{ $khaled->cashSafe->name ?? 'N/A' }}</td></tr>
                    <tr><th>اسم المستلم/المسلم</th><td>{{ $khaled->handler_name ?? '-' }}</td></tr>
                    <tr><th>الوظيفة</th><td>{{ $khaled->handler_role ?? '-' }}</td></tr>
                @elseif($khaled->payment_method == 'check')
                    <tr><th style="width: 20%;">رقم الشيك</th><td>{{ $khaled->check_number }}</td></tr>
                    <tr><th>اسم الساحب</th><td>{{ $khaled->check_owner_name }}</td></tr>
                    <tr><th>اسم البنك</th><td>{{ $khaled->check_bank_name }}</td></tr>
                    <tr><th>تاريخ الاستحقاق</th><td>{{ $khaled->check_due_date->format('d-m-Y') }}</td></tr>
                @elseif($khaled->payment_method == 'bank_transfer')
                    <tr><th style="width: 20%;">من حساب</th><td>{{ $khaled->fromBankAccount->account_name ?? '-' }} ({{ $khaled->fromBankAccount->bank->name ?? '' }})</td></tr>
                    <tr><th>إلى حساب</th><td>{{ $khaled->toBankAccount->account_name ?? '-' }} ({{ $khaled->toBankAccount->bank->name ?? '' }})</td></tr>
                @endif
            </table>
        </div>

        {{-- Linked Information --}}
        <div class="mb-4">
            <h5>معلومات الربط</h5>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 20%;">المشروع</th>
                    <td>{{ $khaled->project->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>العميل</th>
                    <td>{{ $khaled->client->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>المستثمر</th>
                    <td>{{ $khaled->investor->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>ملاحظات</th>
                    <td>{{ $khaled->notes ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
