@extends('layouts.container')
@section('title', 'قوائم الأسعار')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared-styles.css') }}">
@endpush
@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-tags"></i> قوائم الأسعار</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.pricelists.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة قائمة أسعار</a>
        </div>
    </div>

    <div class="table-container">
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>اسم القائمة</th>
                        <th>نوع التسعير</th>
                        <th>عدد المنتجات</th>
                        <th>تاريخ الإنشاء</th>
                        <th>الحالة</th>
                        <th class="no-print">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($priceLists as $list)
                        <tr>
                            <td><strong>{{ $list->name }}</strong></td>
                            <td>
                                @if($list->type == 'percentage')
                                    نسبة مئوية ({{ $list->value }}%)
                                @else
                                    سعر ثابت مخصص
                                @endif
                            </td>
                            <td>{{ $list->products_count }}</td>
                            <td>{{ $list->created_at->format('Y-m-d') }}</td>
                            <td><span class="badge {{ $list->is_active ? 'badge-success' : 'badge-danger' }}">{{ $list->is_active ? 'نشطة' : 'غير نشطة' }}</span></td>
                            <td class="action-buttons">
                                <form action="{{ route('dashboard.pricelists.destroy', $list->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center" style="padding: 2rem;">لا توجد قوائم أسعار.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
