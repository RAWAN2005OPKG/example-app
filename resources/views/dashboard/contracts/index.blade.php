@extends('layouts.container')
@section('title', 'إدارة العقود')

@section('content')
<main class="main-content" style="max-width: 1600px; margin: 40px auto; padding: 0 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h1><i class="fas fa-file-signature text-primary"></i> إدارة العقود</h1>
        <a href="{{ route('dashboard.contracts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة عقد جديد</a>
    </div>

    <div class="table-container" style="background-color: #ffffff; padding: 20px; border-radius: 12px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">

            <form action="{{ route('dashboard.contracts.index') }}" method="GET">
                <input type="text" name="search" placeholder="ابحث..." value="{{ $request->search ?? '' }}" class="form-control" style="min-width: 300px; display: inline-block; width: auto;">
                <button type="submit" class="btn btn-primary btn-sm">بحث</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>صاحب العقد</th>
                        <th>نوعه</th>
                        <th>المشروع</th>
                        <th>قيمة العقد</th>
                        <th>تاريخه</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contracts as $contract)
                        <tr>
                            <td>{{ $contract->id }}</td>
                            <td>{{ $contract->contractable->name ?? 'N/A' }}</td>
                            <td><span class="badge badge-light-primary">{{ str_replace('App\\Models\\', '', $contract->contractable_type) }}</span></td>
                            <td>{{ $contract->project->name ?? '-' }}</td>
                            <td>{{ number_format($contract->contract_value, 2) }} {{ $contract->currency }}</td>
                            <td>{{ $contract->contract_date->format('Y-m-d') }}</td>

                            <td>
                                <a href="{{ route('dashboard.contracts.show', $contract->id) }}" class="btn btn-sm btn-icon btn-info" title="عرض"><i class="la la-eye"></i></a>
                                <a href="{{ route('dashboard.contracts.edit', $contract->id) }}" class="btn btn-sm btn-icon btn-success" title="تعديل"><i class="la la-edit"></i></a>
                                <form action="{{ route('dashboard.contracts.destroy', $contract->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من نقل هذا العقد إلى سلة المهملات؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" title="حذف"><i class="la la-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-5">لا توجد عقود لعرضها.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $contracts->appends($request->query())->links() }}</div>
    </div>
</main>
@endsection
