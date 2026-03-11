@extends('layouts.container')
@section('title', 'سلة المحذوفات - الشيكات')

@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">الشيكات المحذوفة
            <span class="d-block text-muted pt-2 font-size-sm">يمكنك استعادة الشيكات أو حذفها نهائياً</span></h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.checks.index') }}" class="btn btn-light-primary font-weight-bolder">
                <i class="la la-arrow-right"></i> العودة للقائمة
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
                        <th>رقم الشيك</th>
                        <th>البنك</th>
                        <th>الطرف الثاني</th>
                        <th>المبلغ</th>
                        <th>تاريخ الحذف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($checks as $check)
                    <tr>
                        <td>{{ $check->check_number }}</td>
                        <td>{{ $check->bank_name }}</td>
                        <td>{{ $check->party_name }}</td>
                        <td>{{ number_format($check->amount, 2) }} {{ $check->currency }}</td>
                        <td>{{ $check->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('dashboard.checks.restore', $check->id) }}" class="btn btn-sm btn-light-success font-weight-bolder" title="استعادة">
                                <i class="la la-undo"></i> استعادة
                            </a>
                            <form action="{{ route('dashboard.checks.forceDelete', $check->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light-danger font-weight-bolder" title="حذف نهائي" onclick="return confirm('هل أنت متأكد من الحذف النهائي؟ لا يمكن التراجع عن هذا الإجراء.')">
                                    <i class="la la-trash"></i> حذف نهائي
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">سلة المحذوفات فارغة</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $checks->links() }}
        </div>
    </div>
</div>
@endsection
