@extends('layouts.container')
@section('title', 'تحويل الأموال')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--single {
        height: calc(1.5em + .75rem + 2px );
        padding: .375rem .75rem;
        border: 1px solid #d1d3e2;
        border-radius: .35rem;
        background-color: #fff;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: calc(1.5em + .75rem);
    }
    .input-group-text {
        background-color: #f8f9fc;
        border-color: #d1d3e2;
    }
    .card-header.gradient-bg {
        background: linear-gradient(to right, #4e73df, #36b9cc);
        color: white;
    }
    .btn-gradient {
        background-image: linear-gradient(to right, #1cc88a 0%, #17a673 51%, #1cc88a 100%);
        color: white;
        transition: 0.5s;
        background-size: 200% auto;
        border: none;
        border-radius: .35rem;
    }
    .btn-gradient:hover {
        background-position: right center;
        color: #fff;
    }
    .category-badge {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-weight: 600;
    }
    .badge-cash { background-color: #f6c23e; color: #fff; }
    .badge-bank { background-color: #36b9cc; color: #fff; }
    .badge-khaled { background-color: #4e73df; color: #fff; }
    .badge-mohammed { background-color: #1cc88a; color: #fff; }
    .badge-wali { background-color: #e74c3c; color: #fff; }
    .table-action-btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">تحويل الأموال بين الحسابات</h1>
            <p class="mb-0 text-muted">قم بإجراء تحويل جديد أو استعرض سجل التحويلات السابقة.</p>
        </div>
        <a href="{{ route('dashboard.fund-transfers.create') }}" class="btn btn-gradient btn-lg">
            <i class="fas fa-plus-circle ml-1"></i>تحويل جديد
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle ml-1"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle ml-1"></i> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle ml-1"></i>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Transfers Table Card -->
    <div class="card shadow-sm">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-history mr-2"></i>سجل التحويلات
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" style="font-size: 0.9rem;">
                    <thead class="thead-light">
                        <tr>
                            <th>التاريخ</th>
                            <th>المبلغ</th>
                            <th>من</th>
                            <th>إلى</th>
                            <th>ملاحظات</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transfers as $transfer)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($transfer->date)->format('Y-m-d') }}</td>
                                <td class="font-weight-bold text-success">
                                    {{ number_format($transfer->amount, 2) }}
                                    <span class="text-muted small">{{ $transfer->currency }}</span>
                                </td>
                                <td>
                                    <span class="category-badge badge-{{ $transfer->from_type }}">
                                        {{ $transfer->fromAccountName }}
                                    </span>
                                </td>
                                <td>
                                    <span class="category-badge badge-{{ $transfer->to_type }}">
                                        {{ $transfer->toAccountName }}
                                    </span>
                                </td>
                                <td>{{ $transfer->notes ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('dashboard.fund-transfers.edit', $transfer->id) }}"
                                           class="btn btn-primary btn-sm table-action-btn"
                                           title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('dashboard.fund-transfers.destroy', $transfer->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('هل أنت متأكد من حذف هذا التحويل؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm table-action-btn" title="حذف">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle fa-2x mb-2 text-gray-400"></i>
                                    <p class="mb-0">لا توجد عمليات تحويل سابقة لعرضها.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {!! $transfers->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2-search').select2({
            width: '100%'
        });
    });
</script>
@endpush
