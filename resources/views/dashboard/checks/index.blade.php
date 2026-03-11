@extends('layouts.container')
@section('title', 'إدارة الشيكات')

@section('content')
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">قائمة الشيكات
            <span class="d-block text-muted pt-2 font-size-sm">إدارة جميع شيكات القبض والدفع</span></h3>
        </div>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.checks.trash') }}" class="btn btn-light-danger font-weight-bolder mr-2">
                <i class="la la-trash"></i> سلة المحذوفات
            </a>
            <a href="{{ route('dashboard.checks.export') }}" class="btn btn-success font-weight-bolder mr-2">
                <i class="la la-file-excel"></i> تنزيل إكسل
            </a>
            <a href="{{ route('dashboard.checks.create') }}" class="btn btn-primary font-weight-bolder">
                <i class="la la-plus"></i> إضافة شيك جديد
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
                        <th>تاريخ الاستحقاق</th>
                        <th>النوع</th>
                        <th>الطرف الثاني</th>
                        <th>المبلغ</th>
                        <th>العملة</th>
                        <th>القيمة بالشيكل</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse($checks as $check)
                    <tr>
                        <td>{{ $check->check_number }}</td>
                        <td>{{ $check->bank_name }}</td>
                        <td><span class="label label-lg label-light-primary label-inline">{{ $check->due_date->format('Y-m-d') }}</span></td>
                        <td>
                            @if($check->type == 'receivable')
                                <span class="label label-light-success label-inline">وارد (قبض)</span>
                            @else
                                <span class="label label-light-danger label-inline">صادر (دفع)</span>
                            @endif
                        </td>
                        <td>
                            <!-- الاسم قابل للنقر للانتقال لصفحة العرض -->
                            <a href="{{ route('dashboard.checks.show', $check->id) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                {{ $check->party_name }}
                            </a>
                        </td>
                        <td>{{ number_format($check->amount, 2) }}</td>
                        <td>{{ $check->currency }}</td>
                        <td>{{ number_format($check->amount_ils, 2) }}</td>
                        <td>
                            <a href="{{ route('dashboard.checks.show', $check->id) }}" class="btn btn-sm btn-clean btn-icon" title="عرض">
                                <i class="la la-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.checks.edit', $check->id) }}" class="btn btn-sm btn-clean btn-icon" title="تعديل">
                                <i class="la la-edit"></i>
                            </a>
                            <form action="{{ route('dashboard.checks.destroy', $check->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="حذف" onclick="return confirm('هل أنت متأكد من نقل الشيك لسلة المحذوفات؟')">
                                    <i class="la la-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">لا يوجد شيكات مضافة حالياً</td>
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
