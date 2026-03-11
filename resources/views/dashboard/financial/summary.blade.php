@extends('layouts.container')
@section('title', 'التحليل المالي الاستراتيجي | Executive Terminal')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    :root {
        --terminal-bg: #020617;
        --terminal-card: #0f172a;
        --terminal-accent: #38bdf8;
        --terminal-success: #10b981;
        --terminal-warning: #fbbf24;
        --terminal-danger: #ef4444;
        --terminal-text: #f8fafc;
        --terminal-muted: #64748b;
        --terminal-border: rgba(255, 255, 255, 0.08);
    }

    body {
        background: var(--terminal-bg);
        font-family: 'Outfit', sans-serif;
        color: var(--terminal-text);
    }

    .analysis-container {
        padding: 2.5rem;
        max-width: 1600px;
        margin: 0 auto;
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* executive header */
    .exec-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3.5rem;
        border-bottom: 1px solid var(--terminal-border);
        padding-bottom: 2rem;
    }

    .exec-title h1 {
        font-weight: 800;
        font-size: 2.75rem;
        letter-spacing: -0.05em;
        margin: 0;
        background: linear-gradient(to right, #fff, #94a3b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .exec-meta {
        font-family: 'monospace';
        font-size: 0.8rem;
        color: var(--terminal-accent);
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    /* analytics grid */
    .metrics-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .metric-card {
        background: var(--terminal-card);
        border: 1px solid var(--terminal-border);
        border-radius: 16px;
        padding: 2rem;
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .metric-card:hover {
        border-color: var(--terminal-accent);
        background: #1e293b;
    }

    .metric-label {
        font-size: 0.85rem;
        color: var(--terminal-muted);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.75rem;
    }

    .metric-value {
        font-size: 2.25rem;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: baseline;
    }

    .metric-trend {
        font-size: 0.8rem;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.05);
    }

    /* central visualization */
    .viz-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 3.5rem;
    }

    .viz-card {
        background: var(--terminal-card);
        border: 1px solid var(--terminal-border);
        border-radius: 20px;
        padding: 2.5rem;
    }

    /* refined feed */
    .terminal-table {
        width: 100%;
        border-collapse: collapse;
    }

    .terminal-table th {
        background: rgba(255, 255, 255, 0.02);
        padding: 1.25rem;
        text-align: right;
        font-size: 0.8rem;
        color: var(--terminal-muted);
        text-transform: uppercase;
        border-bottom: 1px solid var(--terminal-border);
    }

    .terminal-table td {
        padding: 1.5rem;
        border-bottom: 1px solid var(--terminal-border);
        font-size: 0.95rem;
    }

    .status-badge {
        font-size: 0.7rem;
        font-weight: 800;
        padding: 4px 12px;
        border-radius: 100px;
        text-transform: uppercase;
    }

    /* Progress Circles/Bars */
    .health-indicator {
        position: relative;
        width: 100%;
        height: 8px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 4px;
        margin-top: 1rem;
    }

    .health-fill {
        height: 100%;
        border-radius: 4px;
        background: linear-gradient(to right, var(--terminal-accent), var(--terminal-success));
    }

    .table-responsive {
        border-radius: 16px;
    }

    .terminal-table th,
    .terminal-table td {
        white-space: nowrap;
    }

    @media (max-width: 1199.98px) {
        .viz-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 991.98px) {
        .analysis-container {
            padding: 1.5rem 0;
        }

        .exec-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .exec-title h1 {
            font-size: 2.15rem;
        }

        .viz-card {
            padding: 1.5rem;
        }
    }

    @media (max-width: 767.98px) {
        .metrics-grid {
            grid-template-columns: 1fr;
        }

        .metric-card {
            padding: 1.25rem;
        }

        .metric-value {
            font-size: 1.75rem;
            flex-wrap: wrap;
            gap: 0.35rem;
        }

        .terminal-table th,
        .terminal-table td {
            padding: 1rem 0.85rem;
            font-size: 0.85rem;
        }

        .btn-group,
        .btn-group .btn {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="analysis-container" dir="rtl">
    
    <!-- Executive Header -->
    <header class="exec-header">
        <div class="exec-title">
            <div class="exec-meta">الذكاء المالي المتقدم // معالج البيانات v2.0</div>
            <h1>التحليل الاستراتيجي</h1>
        </div>
        <div class="text-left">
            <div class="btn-group">
                <button class="btn btn-outline-light rounded-pill px-4 py-2 font-weight-bold" style="border-color: var(--terminal-border);">
                    تقرير الربحية <i class="fas fa-file-invoice-dollar mr-2"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Essential Metrics -->
    <div class="metrics-grid">
        <div class="metric-card">
            <div class="metric-label">إجمالي العوائد التشغيلية</div>
            <div class="metric-value">{{ number_format($totalRevenue, 2) }} <span class="metric-meta mr-2" style="font-size: 1rem; color: var(--terminal-muted);">ILS</span></div>
            <div class="metric-trend text-success"><i class="fas fa-arrow-up ml-1"></i> 12.5%</div>
        </div>
        <div class="metric-card">
            <div class="metric-label">المصروفات الرأس مالية</div>
            <div class="metric-value text-danger">{{ number_format($totalExpenses, 2) }} <span class="metric-meta mr-2" style="font-size: 1rem; color: var(--terminal-muted);">ILS</span></div>
            <div class="metric-trend text-danger"><i class="fas fa-arrow-up ml-1"></i> 4.2%</div>
        </div>
        <div class="metric-card" style="background: var(--terminal-accent); color: var(--terminal-bg);">
            <div class="metric-label" style="color: rgba(0,0,0,0.5);">صافي الأرباح المحققة</div>
            <div class="metric-value" style="color: #000;">{{ number_format($netProfit, 2) }} <span class="mr-2" style="font-size: 1rem; opacity: 0.5;">ILS</span></div>
            <div class="metric-trend" style="background: rgba(0,0,0,0.1); color: #000;">PERFORMANCE: PEAK</div>
        </div>
        <div class="metric-card">
            <div class="metric-label">هامش الأمان النقدي</div>
            <div class="metric-value text-warning">{{ number_format($netCashFlow, 2) }} <span class="metric-meta mr-2" style="font-size: 1rem; color: var(--terminal-muted);">ILS</span></div>
            <div class="metric-trend text-warning">STABLE FLOW</div>
        </div>
    </div>

    <!-- Core Visualization -->
    <div class="viz-grid">
        <div class="viz-card">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h5 class="font-weight-bold m-0">تحليل الأداء (6 أشهر)</h5>
                <div class="exec-meta">Visual Data Stream // ACTIVE</div>
            </div>
            <div style="height: 380px;">
                <canvas id="terminalMainChart"></canvas>
            </div>
        </div>

        <div class="viz-card text-right">
            <h5 class="font-weight-bold mb-5">كفاءة الأصول</h5>
            
            <div class="mb-5">
                <div class="d-flex justify-content-between mb-2">
                    <span class="font-weight-bold text-muted small">هامش الربحية التشغيلي</span>
                    <span class="font-weight-bold text-success">{{ number_format($profitMargin, 1) }}%</span>
                </div>
                <div class="health-indicator">
                    <div class="health-fill" style="width: {{ min(100, max(0, $profitMargin)) }}%"></div>
                </div>
            </div>

            <div class="mb-5">
                <div class="d-flex justify-content-between mb-2">
                    <span class="font-weight-bold text-muted small">نسبة استنزاف الإيرادات</span>
                    <span class="font-weight-bold text-danger">{{ number_format($expenseRatio, 1) }}%</span>
                </div>
                <div class="health-indicator">
                    <div class="health-fill" style="width: {{ min(100, max(0, $expenseRatio)) }}%; background: var(--terminal-danger);"></div>
                </div>
            </div>

            <div class="mt-5 p-4" style="background: rgba(255,255,255,0.02); border-radius: 12px; border: 1px dashed var(--terminal-border);">
                <div class="exec-meta mb-2">توصية النظام // EXECUTIVE ADVISORY</div>
                <p class="text-muted small mb-0">المؤشرات الحالية تعكس كفاءة استثنائية في إدارة التكاليف. يُنصح بتوسيع المحفظة الاستثمارية في الربع القادم.</p>
            </div>
        </div>
    </div>

    <!-- Transaction Log -->
    <div class="viz-card">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h5 class="font-weight-bold m-0">سجل القيود التشغيلية الأخيرة</h5>
            <a href="{{ route('dashboard.journal-entries.index') }}" class="exec-meta text-decoration-none hover-accent">View All Audit Logs <i class="fas fa-chevron-left mr-2"></i></a>
        </div>
        <div class="table-responsive">
            <table class="terminal-table">
                <thead>
                    <tr>
                        <th>البيان المحاسبي</th>
                        <th>التوقيت الرقمي</th>
                        <th>قيمة المعاملة</th>
                        <th>الحالة البرمجيّة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestTransactions as $entry)
                    <tr>
                        <td class="font-weight-bold">{{ $entry->description }}</td>
                        <td><span class="text-muted">{{ $entry->date->format('Y-m-d') }}</span></td>
                        <td>
                            @php $amt = $entry->items->first()->debit ?: $entry->items->first()->credit; @endphp
                            <span class="font-weight-bold {{ $entry->items->first()->debit ? 'text-danger' : 'text-success' }}">
                                {{ number_format($amt, 2) }} ILS
                            </span>
                        </td>
                        <td><span class="status-badge bg-white text-dark">COMMIT_SUCCESS</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center py-5 text-muted">No data stream detected.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('terminalMainChart').getContext('2d');
        
        const revGrad = ctx.createLinearGradient(0, 0, 0, 400);
        revGrad.addColorStop(0, 'rgba(56, 189, 248, 0.4)');
        revGrad.addColorStop(1, 'rgba(56, 189, 248, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Revenue Flow',
                    data: @json($chartData['revenue']),
                    borderColor: '#38bdf8',
                    borderWidth: 4,
                    backgroundColor: revGrad,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6
                }, {
                    label: 'Expense Flow',
                    data: @json($chartData['expense']),
                    borderColor: '#ef4444',
                    borderWidth: 3,
                    backgroundColor: 'transparent',
                    fill: false,
                    tension: 0.4,
                    borderDash: [5, 5],
                    pointBackgroundColor: '#ef4444',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: { color: '#94a3b8', usePointStyle: true, font: { size: 12 } }
                    }
                },
                scales: {
                    y: {
                        grid: { color: 'rgba(255, 255, 255, 0.05)', drawBorder: false },
                        ticks: { color: '#64748b' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#64748b' }
                    }
                }
            }
        });
    });
</script>
@endsection
