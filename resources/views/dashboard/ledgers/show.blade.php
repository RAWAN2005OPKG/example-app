@extends('layouts.container')
@section('title', $pageTitle)

@push('styles')
<style>
    .details-card {
        font-size: 1.1rem;
    }
    .details-card .detail-item {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem 0;
        border-bottom: 1px solid #f1f1f1;
    }
    .details-card .detail-item:last-child {
        border-bottom: none;
    }
    .details-card .detail-item strong {
        color: #5e6278;
    }
    .details-card .detail-item span {
        color: #181c32;
        font-weight: 500;
    }
    .details-section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #181c32;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eff2f5;
    }
    .badge-lg {
        font-size: 1rem;
        padding: 0.5em 0.8em;
    }
</style>
@endpush

@section('content')
<div class="card card-custom gutter-b details-card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{ $pageTitle }}</h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route($routeName.'.edit', $voucher->id) }}" class="btn btn-primary font-weight-bold mr-2">
                <i class="la la-edit"></i> تعديل
            </a>
            <a href="{{ route($routeName.'.index') }}" class="btn btn-secondary font-weight-bold">
                <i class="la la-arrow-left"></i> العودة للقائمة
            </a>
        </div>
    </div>
    <div class="card-body">
        {{-- 1. تفاصيل السند الأساسية --}}
        <div class="row">
            <div class="col-lg-6">
                <h4 class="details-section-title">المعلومات الأساسية</h4>
                <div class="detail-item"><strong>الرقم التسلسلي:</strong> <span>{{ $voucher->serial_number }}</span></div>
                <div class="detail-item"><strong>تاريخ السند:</strong> <span>{{ $voucher->voucher_date->format('d / m / Y') }}</span></div>
                <div class="detail-item">
                    <strong>نوع السند:</strong>
                    <span>
                        @if($voucher->type == 'receipt')
                            <span class="badge badge-lg badge-light-success">سند قبض</span>
                        @else
                            <span class="badge badge-lg badge-light-danger">سند صرف</span>
                        @endif
                    </span>
                </div>
                <div class="detail-item"><strong>البيان والوصف:</strong> <span>{{ $voucher->description }}</span></div>
            </div>

            {{-- 2. تفاصيل المبلغ --}}
            <div class="col-lg-6">
                <h4 class="details-section-title">المعلومات المالية</h4>
                <div class="detail-item"><strong>المبلغ:</strong> <span class="font-weight-bolder text-primary">{{ number_format($voucher->amount, 2) }} {{ $voucher->currency }}</span></div>
                @if($voucher->currency !== 'ILS')
                    <div class="detail-item"><strong>سعر الصرف:</strong> <span>{{ number_format($voucher->exchange_rate, 4) }}</span></div>
                    <div class="detail-item"><strong>القيمة بالشيكل:</strong> <span class="font-weight-bolder">{{ number_format($voucher->amount_ils, 2) }} ILS</span></div>
                @endif
            </div>
        </div>

        <div class="separator separator-dashed my-10"></div>

        {{-- 3. تفاصيل طريقة الدفع --}}
        <div class="row">
            <div class="col-12">
                <h4 class="details-section-title">تفاصيل طريقة الدفع</h4>
                <div class="detail-item">
                    <strong>الطريقة:</strong>
                    <span>
                        @if($voucher->payment_method == 'cash')
                            <span class="font-weight-bold">نقدي <i class="fas fa-money-bill-wave text-success ml-2"></i></span>
                        @elseif($voucher->payment_method == 'bank_transfer')
                            <span class="font-weight-bold">تحويل بنكي <i class="fas fa-university text-primary ml-2"></i></span>
                        @elseif($voucher->payment_method == 'check')
                            <span class="font-weight-bold">شيك <i class="fas fa-money-check-alt text-warning ml-2"></i></span>
                        @endif
                    </span>
                </div>

                {{-- عرض التفاصيل بناءً على الطريقة --}}
                @if($voucher->payment_method == 'cash')
                    <div class="detail-item"><strong>الخزنة:</strong> <span>{{ $voucher->cashSafe->name ?? 'غير محدد' }}</span></div>
                    <div class="detail-item"><strong>اسم المستلم/المسلم:</strong> <span>{{ $voucher->handler_name ?? 'لم يحدد' }}</span></div>
                    <div class="detail-item"><strong>الوظيفة:</strong> <span>{{ $voucher->handler_role ?? 'لم تحدد' }}</span></div>
                @elseif($voucher->payment_method == 'bank_transfer')
                    <div class="detail-item"><strong>من حساب:</strong> <span>{{ $voucher->fromBankAccount->account_name ?? 'غير محدد' }} ({{ $voucher->fromBankAccount->bank->name ?? '' }})</span></div>
                    <div class="detail-item"><strong>إلى حساب:</strong> <span>{{ $voucher->toBankAccount->account_name ?? 'غير محدد' }} ({{ $voucher->toBankAccount->bank->name ?? '' }})</span></div>
                @elseif($voucher->payment_method == 'check')
                    <div class="detail-item"><strong>رقم الشيك:</strong> <span>{{ $voucher->check_number }}</span></div>
                    <div class="detail-item"><strong>اسم صاحب الشيك (الساحب):</strong> <span>{{ $voucher->check_owner_name }}</span></div>
                    <div class="detail-item"><strong>اسم البنك:</strong> <span>{{ $voucher->check_bank_name }}</span></div>
                    <div class="detail-item"><strong>تاريخ الاستحقاق:</strong> <span>{{ $voucher->check_due_date->format('d / m / Y') }}</span></div>
                @endif
            </div>
        </div>

        <div class="separator separator-dashed my-10"></div>

        {{-- 4. معلومات إضافية --}}
        <div class="row">
            <div class="col-12">
                <h4 class="details-section-title">معلومات إضافية</h4>
                <div class="detail-item"><strong>المشروع المرتبط:</strong> <span>{{ $voucher->project->name ?? 'لا يوجد' }}</span></div>
                <div class="detail-item"><strong>ملاحظات:</strong> <span>{{ $voucher->notes ?? 'لا توجد ملاحظات' }}</span></div>
                <div class="detail-item"><strong>تاريخ الإنشاء:</strong> <span>{{ $voucher->created_at->format('Y-m-d H:i A') }}</span></div>
                <div class="detail-item"><strong>آخر تحديث:</strong> <span>{{ $voucher->updated_at->format('Y-m-d H:i A') }}</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
