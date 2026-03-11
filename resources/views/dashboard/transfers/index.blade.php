@extends('layouts.container')
@section('title', 'إدارة الأذون المخزنية')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
@endsection

@section('content')
<main class="main-content">
    {{-- ترويسة الصفحة --}}
    <div class="page-header">
        <h1><i class="fas fa-truck-loading"></i> إدارة الأذون المخزنية</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.transfers.trash.index') }}" class="btn btn-danger"><i class="fas fa-trash"></i> سلة المحذوفات</a>
            <a href="{{ route('dashboard.transfers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة إذن مخزني</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    {{-- حاوية الجدول --}}
    <div class="table-container">
        {{-- فورم البحث --}}
        <div class="table-controls">
            <form action="{{ route('dashboard.transfers.index') }}" method="GET" class="search-form">
                <input type="text" name="search" placeholder="ابحث بالرقم المرجعي..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">بحث</button>
            </form>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الرقم المرجعي</th>
                        <th>من مستودع</th>
                        <th>إلى مستودع</th>
                        <th>التاريخ</th>
                        <th>الحالة</th>
                        <th class="no-print">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transfers as $transfer)
                        <tr>
                            <td><strong>{{ $transfer->reference_no }}</strong></td>
                            <td>{{ $transfer->fromWarehouse->name ?? 'N/A' }}</td>
                            <td>{{ $transfer->toWarehouse->name ?? 'N/A' }}</td>
                            <td>{{ $transfer->date->format('Y-m-d') }}</td>
                            <td>
                                @if($transfer->status == 'completed')
                                    <span class="badge badge-success">مكتمل</span>
                                @else
                                    <span class="badge badge-warning">قيد الانتظار</span>
                                @endif
                            </td>
                            <td class="action-buttons">
                                {{-- يمكنك إضافة زر عرض التفاصيل هنا --}}
                                {{-- <a href="{{ route('dashboard.transfers.show', $transfer->id) }}" class="btn-icon" title="عرض"><i class="fas fa-eye"></i></a> --}}
                                <form action="{{ route('dashboard.transfers.destroy', $transfer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟ سيتم نقل الإذن إلى سلة المحذوفات.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn btn-icon" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center" style="padding: 2rem;">
                            @if(request('search'))
                                لا توجد نتائج للبحث.
                            @else
                                لم يتم إضافة أي أذون مخزنية بعد.
                            @endif
                        </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
