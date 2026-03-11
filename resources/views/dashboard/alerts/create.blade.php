@extends('layouts.container')
@section('title', 'إضافة تنبيه جديد')
@section('content')
<main class="main-content">
    <div class="card card-custom" style="max-width: 700px; margin: auto;">
        <div class="card-header"><h3 class="card-title">إضافة تنبيه يدوي جديد</h3></div>
        <div class="card-body">
            @if ($errors->any())<div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <form action="{{ route('dashboard.alerts.store') }}" method="POST">
                @csrf
                <div class="form-group"><label for="title">العنوان *</label><input type="text" name="title" class="form-control" value="{{ old('title') }}" required></div>
                <div class="form-group"><label for="message">الرسالة *</label><textarea name="message" class="form-control" required>{{ old('message') }}</textarea></div>
                <div class="form-group"><label for="type">النوع *</label>
                    <select name="type" class="form-control" required>
                        <option value="general" selected>عام</option>
                        <option value="payment_due">دفعة مستحقة</option>
                        <option value="cheque_due">شيك مستحق</option>
                    </select>
                </div>
                <div class="form-group"><label for="priority">الأولوية *</label>
                    <select name="priority" class="form-control" required>
                        <option value="low">منخفضة</option>
                        <option value="medium" selected>متوسطة</option>
                        <option value="high">عالية</option>
                    </select>
                </div>
                <div class="form-group"><label for="due_date">تاريخ الاستحقاق (اختياري)</label><input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}"></div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">حفظ التنبيه</button>
                    <a href="{{ route('dashboard.alerts.index') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
