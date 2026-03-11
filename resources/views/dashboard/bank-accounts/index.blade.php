@extends('layouts.container')
@section('title', 'إدارة الحسابات البنكية')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">إدارة الحسابات البنكية</h1>
        {{-- تم تغيير الزر ليقوم بالانتقال إلى صفحة الإضافة المستقلة --}}
        <a href="{{ route('dashboard.bank-accounts.create') }}" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md"><i class="fas fa-plus"></i></span>إضافة حساب بنكي
        </a>
    </div>

    <!-- Totals Cards -->
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                            <span class="symbol-label"><i class="fas fa-university text-primary"></i></span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1">
                            <span class="font-weight-bold text-dark-75 font-size-lg mb-1">إجمالي عدد الحسابات</span>
                            <span class="text-muted font-weight-bold">{{ $totalAccounts }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-40 symbol-light-success mr-5">
                            <span class="symbol-label"><i class="fas fa-check-circle text-success"></i></span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1">
                            <span class="font-weight-bold text-dark-75 font-size-lg mb-1">الحسابات النشطة</span>
                            <span class="text-muted font-weight-bold">{{ $activeAccounts }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Accounts Table -->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title"><h3 class="card-label">قائمة الحسابات البنكية</h3></div>
        </div>
        <div class="card-body">
            @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            @if (session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-uppercase">
                            <th>اسم البنك</th>
                            <th>اسم الحساب</th>
                            <th>رقم الحساب</th>
                            <th>الرصيد الحالي</th>
                            <th>الحالة</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bankAccounts as $account)
                        <tr>
                            {{-- التصحيح 1: عرض اسم البنك من خلال العلاقة --}}
                            <td>{{ $account->bank->name ?? 'غير محدد' }}</td>
                            <td>{{ $account->account_name }}</td>
                            <td>{{ $account->account_number }}</td>
                            {{-- التصحيح 2: استخدام اسم العمود الصحيح للرصيد --}}
                            <td class="font-weight-bold">{{ number_format($account->resolved_balance, 2) }} {{ $account->currency }}</td>
                            <td>
                                @if($account->is_active)
                                    <span class="label label-lg font-weight-bold label-light-success label-inline">نشط</span>
                                @else
                                    <span class="label label-lg font-weight-bold label-light-danger label-inline">غير نشط</span>
                                @endif
                            </td>
                            <td>
                                {{-- التصحيح 3: تغيير الرابط ليذهب إلى صفحة كشف الحساب --}}
                                <a href="{{ route('dashboard.bank-accounts.statement.show', $account->id) }}" class="btn btn-sm btn-clean btn-icon" title="كشف حساب"><i class="la la-eye"></i></a>

                                {{-- التصحيح 4: تغيير الزر ليذهب إلى صفحة التعديل المستقلة --}}
                                <a href="{{ route('dashboard.bank-accounts.edit', $account->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل"><i class="la la-edit"></i></a>

                                <form action="{{ route('dashboard.bank-accounts.destroy', $account->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف"><i class="la la-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center p-5 text-muted">لا توجد حسابات بنكية لعرضها.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">{{ $bankAccounts->links() }}</div>
        </div>
    </div>
</div>


@endsection
