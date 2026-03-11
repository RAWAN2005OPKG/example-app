@extends('layouts.container')
@section('title', 'مركز التنبيهات')

@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-bell text-primary"></i>
            </span>
            <h3 class="card-label">مركز التنبيهات</h3>
        </div>
    </div>
    <div class="card-body">
        <p class="text-muted">هذه الصفحة تجمع لك كل الإشعارات الهامة التي تتطلب إجراءً منك.</p>

        <!-- Section: Upcoming Checks -->
        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">
                <h4 class="alert-heading">تنبيه: شيكات مستحقة قريباً</h4>
                <p>قائمة بالشيكات التي سيحين موعد استحقاقها خلال السبعة أيام القادمة.</p>
                @if($upcomingChecks->isEmpty())
                    <p>لا توجد شيكات مستحقة قريباً.</p>
                @else
                    <ul>
                        @foreach($upcomingChecks as $check)
                            <li>
                                <strong>شيك رقم {{ $check->cheque_number }}</strong>
                                بمبلغ ({{ number_format($check->amount, 2) }} {{ $check->currency }})
                                - تاريخ الاستحقاق: <span class="font-weight-bolder">{{ $check->due_date->format('Y-m-d') }}</span>
                                (<a href="{{ route('dashboard.checks.edit', $check->id) }}">عرض التفاصيل</a>)
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <!-- Section: Returned Checks -->
        <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
            <div class="alert-icon"><i class="flaticon-cancel"></i></div>
            <div class="alert-text">
                <h4 class="alert-heading">تنبيه: شيكات مرتجعة</h4>
                <p>قائمة بالشيكات التي تم تسجيلها كـ "مرتجعة" وتتطلب متابعة.</p>
                @if($returnedChecks->isEmpty())
                    <p>لا توجد شيكات مرتجعة حالياً.</p>
                @else
                    <ul>
                        @foreach($returnedChecks as $check)
                            <li>
                                <strong>شيك رقم {{ $check->cheque_number }}</strong>
                                بمبلغ ({{ number_format($check->amount, 2) }} {{ $check->currency }})
                                - من: {{ $check->holder_name }}
                                (<a href="{{ route('dashboard.checks.edit', $check->id) }}">عرض التفاصيل</a>)
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        {{-- يمكنك إضافة المزيد من كروت التنبيهات هنا --}}

    </div>
</div>
<!--end::Card-->
@endsection
