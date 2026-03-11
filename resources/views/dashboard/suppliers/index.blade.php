@extends('layouts.container')
@section('title', 'قائمة الموردين')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
@endsection

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-truck"></i> قائمة الموردين</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.suppliers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة مورد جديد</a>
            <a href="{{ route('dashboard.suppliers.trash') }}" class="btn btn-danger"><i class="fas fa-trash"></i> سلة المحذوفات</a>
        </div>
    </div>

    <div class="table-container">
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الهاتف</th>
                        <th>العنوان</th>
                        <th class="no-print">تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                        <tr>
                            <td><strong>{{ $supplier->name }}</strong></td>
                            <td>{{ $supplier->email ?? '-' }}</td>
                            <td>{{ $supplier->phone ?? '-' }}</td>
                            <td>{{ $supplier->address ?? '-' }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('dashboard.suppliers.edit', $supplier->id) }}" title="تعديل"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('dashboard.suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من نقل المورد إلى سلة المحذوفات؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="حذف"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center" style="padding: 2rem;">لا توجد موردين لعرضهم.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $suppliers->links() }}</div>
    </div>
</main>
@endsection

