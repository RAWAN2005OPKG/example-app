@extends('layouts.container')
@section('title', 'سلة مهملات الحركات البنكية')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            سلة مهملات الحركات البنكية
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.bank-transactions.index') }}" class="btn btn-secondary">
                <i class="la la-arrow-left"></i> العودة للقائمة الرئيسية
            </a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-uppercase">
                        <th>تاريخ الحذف</th>
                        <th>التاريخ الأصلي</th>
                        <th>الحساب</th>
                        <th>المبلغ</th>
                        <th>النوع</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($trashedTransactions as $transaction)
                        <tr>
                            <td>{{ $transaction->deleted_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                            <td>{{ $transaction->bankAccount->account_name ?? 'حساب محذوف' }}</td>
                            <td class="font-weight-bold">{{ number_format($transaction->amount, 2) }} {{ $transaction->currency }}</td>
                            <td>
                                @if($transaction->type == 'deposit') <span class="badge badge-success">إيداع</span>
                                @elseif($transaction->type == 'withdrawal') <span class="badge badge-danger">سحب</span>
                                @else <span class="badge badge-info">تحويل</span> @endif
                            </td>
                            <td>
                                {{-- زر الاستعادة --}}
                                <form action="{{ route('dashboard.bank-transactions.restore', $transaction->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH') {{-- أو PUT --}}
                                    <button type="submit" class="btn btn-sm btn-success">استعادة</button>
                                </form>

                                {{-- زر الحذف النهائي --}}
                                <form action="{{ route('dashboard.bank-transactions.force-delete', $transaction->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">حذف نهائي</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-5 text-muted">
                                سلة المهملات فارغة.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- روابط الترقيم --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $trashedTransactions->links() }}
        </div>
    </div>
</div>
@endsection
