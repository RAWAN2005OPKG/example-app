@extends('layouts.container')
@section('title', 'لوحة تحكم المشروع: ' . $project->name)

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<style>
    /* --- تصميم احترافي للوحة التحكم --- */
    :root {
        --primary-color: #4f46e5; --primary-light: #eef2ff;
        --success-color: #10b981; --success-light: #d1fae5;
        --warning-color: #f59e0b; --warning-light: #fef3c7;
        --danger-color: #ef4444; --danger-light: #fee2e2;
        --info-color: #3b82f6; --info-light: #dbeafe;
        --text-dark: #111827; --text-secondary: #6b7280;
        --border-color: #e5e7eb; --light-bg: #f9fafb;
    }
    .kpi-card {
        background-color: #fff;
        border: 1px solid var(--border-color );
        border-radius: 0.75rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .kpi-card .icon {
        font-size: 2rem;
        padding: 1rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .kpi-card .details .label { color: var(--text-secondary); font-size: 0.9rem; }
    .kpi-card .details .value { font-size: 1.75rem; font-weight: 700; color: var(--text-dark); }

    .nav-tabs .nav-link {
        font-weight: 600;
        color: var(--text-secondary);
        border-bottom-width: 3px;
    }
    .nav-tabs .nav-link.active {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }
    .chart-container {
        background-color: #fff;
        padding: 1.5rem;
        border-radius: 0.75rem;
        border: 1px solid var(--border-color);
        height: 100%;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    {{-- شريط العنوان والأزرار --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">لوحة تحكم: {{ $project->name }}</h1>
        <div>
            <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit fa-sm"></i> تعديل</a>
            <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-list fa-sm"></i> كل المشاريع</a>
        </div>
    </div>

    {{-- بطاقات الإحصائيات (KPIs) --}}
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="kpi-card">
                <div class="icon" style="background-color: var(--primary-light); color: var(--primary-color);"><i class="fas fa-building"></i></div>
                <div class="details"><div class="label">إجمالي الوحدات</div><div class="value">{{ $stats['total_units'] }}</div></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="kpi-card">
                <div class="icon" style="background-color: var(--success-light); color: var(--success-color);"><i class="fas fa-check-circle"></i></div>
                <div class="details"><div class="label">الوحدات المباعة</div><div class="value">{{ $stats['units_sold'] }}</div></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="kpi-card">
                <div class="icon" style="background-color: var(--warning-light); color: var(--warning-color);"><i class="fas fa-hourglass-half"></i></div>
                <div class="details"><div class="label">الوحدات المتاحة</div><div class="value">{{ $stats['units_available'] }}</div></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="kpi-card">
                <div class="icon" style="background-color: var(--info-light); color: var(--info-color);"><i class="fas fa-tasks"></i></div>
                <div class="details"><div class="label">نسبة الإنجاز</div><div class="value">{{ $project->completion_percentage ?? 0 }}%</div></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="kpi-card">
                <div class="icon" style="background-color: var(--primary-light); color: var(--primary-color);"><i class="fas fa-wallet"></i></div>
                <div class="details">
                    <div class="label">رصيد المشروع الحالي</div>
                    <div class="value text-{{ $project->balance >= 0 ? 'success' : 'danger' }}">{{ number_format($project->balance, 2) }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- نظام التبويبات --}}
    <div class="card shadow-sm">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_overview">نظرة عامة</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_units">الوحدات</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_investors">المستثمرون</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                {{-- التبويب 1: نظرة عامة (مع الرسوم البيانية) --}}
                <div class="tab-pane active" id="tab_overview" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="chart-container">
                                <h5 class="font-weight-bold text-primary mb-3">الملخص المالي للمشروع</h5>
                                <canvas id="financialSummaryChart"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="chart-container">
                                <h5 class="font-weight-bold text-primary mb-3">حالة الوحدات</h5>
                                <canvas id="unitStatusChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- التبويب 2: الوحدات --}}
                <div class="tab-pane" id="tab_units" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover" id="unitsTable">
                            <thead><tr><th>#</th><th>رقم الوحدة</th><th>النوع</th><th>الطابق</th><th>المساحة</th><th>السعر (USD)</th><th>الحالة</th></tr></thead>
                            <tbody>
                                @foreach($project->units as $unit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->unit_number }}</td>
                                    <td>{{ $unit->unit_type }}</td>
                                    <td>{{ $unit->floor ?? '-' }}</td>
                                    <td>{{ number_format($unit->area, 2) }} م²</td>
                                    <td>${{ number_format($unit->price_usd, 2) }}</td>
                                    <td><span class="badge badge-pill badge-{{ $unit->status == 'sold' ? 'danger' : ($unit->status == 'available' ? 'success' : 'warning') }}">{{ $unit->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- التبويب 3: المستثمرون --}}
                <div class="tab-pane" id="tab_investors" role="tabpanel">
                    {{-- ... نفس جدول المستثمرين من الرد السابق ... --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document ).ready(function() {
        $('#unitsTable, #investorsTable').DataTable({ "language": { "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json" } });

        // بيانات الرسوم البيانية
        const stats = @json($stats);

        // 1. مخطط حالة الوحدات (دائري)
        new Chart(document.getElementById('unitStatusChart'), {
            type: 'doughnut',
            data: {
                labels: ['مباعة', 'محجوزة', 'متاحة'],
                datasets: [{
                    data: [stats.units_sold, stats.units_reserved, stats.units_available],
                    backgroundColor: [var(--danger-color), var(--warning-color), var(--success-color)],
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
        });

        // 2. مخطط الملخص المالي (أعمدة)
        new Chart(document.getElementById('financialSummaryChart'), {
            type: 'bar',
            data: {
                labels: ['التكاليف', 'قيمة الوحدات', 'قيمة المباع', 'الأرباح المتوقعة'],
                datasets: [{
                    label: 'القيمة بالدولار',
                    data: [
                        stats.estimated_cost_usd,
                        stats.total_units_value_usd,
                        stats.sold_units_value_usd,
                        stats.expected_profit_usd
                    ],
                    backgroundColor: [
                        'rgba(239, 68, 68, 0.7)',  // Danger
                        'rgba(59, 130, 246, 0.7)', // Info
                        'rgba(16, 185, 129, 0.7)', // Success
                        'rgba(245, 158, 11, 0.7)'  // Warning
                    ],
                    borderColor: [
                        '#ef4444', '#3b82f6', '#10b981', '#f59e0b'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true, ticks: { callback: value => '$' + value / 1000 + 'k' } } }
            }
        });
    });
</script>
@endpush
