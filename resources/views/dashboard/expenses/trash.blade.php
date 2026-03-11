@extends('layouts.container')
@section('title', 'سلة المحذوفات - المصروفات')

@push('styles')
<style>
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #3730a3;
        --light-bg: #f8fafc;
        --white-bg: #ffffff;
        --text-color: #1f2937;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --success-color: #16a34a;
        --danger-color: #dc2626;
        --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }
    body { background-color: var(--light-bg); color: var(--text-color); direction: rtl; font-family: 'Cairo', 'Arial', sans-serif; }
    .main-content { width: 100%; max-width: 1400px; margin: 20px auto; padding: 20px; }
    .table-container {
        background-color: var(--white-bg);
        padding: 30px;
        border-radius: 16px;
        box-shadow: var(--shadow);
        margin-top: 30px;
        overflow-x: auto;
    }
    .container-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--border-color);
    }
    .container-title {
        font-size: 1.8rem;
        color: var(--primary-color);
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }
    .btn-back {
        background-color: #e0e7ff;
        color: #3730a3;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background-color 0.3s;
    }
    .btn-back:hover { background-color: #c7d2fe; }
    .alert-success { padding: 15px; background-color: #d1fae5; color: #065f46; border-radius: 8px; margin-bottom: 20px; }
    .data-table { width: 100%; border-collapse: collapse; text-align: right; }
    .data-table thead { background-color: var(--light-bg); }
    .data-table th, .data-table td { padding: 14px 18px; border-bottom: 1px solid var(--border-color); vertical-align: middle; }
    .data-table th { font-weight: 700; }
    .actions-cell { display: flex; align-items: center; gap: 15px; }
    .action-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-weight: 700;
        font-family: inherit;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px;
        border-radius: 5px;
        transition: background-color 0.2s;
    }
    .btn-restore { color: var(--success-color); }
    .btn-restore:hover { background-color: #f0fdf4; }
    .btn-delete-force { color: var(--danger-color); }
    .btn-delete-force:hover { background-color: #fef2f2; }
    .empty-row td { padding: 40px; text-align: center; color: var(--text-muted); font-size: 1.1rem; }
</style>
@endpush

@section('content')
<main class="main-content">
    <div class="table-container">
        <div class="container-header">
            <h2 class="container-title"><i class="fas fa-trash-alt"></i> سلة المحذوفات (المصروفات)</h2>


            <a href="{{ route('dashboard.expenses.index') }}" class="btn-back">
                <i class="fas fa-arrow-right"></i> العودة للمصروفات
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- جدول البيانات -->
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المستفيد</th>
                    <th>المبلغ</th>
                    <th>تاريخ الحذف</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($expenses as $expense)
                    <tr>
                        <td>{{ $expense->id }}</td>
                        <td>{{ $expense->payee }}</td>
                        <td>{{ number_format($expense->amount, 2) }} {{ $expense->currency }}</td>
                        <td>{{ $expense->deleted_at->format('Y-m-d') }}</td>
                        <td class="actions-cell">


                            <form action="{{ route('dashboard.expenses.trash.restore', $expense->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="action-btn btn-restore">
                                    <i class="fas fa-undo"></i>
                                    <span>استعادة</span>
                                </button>
                            </form>
                            <form action="{{ route('dashboard.expenses.trash.forceDelete', $expense->id) }}" method="POST" onsubmit="return confirm('تحذير! سيتم حذف هذا العنصر نهائياً ولا يمكن استعادته. هل أنت متأكد؟');" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete-force">
                                    <i class="fas fa-times-circle"></i>
                                    <span>حذف نهائي</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="empty-row">
                        <td colspan="5">
                            <i class="fas fa-box-open" style="font-size: 1.5rem; margin-bottom: 10px;"></i>
                            <div>سلة المحذوفات فارغة حالياً.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
