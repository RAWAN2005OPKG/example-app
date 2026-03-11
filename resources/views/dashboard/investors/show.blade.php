@extends('layouts.container')
@section('title', 'ملف المستثمر: ' . $investor->name)

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<style>
    /* تصميم احترافي ومحسن للصفحة */
    .main-content { max-width: 1600px; margin: 40px auto; padding: 0 20px; }
    .profile-header {
        background: linear-gradient(to right, #4f46e5, #7c3aed );
        color: white; padding: 2rem; border-radius: 0.75rem;
        margin-bottom: 2rem; display: flex; align-items: center; gap: 1.5rem;
    }
    .profile-header .avatar { font-size: 3rem; }
    .profile-header .info h1 { margin: 0; font-weight: 700; }
    .profile-header .info p { margin: 0; opacity: 0.8; }
    .kpi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px; }
    .kpi-card { background-color: #ffffff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
    .kpi-card .label { color: #6b7280; margin-bottom: 10px; font-size: 1rem; }
    .kpi-card .value { font-size: 2rem; font-weight: 700; }
    .card-custom { border: 1px solid #e5e7eb; border-radius: 12px; box-shadow: 0 1px 3px 0 rgba(0,0,0,0.05); }
    .card-header-custom { background-color: #f9fafb; padding: 15px 20px; border-bottom: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center; }
    .card-header-custom h4 { margin: 0; font-weight: 600; color: #111827; }
</style>
@endpush

@section('content')
<main class="main-content">

    {{-- 1. رأس الصفحة (Profile Header) --}}
    <div class="profile-header">
        <div class="avatar"><i class="fas fa-user-tie"></i></div>
        <div class="info">
            <h1>{{ $investor->name }}</h1>
            <p>ID: {{ $investor->unique_id }} | رقم الهوية: {{ $investor->id_number ?? '-' }} | الجوال: {{ $investor->phone ?? '-' }}</p>
        </div>
        <div class="ml-auto d-flex gap-2">
            <a href="{{ route('dashboard.investors.edit', $investor->id) }}" class="btn btn-light-primary">تعديل</a>
            <a href="{{ route('dashboard.investors.export.word', $investor->id) }}" class="btn btn-light-info">تصدير Word</a>
            <button onclick="window.print();" class="btn btn-light-success">طباعة</button>
        </div>
    </div>

    {{-- 2. الملخص المالي (KPIs) --}}
    <div class="kpi-grid">
        <div class="kpi-card"><div class="label">إجمالي الاستثمار</div><div class="value text-primary">{{ number_format($investor->total_investment_ils, 2) }} ILS</div></div>
        <div class="kpi-card"><div class="label">إجمالي المصروف له</div><div class="value text-success">{{ number_format($investor->total_paid_out, 2) }} ILS</div></div>
        <div class="kpi-card"><div class="label">الرصيد المتبقي له</div><div class="value text-danger">{{ number_format($investor->remaining_balance, 2) }} ILS</div></div>
    </div>

    {{-- 3. نظام التبويبات (Tabs) --}}
    <ul class="nav nav-tabs nav-tabs-line" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_projects">المشاريع المستثمر بها</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_payments">كشف الحساب (القيود)</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_chart">التحليل المالي</a></li>
    </ul>

    <div class="tab-content mt-5">
        {{-- التبويب 1: المشاريع --}}
        <div class="tab-pane active" id="tab_projects" role="tabpanel">
            <div class="card card-custom">
                <div class="card-header-custom"><h4>قائمة المشاريع</h4></div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr><th>اسم المشروع</th><th>نسبة الاستثمار</th><th>المبلغ المستثمر</th><th>القيمة بالشيكل</th></tr></thead>
                            <tbody>
                                @forelse($investor->projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ number_format($project->pivot->investment_percentage, 2) }}%</td>
                                    <td>{{ number_format($project->pivot->invested_amount, 2) }} {{ $project->pivot->currency }}</td>
                                    <td><strong>{{ number_format($project->pivot->invested_amount_ils, 2) }} ILS</strong></td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="text-center p-5">هذا المستثمر لم يستثمر في أي مشاريع بعد.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- التبويب 2: كشف الحساب --}}
        <div class="tab-pane" id="tab_payments" role="tabpanel">
            <div class="card card-custom">
                <div class="card-header-custom">
                    <h4>كشف حساب المستثمر</h4>
                    <a href="{{ route('dashboard.payments.create', ['payable_type' => 'Investor', 'payable_id' => $investor->id]) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i> إضافة قيد جديد
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr><th>التاريخ</th><th>النوع</th><th>المبلغ الأصلي</th><th>القيمة (ILS)</th><th>الطريقة</th><th>ملاحظات</th></tr></thead>
                            <tbody>
                                @forelse($investor->payments as $payment)
                                <tr>
                                    <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                                    <td>
                                        @if($payment->type == 'out') <span class="badge badge-light-success">صرف له</span>
                                        @else <span class="badge badge-light-danger">قبض منه</span> @endif
                                    </td>
                                    <td>{{ number_format($payment->amount, 2) }} {{ $payment->currency }}</td>
                                    <td><strong>{{ number_format($payment->amount_ils, 2) }} ILS</strong></td>
                                    <td>{{ $payment->method }}</td>
                                    <td>{{ $payment->notes ?? '-' }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="text-center p-5">لا توجد قيود مسجلة لهذا المستثمر.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- التبويب 3: التحليل المالي --}}
        <div class="tab-pane" id="tab_chart" role="tabpanel">
            <div class="card card-custom">
                <div class="card-header-custom"><h4>توزيع الاستثمارات على المشاريع</h4></div>
                <div class="card-body">
                    <canvas id="investmentsChart" style="height: 350px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function ( ) {
        const ctx = document.getElementById('investmentsChart');
        if (ctx) {
            const projectsData = @json($investor->projects->map(function($p) {
                return [
                    'name' => $p->name,
                    'value' => $p->pivot->invested_amount_ils,
                ];
            }));

            new Chart(ctx, {
                type: 'bar', // يمكنك تغييره إلى 'pie' أو 'doughnut'
                data: {
                    labels: projectsData.map(p => p.name),
                    datasets: [{
                        label: 'قيمة الاستثمار (ILS)',
                        data: projectsData.map(p => p.value),
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.8)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(239, 68, 68, 0.8)',
                            'rgba(59, 130, 246, 0.8)',
                        ],
                        borderColor: [
                            'rgba(79, 70, 229, 1)',
                            'rgba(245, 158, 11, 1)',
                            'rgba(16, 185, 129, 1)',
                            'rgba(239, 68, 68, 1)',
                            'rgba(59, 130, 246, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        }
    });
</script>
@endpush
