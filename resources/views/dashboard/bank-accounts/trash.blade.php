@extends('layouts.container')
@section('title', 'سلة محذوفات الحسابات البنكية')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">سلة محذوفات الحسابات</h1>
            <p class="mb-0 text-muted">الحسابات البنكية التي تم حذفها مؤقتاً.</p>
        </div>
        <a href="{{ route('dashboard.bank-accounts.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-right fa-sm mr-1"></i> العودة إلى الحسابات
        </a>
    </div>

    <!-- Table -->
    <div class="card card-custom shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">الحسابات المحذوفة</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>اسم البنك</th>
                            <th>اسم الحساب</th>
                            <th>رقم الحساب</th>
                            <th>تاريخ الحذف</th>
                            <th class="text-center">تحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trashedAccounts as $account)
                            <tr>
                                <td>{{ $account->bank_name }}</td>
                                <td>{{ $account->account_name }}</td>
                                <td>{{ $account->account_number }}</td>
                                <td>{{ $account->deleted_at->format('Y-m-d H:i') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('dashboard.bank-accounts.restore', $account->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-icon btn-light-success" title="استعادة">
                                            <i class="fas fa-trash-restore"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('dashboard.bank-accounts.force-delete', $account->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا الحساب نهائياً؟ لا يمكن التراجع عن هذا الإجراء.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-light-danger" title="حذف نهائي">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5">
                                    <i class="fas fa-trash-alt fa-3x mb-3"></i>
                                    <h4>سلة المحذوفات فارغة.</h4>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($trashedAccounts->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $trashedAccounts->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
