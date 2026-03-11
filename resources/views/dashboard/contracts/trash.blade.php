@extends('layouts.container')
@section('title', 'سلة محذوفات العقود')

@push('styles')
    <style>
        body { background: #f8f9fa; color: #333; font-family: 'Cairo', sans-serif; direction: rtl; }
        .main-content { width: 100%; max-width: 1600px; margin: 40px auto; padding: 0 20px; }
        .card-header { display: flex; justify-content: space-between; align-items: center; }
        .table th, .table td { vertical-align: middle; }
        .btn-action { background: none; border: none; color: #6c757d; cursor: pointer; padding: 5px; }
        .btn-action.restore { color: #198754; }
        .btn-action.delete { color: #dc3545; }
    </style>
@endpush


@section('content')
<main class="main-content">
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    <i class="fas fa-trash-alt"></i> سلة محذوفات العقود
                </h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('dashboard.contracts.index') }}" class="btn btn-light-primary font-weight-bolder">
                    <i class="fas fa-arrow-left"></i> العودة إلى قائمة العقود
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-separate table-head-custom table-checkable">
                    <thead>
                        <tr>
                            <th>رقم العقد</th>
                            <th>اسم العميل</th>
                            <th>تاريخ الحذف</th>
                            <th>تحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contracts as $contract)
                            <tr>
                                <td>{{ $contract->contract_id }}</td>
                                <td><strong>{{ $contract->client_name }}</strong></td>
                                <td>{{ $contract->deleted_at->format('Y-m-d H:i') }}</td>
                                <td nowrap="nowrap">
                                    <form action="{{ route('dashboard.contracts.trash.restore', $contract->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-action restore" title="استعادة">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('dashboard.contracts.trash.forceDelete', $contract->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('تحذير! سيتم حذف هذا العقد نهائياً من قاعدة البيانات. هل أنت متأكد؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action delete" title="حذف نهائي">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center; padding: 40px;">
                                    سلة المحذوفات فارغة.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $contracts->links() }}
            </div>
        </div>
    </div>
</main>
@endsection
