@extends('layouts.container')
@section('title', 'سلة محذوفات الموردين')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title">سلة محذوفات المقاولين والموردين</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.subcontractors.index') }}" class="btn btn-primary btn-sm">العودة لقائمة الموردين</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>التخصص</th>
                        <th>تاريخ الحذف</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($trashedSubcontractors as $subcontractor)
                    <tr>
                        <td>{{ $subcontractor->unique_id }}</td>
                        <td>{{ $subcontractor->name }}</td>
                        <td>{{ $subcontractor->specialization }}</td>
                        <td>{{ $subcontractor->deleted_at->format('Y-m-d H:i') }}</td>
                        <td class="text-center">
                            {{-- زر الاستعادة --}}
                            <form action="{{ route('dashboard.subcontractors.restore', $subcontractor->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">استعادة</button>
                            </form>
                            {{-- زر الحذف النهائي --}}
                            <form action="{{ route('dashboard.subcontractors.forceDelete', $subcontractor->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف نهائي</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-5">سلة المحذوفات فارغة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $trashedSubcontractors->links() }}
        </div>
    </div>
</div>
@endsection
