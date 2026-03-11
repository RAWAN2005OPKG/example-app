@extends('layouts.container')
@section('title', 'سلة محذوفات مصروفات الموردين')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title text-danger"><i class="fas fa-trash text-danger mr-2"></i> سلة المحذوفات - مصروفات الموردين</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>التاريخ</th>
                        <th>المبلغ</th>
                        <th>المورد</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>{{ $expense->date ? $expense->date->format('Y-m-d') : 'N/A' }}</td>
                            <td>{{ number_format($expense->amount, 2) }}</td>
                            <td>{{ $expense->payable->name ?? 'N/A' }}</td>
                            <td>
                                <form action="{{ route('dashboard.supplier_expenses.restore', $expense->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">استعادة</button>
                                </form>
                                <form action="{{ route('dashboard.supplier_expenses.forceDelete', $expense->id) }}" method="POST" class="d-inline" onsubmit="return confirm('حذف نهائي؟ لا يمكن التراجع!')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">حذف نهائي</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-5">السلة فارغة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">{{ $expenses->links() }}</div>
    </div>
</div>
@endsection
