@extends('layouts.container')
@section('title', 'سلة محذوفات المشاريع')
@section('content')
<main class="main-content">
    <div class="page-header"><h1><i class="fas fa-trash-alt"></i> سلة محذوفات المشاريع</h1></div>
    <div class="card card-custom">
        <div class="card-header"><div class="card-title"><h3 class="card-label">المشاريع المحذوفة</h3></div><div class="card-toolbar"><a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary">العودة لقائمة المشاريع</a></div></div>
        <div class="card-body">
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead><tr><th>اسم المشروع</th><th>المالك</th><th>تاريخ الحذف</th><th>تحكم</th></tr></thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->owner_name }}</td>
                                <td>{{ $project->deleted_at->format('Y-m-d H:i') }}</td>
                                <td nowrap="nowrap">
                                    <form action="{{ route('dashboard.projects.trash.restore', $project->id) }}" method="POST" style="display:inline;"> @csrf @method('PUT') <button type="submit" class="btn btn-success btn-sm">استعادة</button></form>
                                    <form action="{{ route('dashboard.projects.trash.forceDelete', $project->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من الحذف النهائي؟');"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm">حذف نهائي</button></form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center">سلة المحذوفات فارغة.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{ $projects->links() }}</div>
        </div>
    </div>
</main>
@endsection
