@extends('layouts.container')
@section('title', 'سلة محذوفات المستودعات')
  @section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/shared-styles.css') }}">
@endsection

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-trash-restore"></i> سلة محذوفات المستودعات</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.warehouses.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> العودة للمستودعات</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    <div class="table-container">
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>اسم المستودع</th>
                        <th>تاريخ الحذف</th>
                        <th class="no-print">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashedWarehouses as $warehouse)
                        <tr>
                            <td><strong>{{ $warehouse->name }}</strong></td>
                            <td>{{ $warehouse->deleted_at->format('Y-m-d H:i') }}</td>
                            <td class="action-buttons">
                                <form action="{{ route('dashboard.warehouses.trash.restore', $warehouse->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn-icon" title="استعادة"><i class="fas fa-undo"></i></button>
                                </form>
                                <form action="{{ route('dashboard.warehouses.trash.forceDelete', $warehouse->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" title="حذف نهائي"><i class="fas fa-times-circle"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center" style="padding: 2rem;">سلة المحذوفات فارغة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
