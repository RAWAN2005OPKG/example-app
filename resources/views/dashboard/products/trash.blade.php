@extends('layouts.container')
@section('title', 'سلة محذوفات المنتجات')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/-shared-styles.css') }}">
@endpush

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-trash-alt"></i> سلة محذوفات المنتجات</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> العودة لقائمة المنتجات</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>اسم المنتج</th>
                        <th>رمز SKU</th>
                        <th>تاريخ الحذف</th>
                        <th class="no-print">تحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashedProducts as $product)
                        <tr>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td>{{ $product->sku ?? '-' }}</td>
                            <td>{{ $product->deleted_at->format('Y-m-d') }}</td>
                            <td class="action-buttons">
                                <form action="{{ route('dashboard.products.trash.restore', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn-icon" title="استعادة"><i class="fas fa-undo"></i></button>
                                </form>
                                <form action="{{ route('dashboard.products.trash.forceDelete', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon" title="حذف نهائي"><i class="fas fa-times-circle"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center" style="padding: 2rem;">سلة المحذوفات فارغة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
