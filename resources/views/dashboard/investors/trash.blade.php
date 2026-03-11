@extends('layouts.container')
@section('title', 'سلة محذوفات المستثمرين')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-trash-alt text-danger mr-2"></i> سلة محذوفات المستثمرين</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.investors.index') }}" class="btn btn-primary btn-sm">
                <i class="la la-list"></i> العودة لقائمة المستثمرين
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>الاسم</th>
                        <th>رقم الهوية</th>
                        <th>تاريخ الحذف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($trashedInvestors as $investor)
                    <tr>
                        <td>{{ $investor->unique_id }}</td>
                        <td>{{ $investor->name }}</td>
                        <td>{{ $investor->id_number ?? '-' }}</td>
                        <td>{{ $investor->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            {{-- زر الاستعادة --}}
                            <form action="{{ route('dashboard.investors.restore', $investor->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-icon btn-success" title="استعادة">
                                    <i class="la la-undo"></i>
                                </button>
                            </form>

                            {{-- زر الحذف النهائي --}}
                            <form action="{{ route('dashboard.investors.forceDelete', $investor->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟ سيتم حذف هذا المستثمر بشكل نهائي ولا يمكن استعادته.');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-danger" title="حذف نهائي">
                                    <i class="la la-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">سلة المحذوفات فارغة.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $trashedInvestors->links() }}</div>
    </div>
</div>
@endsection
