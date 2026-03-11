@extends('layouts.container')
@section('title', 'المركز المالي')

@push('styles')
<style>
    .kpi-card .card-body {
        padding: 1.5rem;
    }
    .kpi-card .display-4 {
        font-size: 2.25rem;
    }
    .table th {
        font-weight: 600 !important;
    }
    .nav-tabs .nav-link {
        padding: 1rem 1.5rem;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="h2 mb-0 text-gray-800 font-weight-bolder">المركز المالي</h1>
    </div>

    <!-- Totals KPI Cards -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card card-custom shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="symbol symbol-50 symbol-light-success mr-5">
                        <span class="symbol-label"><i class="fas fa-cash-register text-success"></i></span>
                    </div>
                    <div class="d-flex flex-column flex-grow-1">
                        <a href="#" class="font-weight-bolder text-dark-75 font-size-lg mb-1">أرصدة الخزائن (الكاش)</a>
                        {{-- يتم تمرير هذا المتغير من المتحكم --}}
                        <span class="text-muted font-weight-bold font-size-h4">{{ number_format($totalCashBalance, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card card-custom shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="symbol symbol-50 symbol-light-primary mr-5">
                        <span class="symbol-label"><i class="fas fa-university text-primary"></i></span>
                    </div>
                    <div class="d-flex flex-column flex-grow-1">
                        <a href="{{-- route('dashboard.bank-accounts.index') --}}" class="font-weight-bolder text-dark-75 font-size-lg mb-1">أرصدة البنوك</a>
                        <span class="text-muted font-weight-bold font-size-h4">{{ number_format($totalBankBalance, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card card-custom shadow-sm h-100 bg-light-info">
                <div class="card-body d-flex align-items-center">
                    <div class="symbol symbol-50 symbol-light-info mr-5">
                        <span class="symbol-label"><i class="fas fa-wallet text-info"></i></span>
                    </div>
                    <div class="d-flex flex-column flex-grow-1">
                        <span class="font-weight-bolder text-info font-size-lg mb-1">إجمالي الأرصدة المتاحة</span>
                        <span class="text-dark-75 font-weight-bolder font-size-h2">{{ number_format($totalOverallBalance, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card with Tabs -->
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_cash_safes"><span class="nav-icon"><i class="fas fa-cash-register"></i></span><span class="nav-text">الخزائن النقدية</span></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_bank_accounts"><span class="nav-icon"><i class="fas fa-university"></i></span><span class="nav-text">الحسابات البنكية</span></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_checks"><span class="nav-icon"><i class="fas fa-money-check-alt"></i></span><span class="nav-text">حافظة الشيكات</span></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">

                <!-- 1. تبويب الخزائن النقدية -->
                <div class="tab-pane fade show active" id="tab_cash_safes" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr class="text-uppercase"><th>اسم الخزينة</th><th>الرصيد الحالي</th><th>الحالة</th></tr></thead>
                            <tbody>
                                @forelse($cashSafes as $safe)
                                <tr>
                                    <td>{{ $safe->name }}</td>
                                    <td class="font-weight-bold">{{ number_format($safe->balance, 2) }} {{ $safe->currency }}</td>
                                    <td><span class="label label-lg font-weight-bold label-light-{{ $safe->is_active ? 'success' : 'danger' }} label-inline">{{ $safe->is_active ? 'نشطة' : 'غير نشطة' }}</span></td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="text-center p-5 text-muted">لا توجد خزائن لعرضها. قم بإضافة خزينة جديدة.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 2. تبويب الحسابات البنكية -->
                <div class="tab-pane fade" id="tab_bank_accounts" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr class="text-uppercase"><th>اسم البنك</th><th>اسم الحساب</th><th>رقم الحساب</th><th>الرصيد</th><th>الحالة</th></tr></thead>
                            <tbody>
                                @forelse($bankAccounts as $account)
                                <tr>
                                    <td>{{ $account->bank->name ?? 'N/A' }}</td>
                                    <td><a href="{{-- route('dashboard.bank-accounts.statement.show', $account->id) --}}">{{ $account->account_name }}</a></td>
                                    <td>{{ $account->account_number }}</td>
                                    <td class="font-weight-bold">{{ number_format($account->current_balance, 2) }} {{ $account->currency }}</td>
                                    <td><span class="label label-lg font-weight-bold label-light-{{ $account->is_active ? 'success' : 'danger' }} label-inline">{{ $account->is_active ? 'نشط' : 'غير نشط' }}</span></td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center p-5 text-muted">لا توجد حسابات بنكية لعرضها.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 3. تبويب الشيكات -->
                <div class="tab-pane fade" id="tab_checks" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr class="text-uppercase"><th>رقم الشيك</th><th>المبلغ</th><th>تاريخ الاستحقاق</th><th>الحالة</th><th>إجراءات</th></tr></thead>
                            <tbody>
                                @forelse($checks as $check)
                                <tr>
                                    <td>{{ $check->cheque_number }}</td>
                                    <td class="font-weight-bold">{{ number_format($check->amount, 2) }} {{ $check->currency }}</td>
                                    <td>{{ $check->due_date->format('Y-m-d') }}</td>
                                    <td>
                                        @php
                                            $statusClasses = ['in_wallet' => 'warning', 'cashed' => 'success', 'returned' => 'danger'];
                                            $statusTexts = ['in_wallet' => 'في المحفظة', 'cashed' => 'تم صرفه', 'returned' => 'مرتجع'];
                                        @endphp
                                        <span class="label label-lg font-weight-bold label-light-{{ $statusClasses[$check->status] ?? 'secondary' }} label-inline">
                                            {{ $statusTexts[$check->status] ?? $check->status }}
                                        </span>
                                    </td>
                                    <td><a href=" route('dashboard.checks.edit', $check->id) " class="btn btn-sm btn-clean btn-icon" title="تعديل الشيك"><i class="la la-edit"></i></a></td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center p-5 text-muted">لا توجد شيكات في المحفظة حالياً.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- روابط الترقيم (Pagination) للشيكات --}}
                    <div class="d-flex justify-content-center mt-3">{{ $checks->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
