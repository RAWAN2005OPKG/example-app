@extends('layouts.container')
@section('title', 'سلة محذوفات الموردين')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
@endsection

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-trash-alt"></i> سلة محذوفات الموردين</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.suppliers.index') }}" class="btn btn-secondary"><i class="fas fa-list"></i> العودة للقائمة</a>
        </div>
    </div>

    <div class="table-container">
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>تاريخ الحذف</th>
                        <th class="no-print">تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                        <tr>
                            <td><strong>{{ $supplier->name }}</strong></td>
                            <td>{{ $supplier->email ?? '-' }}</td>
                            <td>{{ $supplier->deleted_at->format('Y-m-d H:i') }}</td>
                            <td class="action-buttons">
                                {{-- زر الاستعادة --}}
                                <form action="{{ route('dashboard.suppliers.restore', $supplier->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" title="استعادة"><i class="fas fa-undo"></i></button>
                                </form>

                                {{-- زر الحذف النهائي --}}
                                <form action="{{ route('dashboard.suppliers.forceDelete', $supplier->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="حذف نهائي"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center" style="padding: 2rem;">لا توجد موردين محذوفين.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $suppliers->links() }}</div>
    </div>
</main>
@endsection
