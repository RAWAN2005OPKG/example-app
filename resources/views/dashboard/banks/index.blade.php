@extends('layouts.container')
@section('title', 'دليل البنوك')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">دليل البنوك</h3>
        <div class="card-toolbar">
            <button class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addBankModal">
                <i class="fas fa-plus"></i> إضافة بنك جديد
            </button>
        </div>
    </div>
    <div class="card-body">
        @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-uppercase">
                        <th>اسم البنك</th>
                        <th>الحالة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($banks as $bank)
                    <tr>
                        <td class="font-weight-bold">{{ $bank->name }}</td>
                        <td>
                            @if($bank->is_active)
                                <span class="label label-lg font-weight-bold label-light-success label-inline">نشط</span>
                            @else
                                <span class="label label-lg font-weight-bold label-light-danger label-inline">غير نشط</span>
                            @endif
                        </td>
                       <td>
    <a href="{{ route('dashboard.banks.show', $bank->id) }}" class="btn btn-sm btn-clean btn-icon" title="عرض التفاصيل والحسابات">
        <i class="la la-eye"></i>
    </a>

    <button class="btn btn-sm btn-clean btn-icon" data-toggle="modal" data-target="#editBankModal-{{ $bank->id }}" title="تعديل">
        <i class="la la-edit"></i>
    </button>

    <form action="{{ route('dashboard.banks.destroy', $bank->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد؟');">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف"><i class="la la-trash"></i></button>
    </form>
</td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center p-5 text-muted">لم يتم إضافة أي بنوك بعد.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
         <div class="d-flex justify-content-center mt-3">{{ $banks->links() }}</div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addBankModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('dashboard.banks.store') }}" method="POST">
                @csrf
                <div class="modal-header"><h5 class="modal-title">إضافة بنك جديد</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>اسم البنك</label>
                        <input type="text" name="name" class="form-control" placeholder="مثال: بنك فلسطين" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modals -->
@foreach($banks as $bank)
<div class="modal fade" id="editBankModal-{{ $bank->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('dashboard.banks.update', $bank->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header"><h5 class="modal-title">تعديل بنك: {{ $bank->name }}</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>اسم البنك</label>
                        <input type="text" name="name" class="form-control" value="{{ $bank->name }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
