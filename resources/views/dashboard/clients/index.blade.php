@extends('layouts.container')
@section('title', 'إدارة العملاء')
@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-users text-primary mr-2"></i> قائمة العملاء</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.clients.create') }}" class="btn btn-primary btn-sm mr-2">إضافة عميل</a>
            <a href="{{ route('dashboard.clients.export.excel') }}" class="btn btn-success btn-sm mr-2">تصدير Excel</a>
            <a href="{{ route('dashboard.clients.trash') }}" class="btn btn-danger btn-sm">سلة المحذوفات</a>
        </div>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('dashboard.clients.index') }}" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث بالاسم, ID, أو رقم الهوية..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">بحث</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>رقم الهوية</th>
                        <th>الجوال</th>
                        <th>الوحدات المشتراة</th>
                        <th>المستحق (ILS)</th>
                        <th>المدفوع (ILS)</th>
                        <th>المتبقي (ILS)</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                    <tr>
                        <td>{{ $client->unique_id }}</td>
                        <td><a href="{{ route('dashboard.clients.show', $client->id) }}" class="text-dark-75 font-weight-bolder">{{ $client->name }}</a></td>
                        <td>{{ $client->id_number ?? '-' }}</td>
                        <td>{{ $client->phone ?? '-' }}</td>
                        <td>
                            @forelse($client->contracts as $contract)
                                <span class="badge badge-light-info mb-1">وحدة: {{ $contract->projectUnit->unit_number ?? 'N/A' }}</span>
                            @empty
                                <span class="text-muted">-</span>
                            @endforelse
                        </td>
                        <td><span class="font-weight-bold text-primary">{{ number_format($client->total_due_ils, 2) }}</span></td>
                        <td><span class="font-weight-bold text-success">{{ number_format($client->total_paid_ils, 2) }}</span></td>
                        <td><span class="font-weight-bold text-danger">{{ number_format($client->remaining_balance, 2) }}</span></td>
                        <td>
                            <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-sm btn-icon btn-warning" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route('dashboard.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-danger" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center">لا يوجد عملاء لعرضهم.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $clients->appends(request()->query())->links() }}</div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document ).ready(function() {
        // عطّل بحث DataTables المدمج لأننا نستخدم بحث الخادم
        $('#clientsTable').DataTable({
            "searching": false,
            "language": {"url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json"},
            "lengthMenu": [ [10, 20, 30, -1], [10, 20, 30, "الكل"] ],
            "pageLength": 10
        });
    });
</script>
@endpush
