@extends('layouts.container')
@section('title', 'سلة محذوفات الأذون المخزنية')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
@endsection

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-trash-restore"></i> سلة محذوفات الأذون المخزنية</h1>
        <div class="header-actions">
            <a href="{{ route('dashboard.transfers.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> العودة للقائمة</a>
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
                        <th>الرقم المرجعي</th>
                        <th>تاريخ الحذف</th>
                        <th class="no-print">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashed as $transfer)
                        <tr>
                            <td><strong>{{ $transfer->reference_no }}</strong></td>
                            <td>{{ $transfer->deleted_at->format('Y-m-d H:i') }}</td>
                            <td class="action-buttons">
                                <form action="{{ route('dashboard.transfers.trash.restore', $transfer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn-icon" title="استعادة"><i class="fas fa-undo"></i></button>
                                </form>
                                <form action="{{ route('dashboard.transfers.trash.forceDelete', $transfer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn btn-icon" title="حذف نهائي"><i class="fas fa-times-circle"></i></button>
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
