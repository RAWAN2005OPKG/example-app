@extends('layouts.container')
@section('title', 'قائمة المقاولين والموردين')

@section('content')
<div class="card card-custom card-custom-dark gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-hard-hat text-primary mr-2"></i> قائمة المقاولين والموردين</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.subcontractors.create') }}" class="btn btn-primary btn-sm mr-2"><i class="la la-plus"></i> إضافة جديد</a>
            <a href="#" class="btn btn-success btn-sm mr-2"><i class="la la-file-excel"></i> تصدير Excel</a>
            <a href="{{ route('dashboard.subcontractors.trash') }}" class="btn btn-danger btn-sm"><i class="la la-trash"></i> سلة المحذوفات</a>
        </div>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('dashboard.subcontractors.index') }}" class="mb-5">
            <div class="input-group"><input type="text" name="search" class="form-control" placeholder="ابحث بالاسم، الرقم التعريفي، أو التخصص..." value="{{ request('search') }}"><div class="input-group-append"><button class="btn btn-outline-primary" type="submit">بحث</button></div></div>
        </form>

        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>التخصص</th>
                        <th>رقم الهوية</th>
                        <th>الجوال</th>
                        <th class="text-center">إجمالي العقود (ILS)</th>
                        <th class="text-center">المدفوع له (ILS)</th>
                        <th class="text-center">الرصيد (ILS)</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subcontractors as $subcontractor)
                    <tr>
                        <td><a href="{{ route('dashboard.subcontractors.show', $subcontractor->id) }}">{{ $subcontractor->unique_id }}</a></td>
                        <td>{{ $subcontractor->name }}</td>
                        <td>{{ $subcontractor->specialization }}</td>
                        <td>{{ $subcontractor->id_number ?? '-' }}</td>
                        <td>{{ $subcontractor->phone ?? '-' }}</td>
                        <td class="text-center font-weight-bold text-info">{{ number_format($subcontractor->total_contracts_value, 2) }}</td>
                        <td class="text-center font-weight-bold text-success">{{ number_format($subcontractor->total_paid, 2) }}</td>
                        <td class="text-center font-weight-bold text-danger">{{ number_format($subcontractor->remaining_balance, 2) }}</td>
                        <td class="text-center">
                            <a href="{{ route('dashboard.subcontractors.show', $subcontractor->id) }}" class="btn btn-sm btn-icon btn-light-primary" title="عرض"><i class="la la-eye"></i></a>
                            <a href="{{ route('dashboard.subcontractors.edit', $subcontractor->id) }}" class="btn btn-sm btn-icon btn-light-warning" title="تعديل"><i class="la la-edit"></i></a>
                            <form action="{{ route('dashboard.subcontractors.destroy', $subcontractor->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا المورد؟');" style="display: inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-light-danger" title="حذف"><i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center py-5">لا يوجد موردون لعرضهم.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-5">{{ $subcontractors->appends(request()->query())->links() }}</div>
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
