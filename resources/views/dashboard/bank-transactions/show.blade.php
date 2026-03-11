@extends('layouts.container')
@section('title', 'تفاصيل الحركة البنكية')

@push('styles')
<style>
    .details-card {
        border-left: 5px solid #50cd89; /* لون مميز للبطاقة */
    }
    .detail-item {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px solid #eff2f5;
    }
    .detail-item:last-child {
        border-bottom: none;
    }
    .detail-item strong {
        color: #5e6278;
    }
    .detail-item span {
        color: #181c32;
        font-weight: 500;
    }
    .badge-custom {
        font-size: 1rem;
        padding: 0.5em 0.9em;
    }
</style>
@endpush

@section('content')
<div class="card card-custom gutter-b details-card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">تفاصيل الحركة رقم: #{{ $bankTransaction->id }}</h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.bank-transactions.edit', $bankTransaction->id) }}" class="btn btn-primary btn-sm mr-2">
                <i class="la la-edit"></i> تعديل
            </a>
            <a href="{{ route('dashboard.bank-transactions.index') }}" class="btn btn-secondary btn-sm">
                <i class="la la-arrow-left"></i> العودة للقائمة
            </a>
        </div>
    </div>
    <div class="card-body">
        {{-- القسم الأول: التفاصيل الأساسية --}}
        <h4 class="mb-4 text-dark">1. التفاصيل الأساسية</h4>
        <div class="pl-5">
            <div class="detail-item">
                <strong>تاريخ الحركة:</strong>
                <span>{{ $bankTransaction->transaction_date->format('d-m-Y') }}</span>
            </div>
            <div class="detail-item">
                <strong>نوع الحركة:</strong>
                <span>
                    @if($bankTransaction->type == 'deposit') <span class="badge badge-success badge-custom">إيداع</span>
                    @elseif($bankTransaction->type == 'withdrawal') <span class="badge badge-danger badge-custom">سحب</span>
                    @else <span class="badge badge-info badge-custom">تحويل</span> @endif
                </span>
            </div>
            <div class="detail-item">
                <strong>المبلغ:</strong>
                <span class="font-weight-bolder {{ $bankTransaction->type == 'deposit' ? 'text-success' : 'text-danger' }}">
                    {{ number_format($bankTransaction->amount, 2) }} {{ $bankTransaction->currency }}
                </span>
            </div>
            <div class="detail-item">
                <strong>الحالة:</strong>
                <span>
                    @if($bankTransaction->status == 'completed') <span class="badge badge-light-success">مكتملة</span>
                    @elseif($bankTransaction->status == 'pending') <span class="badge badge-light-warning">معلقة</span>
                    @else <span class="badge badge-light-danger">ملغاة</span> @endif
                </span>
            </div>
        </div>

        <div class="separator separator-dashed my-8"></div>

        {{-- القسم الثاني: تفاصيل الحسابات --}}
        <h4 class="mb-4 text-dark">2. تفاصيل الحسابات</h4>
        <div class="pl-5">
            @if($bankTransaction->type == 'deposit')
                <div class="detail-item">
                    <strong>إلى حساب (المستقبل):</strong>
                    <span>
                        {{ $bankTransaction->toAccount->account_name ?? 'غير محدد' }}
                        <small class="text-muted">({{ $bankTransaction->toAccount->bank->name ?? 'N/A' }})</small>
                    </span>
                </div>
            @elseif($bankTransaction->type == 'withdrawal')
                <div class="detail-item">
                    <strong>من حساب (المرسل):</strong>
                    <span>
                        {{ $bankTransaction->fromAccount->account_name ?? 'غير محدد' }}
                        <small class="text-muted">({{ $bankTransaction->fromAccount->bank->name ?? 'N/A' }})</small>
                    </span>
                </div>
            @elseif($bankTransaction->type == 'transfer')
                <div class="detail-item">
                    <strong>من حساب (المرسل):</strong>
                    <span>
                        {{ $bankTransaction->fromAccount->account_name ?? 'غير محدد' }}
                        <small class="text-muted">({{ $bankTransaction->fromAccount->bank->name ?? 'N/A' }})</small>
                    </span>
                </div>
                <div class="detail-item">
                    <strong>إلى حساب (المستقبل):</strong>
                    <span>
                        {{ $bankTransaction->toAccount->account_name ?? 'غير محدد' }}
                        <small class="text-muted">({{ $bankTransaction->toAccount->bank->name ?? 'N/A' }})</small>
                    </span>
                </div>
            @endif
        </div>

        <div class="separator separator-dashed my-8"></div>

        {{-- القسم الثالث: معلومات إضافية --}}
        <h4 class="mb-4 text-dark">3. معلومات إضافية</h4>
        <div class="pl-5">
            <div class="detail-item">
                <strong>البيان / الوصف:</strong>
                <span>{{ $bankTransaction->details ?? 'لا يوجد' }}</span>
            </div>
            <div class="detail-item">
                <strong>ملاحظات داخلية:</strong>
                <span>{{ $bankTransaction->notes ?? 'لا يوجد' }}</span>
            </div>
            @if($bankTransaction->related_transaction_id)
                <div class="detail-item">
                    <strong>الحركة المرتبطة:</strong>
                    <span>
                        <a href="{{ route('dashboard.bank-transactions.show', $bankTransaction->related_transaction_id) }}">
                            عرض الحركة #{{ $bankTransaction->related_transaction_id }}
                        </a>
                    </span>
                </div>
            @endif
        </div>

        <div class="separator separator-dashed my-8"></div>

        {{-- القسم الرابع: معلومات النظام --}}
        <h4 class="mb-4 text-dark">4. معلومات النظام</h4>
        <div class="pl-5">
            <div class="detail-item">
                <strong>تاريخ الإنشاء:</strong>
                <span>{{ $bankTransaction->created_at->format('Y-m-d H:i A') }}</span>
            </div>
            <div class="detail-item">
                <strong>آخر تحديث:</strong>
                <span>{{ $bankTransaction->updated_at->format('Y-m-d H:i A') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
