@extends('layouts.container')
@section('title', 'تحليل الأرباح السنوية | Executive Suite')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --exec-blue: #1e293b;
        --exec-gold: #fbbf24;
        --exec-success: #059669;
        --exec-danger: #dc2626;
        --glass-white: rgba(255, 255, 255, 0.9);
    }

    body {
        background: #f1f5f9;
        font-family: 'Outfit', sans-serif;
    }

    .exec-container {
        padding: 2.5rem 0;
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Premium Header */
    .exec-header {
        background: white;
        padding: 2.5rem;
        border-radius: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        margin-bottom: 2.5rem;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .exec-title {
        font-weight: 800;
        letter-spacing: -1px;
        color: var(--exec-blue);
        font-size: 2.25rem;
    }

    /* Performance Ribbon */
    .performance-ribbon {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .ribbon-item {
        background: white;
        padding: 1.75rem;
        border-radius: 24px;
        border: 1px solid rgba(0,0,0,0.05);
        display: flex;
        align-items: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .ribbon-item:hover {
        transform: scale(1.03);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08);
    }

    .ribbon-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-left: 1rem;
    }

    /* Modern Table */
    .exec-table-card {
        background: white;
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 10px 40px rgba(0,0,0,0.02);
    }

    .exec-table {
        width: 100%;
        margin-bottom: 0;
    }

    .exec-table thead th {
        background: #f8fafc;
        padding: 1.5rem;
        font-weight: 700;
        color: var(--exec-blue);
        border: none;
        font-size: 0.9rem;
    }

    .exec-table tbody td {
        padding: 1.5rem;
        vertical-align: middle;
        border-top: 1px solid #f1f5f9;
        font-weight: 500;
    }

    .trend-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 14px;
        border-radius: 100px;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .trend-up { background: #dcfce7; color: #166534; }
    .trend-down { background: #fee2e2; color: #991b1b; }

    /* Chart Box */
    .exec-chart-container {
        background: white;
        border-radius: 30px;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .financial-pill {
        display: inline-block;
        padding: 4px 12px;
        background: #f1f5f9;
        color: #475569;
        font-size: 0.75rem;
        border-radius: 6px;
        font-weight: 600;
    }

    .exec-chart-container,
    .exec-table-card {
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
    }

    .exec-table tbody tr:hover td {
        background: #f8fafc;
    }

    .table-responsive {
        border-radius: 30px;
    }

    @media (max-width: 991.98px) {
        .exec-header {
            padding: 1.5rem;
            border-radius: 24px;
        }

        .exec-title {
            font-size: 1.85rem;
        }

        .performance-ribbon {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .exec-chart-container,
        .exec-table-card {
            border-radius: 24px;
        }
    }

    @media (max-width: 767.98px) {
        .exec-container {
            padding: 1rem 0 2rem;
        }

        .performance-ribbon {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .ribbon-item {
            padding: 1.25rem;
            align-items: flex-start;
        }

        .exec-chart-container,
        .exec-table-card {
            border-radius: 20px;
        }

        .exec-chart-container,
        .exec-table-card .p-5 {
            padding: 1.25rem !important;
        }

        .exec-chart-container .d-flex.justify-content-between,
        .exec-table-card .d-flex.justify-content-between {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 1rem;
        }

        .exec-table thead th,
        .exec-table tbody td {
            padding: 1rem 0.85rem;
            white-space: nowrap;
        }

        .exec-header .badge {
            width: 100%;
            justify-content: center;
            white-space: normal;
        }
    }
</style>
@endsection

@section('content')
<div class="exec-container container-fluid">
    
    <!-- Executive Header -->
    <div class="exec-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <div>
            <h1 class="exec-title mb-1">الربح السنوي والمقارنات</h1>
            <p class="text-muted font-weight-medium">تحليل استراتيجي لمعدلات النمو والربحية على المدى الطويل.</p>
        </div>
        <div class="mt-3 mt-md-0">
            <span class="badge badge-dark px-4 py-3 rounded-pill font-weight-bold">
                <i class="fas fa-chart-line mr-2 text-warning"></i> تقرير السنة الحالية {{ $latestYear }}
            </span>
        </div>
    </div>

    @php
        $latestStats = collect($annualData)->first() ?? ['revenue' => 0, 'expenses' => 0, 'net_profit' => 0];
    @endphp

    <!-- Performance Ribbon -->
    <div class="performance-ribbon">
        <div class="ribbon-item">
            <div class="ribbon-icon bg-light-success text-success text-center"><i class="fas fa-piggy-bank"></i></div>
            <div class="text-right">
                <p class="text-muted small mb-0 font-weight-bold">إيرادات العام</p>
                <h3 class="mb-0 font-weight-bold">{{ number_format($latestStats['revenue'], 2) }}</h3>
            </div>
        </div>
        <div class="ribbon-item">
            <div class="ribbon-icon bg-light-danger text-danger text-center"><i class="fas fa-money-bill-wave"></i></div>
            <div class="text-right">
                <p class="text-muted small mb-0 font-weight-bold">مصاريف العام</p>
                <h3 class="mb-0 font-weight-bold">{{ number_format($latestStats['expenses'], 2) }}</h3>
            </div>
        </div>
        <div class="ribbon-item" style="background: var(--exec-blue); color: white; border: none;">
            <div class="ribbon-icon bg-white" style="color: var(--exec-blue);"><i class="fas fa-balance-scale-left"></i></div>
            <div class="text-right">
                <p class="text-white-50 small mb-0 font-weight-bold">صافي الأرباح</p>
                <h3 class="mb-0 font-weight-bold">{{ number_format($latestStats['net_profit'], 2) }}</h3>
            </div>
        </div>
        <div class="ribbon-item">
            <div class="ribbon-icon bg-light-warning text-warning text-center"><i class="fas fa-percent"></i></div>
            <div class="text-right">
                <p class="text-muted small mb-0 font-weight-bold">نسبة الربحية</p>
                <h3 class="mb-0 font-weight-bold">{{ $latestStats['revenue'] > 0 ? number_format(($latestStats['net_profit'] / $latestStats['revenue']) * 100, 1) : 0 }}%</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Main Trend Chart -->
        <div class="col-xl-12">
            <div class="exec-chart-container">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h5 class="font-weight-bold text-dark m-0">الاتجاه المالي للعام {{ $latestYear }}</h5>
                    <div class="d-flex align-items-center">
                        <span class="mr-4 d-flex align-items-center"><span class="rounded-circle mr-2" style="width:10px; height:10px; background:#10b981;"></span> إيرادات</span>
                        <span class="d-flex align-items-center"><span class="rounded-circle mr-2" style="width:10px; height:10px; background:#ef4444;"></span> مصاريف</span>
                    </div>
                </div>
                <div style="height: 400px;">
                    <canvas id="execAnnualChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Historical Performance Table -->
        <div class="col-xl-12">
            <div class="exec-table-card">
                <div class="p-5 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="font-weight-bold text-dark m-0">سجل الأرباح التاريخي</h5>
                    <button class="btn btn-sm btn-outline-secondary px-4">تنزيل التقرير <i class="fas fa-download ml-2"></i></button>
                </div>
                <div class="table-responsive">
                    <table class="exec-table text-right">
                        <thead>
                            <tr>
                                <th class="text-right">السنة المالية</th>
                                <th>إجمالي الإيرادات</th>
                                <th>إجمالي المصروفات</th>
                                <th>صافي الربح / الخسارة</th>
                                <th>مؤشر النمو</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($annualData as $index => $data)
                            <tr>
                                <td class="font-weight-bold text-dark">{{ $data['year'] }}</td>
                                <td class="text-success">{{ number_format($data['revenue'], 2) }} ILS</td>
                                <td class="text-danger">{{ number_format($data['expenses'], 2) }} ILS</td>
                                <td class="font-weight-bolder {{ $data['net_profit'] >= 0 ? 'text-primary' : 'text-danger' }}">
                                    {{ number_format($data['net_profit'], 2) }} ILS
                                </td>
                                <td>
                                    @php
                                        $prevYear = isset($annualData[$index + 1]) ? $annualData[$index + 1]['net_profit'] : null;
                                        $growth = $prevYear && $prevYear != 0 ? (($data['net_profit'] - $prevYear) / abs($prevYear)) * 100 : null;
                                    @endphp
                                    @if($growth !== null)
                                        <div class="trend-badge {{ $growth >= 0 ? 'trend-up' : 'trend-down' }}">
                                            <i class="fas fa-arrow-{{ $growth >= 0 ? 'up' : 'down' }} mr-2"></i>
                                            {{ number_format(abs($growth), 1) }}%
                                        </div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('execAnnualChart').getContext('2d');
        
        const revGrad = ctx.createLinearGradient(0, 0, 0, 400);
        revGrad.addColorStop(0, 'rgba(16, 185, 129, 0.4)');
        revGrad.addColorStop(1, 'rgba(16, 185, 129, 0)');

        const expGrad = ctx.createLinearGradient(0, 0, 0, 400);
        expGrad.addColorStop(0, 'rgba(239, 68, 68, 0.2)');
        expGrad.addColorStop(1, 'rgba(239, 68, 68, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($monthlyData['labels']),
                datasets: [{
                    label: 'الإيرادات',
                    data: @json($monthlyData['revenue']),
                    borderColor: '#10b981',
                    borderWidth: 4,
                    backgroundColor: revGrad,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }, {
                    label: 'المصاريف',
                    data: @json($monthlyData['expenses']),
                    borderColor: '#ef4444',
                    borderWidth: 4,
                    backgroundColor: expGrad,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [5, 5], drawBorder: false },
                        ticks: { padding: 10 }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    });
</script>
@endsection
