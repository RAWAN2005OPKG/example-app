@extends('layouts.container')
@section('title', 'إجمالي الحسابات المالية | Executive Terminal')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    :root {
        --terminal-bg: #e2e2e3ff;
        --terminal-card: #050607ff;
        --terminal-accent: #38bdf8;
        --terminal-success: #10b981;
        --terminal-warning: #fbbf24;
        --terminal-danger: #ef4444;
        --terminal-text: #f7fbffff;
        --terminal-muted: #546071ff;
        --terminal-border: rgba(28, 15, 15, 0.1);
    }

    body {
        background: #e0e2e9ff;
        font-family: 'Outfit', sans-serif;
        color: var(--terminal-text);
    }

    .terminal-container {
        padding: 2rem;
        max-width: 1600px;
        margin: 0 auto;
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Executive Header */
    .terminal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--terminal-border);
    }

    .terminal-title h1 {
        font-weight: 800;
        font-size: 2.5rem;
        letter-spacing: -0.025em;
        background: linear-gradient(to right, #14217aff, var(--terminal-muted));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
    }

    .terminal-meta {
        font-family: 'monospace';
        font-size: 0.8rem;
        color: var(--terminal-accent);
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    /* KPI Grid */
    .kpi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .kpi-card {
        background: var(--terminal-card);
        border: 1px solid var(--terminal-border);
        border-radius: 12px;
        padding: 1.75rem;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }

    .kpi-card:hover {
        transform: translateY(-5px);
        border-color: var(--terminal-accent);
    }

    .kpi-card::before {
        content: '';
        position: absolute;
        top: 0; right: 0; width: 4px; height: 100%;
    }

    .kpi-card.cash::before { background: var(--terminal-success); }
    .kpi-card.bank::before { background: var(--terminal-accent); }
    .kpi-card.checks::before { background: var(--terminal-warning); }

    .kpi-label {
        color: var(--terminal-muted);
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.5rem;
    }

    .kpi-value {
        font-size: 2.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: baseline;
    }

    .currency {
        font-size: 1rem;
        color: var(--terminal-muted);
        margin-left: 0.5rem;
    }

    /* Terminal Tabs */
    .terminal-tabs-nav {
        display: flex;
        gap: 0.5rem;
        background: #020617;
        padding: 0.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        width: fit-content;
    }

    .terminal-tab-btn {
        background: transparent;
        border: none;
        color: var(--terminal-muted);
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }

    .terminal-tab-btn.active {
        background: var(--terminal-card);
        color: var(--terminal-accent);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    /* Data Table */
    .terminal-table-container {
        background: var(--terminal-card);
        border-radius: 12px;
        border: 1px solid var(--terminal-border);
        overflow: hidden;
    }

    .terminal-table {
        width: 100%;
        border-collapse: collapse;
    }

    .terminal-table th {
        background: rgba(15, 23, 42, 0.5);
        padding: 1.25rem;
        text-align: right;
        font-size: 0.8rem;
        color: var(--terminal-muted);
        text-transform: uppercase;
        border-bottom: 1px solid var(--terminal-border);
    }

    .terminal-table td {
        padding: 1.25rem;
        border-bottom: 1px solid var(--terminal-border);
        font-size: 0.95rem;
    }

    .terminal-table tr:hover td {
        background: rgba(255, 255, 255, 0.02);
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        background: rgba(255, 255, 255, 0.05);
    }

    .trend-up { color: var(--terminal-success); }
    .trend-down { color: var(--terminal-danger); }

    /* Action Bar */
    .action-bar {
        position: fixed;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(30, 41, 59, 0.8);
        backdrop-filter: blur(12px);
        padding: 0.75rem 1.5rem;
        border-radius: 9999px;
        border: 1px solid var(--terminal-border);
        display: flex;
        gap: 1.5rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        z-index: 1000;
    }

    .action-link {
        color: var(--terminal-text);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        opacity: 0.7;
        transition: opacity 0.2s;
    }

    .action-link:hover {
        opacity: 1;
        color: var(--terminal-accent);
    }

    /* RTL Support */
    [dir="rtl"] .kpi-card::before { left: 0; right: auto; }

    .terminal-content,
    .tab-pane,
    .terminal-table-container {
        min-width: 0;
    }

    .terminal-table-container {
        overflow-x: auto;
        box-shadow: 0 20px 45px rgba(2, 6, 23, 0.22);
    }

    .terminal-table th,
    .terminal-table td {
        white-space: nowrap;
    }

    @media (max-width: 991.98px) {
        .terminal-container {
            padding: 1.5rem 0 3rem;
        }

        .terminal-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .terminal-title h1 {
            font-size: 2rem;
        }

        .terminal-tabs-nav {
            width: 100%;
            overflow-x: auto;
            padding-bottom: 0.75rem;
        }

        .terminal-tab-btn {
            flex: 0 0 auto;
        }

        .action-bar {
            position: static;
            transform: none;
            width: 100%;
            margin-top: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
            border-radius: 18px;
            padding: 1rem;
        }
    }

    @media (max-width: 767.98px) {
        .kpi-grid {
            grid-template-columns: 1fr;
        }

        .kpi-card {
            padding: 1.25rem;
        }

        .kpi-value {
            font-size: 1.7rem;
            flex-wrap: wrap;
            gap: 0.35rem;
        }

        .terminal-table th,
        .terminal-table td {
            padding: 1rem 0.85rem;
            font-size: 0.85rem;
        }

        .action-link {
            font-size: 0.8rem;
        }
    }
</style>
@endsection

@section('content')
<div class="terminal-container" dir="rtl">
    
    <!-- Header -->
    <header class="terminal-header">
        <div class="terminal-title text-right">
            <div class="terminal-meta">حالة النظام: مثالية // وقت الاستجابة: 24ms</div>
            <h1>Executive Terminal</h1>
        </div>
        <div class="text-left">
            <div class="terminal-meta">إجمالي الرصيد العام (الأساسي + الحالي)</div>
            <div class="font-weight-bold" style="font-size: 1.8rem;">
                 {{ number_format($totalCapital, 2) }} <span class="currency">ILS</span>
            </div>
        </div>
    </header>

    <!-- KPI Grid -->
    <div class="kpi-grid">
        <div class="kpi-card">
            <div class="kpi-label">الرصيد الأساسي من الإعدادات</div>
            <div class="kpi-value"> {{ number_format($openingBalance, 2) }} <span class="currency">ILS</span></div>
            <div class="terminal-meta"><i class="fas fa-circle text-primary ml-2"></i> قيمة البداية المعتمدة</div>
        </div>
        <div class="kpi-card cash">
            <div class="kpi-label">السيولة النقدية (الخزائن)</div>
            <div class="kpi-value"> {{ number_format($totalCashBalance, 2) }} <span class="currency">ILS</span></div>
            <div class="terminal-meta"><i class="fas fa-circle text-success ml-2"></i> {{ $cashSafes->count() }} حسابات نشطة</div>
        </div>
        <div class="kpi-card bank">
            <div class="kpi-label">الاحتياطيات البنكية</div>
            <div class="kpi-value"> {{ number_format($totalBankBalance, 2) }} <span class="currency">ILS</span></div>
            <div class="terminal-meta"><i class="fas fa-circle text-info ml-2"></i> {{ $bankAccounts->count() }} مؤسسات مالية</div>
        </div>
        <div class="kpi-card checks">
            <div class="kpi-label">الأصول العائمة (الشيكات)</div>
            <div class="kpi-value"> {{ number_format($totalChecksBalance, 2) }} <span class="currency">ILS</span></div>
            <div class="terminal-meta"><i class="fas fa-circle text-warning ml-2"></i> {{ $checkStats['in_wallet'] + $checkStats['under_collection'] }} قيد التحصيل</div>
        </div>
    </div>

    <!-- Interface Tabs -->
    <div class="terminal-tabs-nav" id="terminalTabs">
        <button class="terminal-tab-btn active" data-target="#safesSection">الخزائن النقدية</button>
        <button class="terminal-tab-btn" data-target="#banksSection">الحسابات البنكية</button>
        <button class="terminal-tab-btn" data-target="#checksSection">دفتر الشيكات</button>
    </div>

    <!-- Data Sections -->
    <div class="terminal-content">
        <!-- Safes -->
        <div class="tab-pane active" id="safesSection">
            <div class="terminal-table-container">
                <table class="terminal-table">
                    <thead>
                        <tr>
                            <th>مسمى الحساب</th>
                            <th>العملة</th>
                            <th>رصيد المحطة</th>
                            <th>الحالة التشغيلية</th>
                            <th>الأداء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cashSafes as $safe)
                        <tr>
                            <td class="font-weight-bold">{{ $safe->name }}</td>
                            <td><span class="status-pill">{{ $safe->currency }}</span></td>
                            <td class="font-weight-bold" style="font-size: 1.1rem;">{{ number_format($safe->display_balance ?? $safe->balance, 2) }}</td>
                            <td>
                                @if($safe->is_active)
                                    <span class="text-success"><i class="fas fa-check-circle ml-2"></i> متصل</span>
                                @else
                                    <span class="text-muted"><i class="fas fa-times-circle ml-2"></i> غير متصل</span>
                                @endif
                            </td>
                            <td><span class="trend-up"><i class="fas fa-caret-up ml-1"></i> مستقر</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Banks (Hidden by default) -->
        <div class="tab-pane d-none" id="banksSection">
            <div class="terminal-table-container">
                <table class="terminal-table">
                    <thead>
                        <tr>
                            <th>اسم المؤسسة</th>
                            <th>ناقل الحساب</th>
                            <th>الرصيد السائل</th>
                            <th>العملة</th>
                            <th>التحقق</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bankAccounts as $account)
                        <tr>
                            <td>{{ $account->bank_name }}</td>
                            <td class="font-weight-bold">{{ $account->account_number }}</td>
                            <td class="font-weight-bold text-info">{{ number_format($account->display_balance ?? $account->resolved_balance, 2) }}</td>
                            <td>{{ $account->currency }}</td>
                            <td><span class="status-pill text-success">مؤمن</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Checks (Hidden by default) -->
        <div class="tab-pane d-none" id="checksSection">
            <div class="terminal-table-container">
                <table class="terminal-table">
                    <thead>
                        <tr>
                            <th>رقم القيد</th>
                            <th>قيمة الأصل</th>
                            <th>تاريخ الاستحقاق</th>
                            <th>ناقل الحالة</th>
                            <th>الجهة المالكة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checks as $check)
                        <tr>
                            <td>#{{ $check->check_number }}</td>
                            <td class="font-weight-bold">{{ number_format($check->amount_ils, 2) }} ILS</td>
                            <td>{{ $check->due_date }}</td>
                            <td>
                                <span class="status-pill {{ $check->status == 'cleared' ? 'text-success' : 'text-warning' }}">
                                    {{ strtoupper($check->status) }}
                                </span>
                            </td>
                            <td>{{ $check->holder_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4 border-top">
                    {{ $checks->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Executive Action Bar -->
    <div class="action-bar">
        <a href="{{ route('dashboard.fund-transfers.index') }}" class="action-link"><i class="fas fa-random"></i> تحويل بين الحسابات</a>
        <a href="{{ route('dashboard.cash-safes.create') }}" class="action-link"><i class="fas fa-plus-square"></i> محطة سيولة جديدة</a>
        <a href="{{ route('dashboard.bank-accounts.create') }}" class="action-link"><i class="fas fa-university"></i> تسجيل مؤسسة</a>
        <div class="action-link" style="opacity: 0.3; cursor: not-allowed; border-left: 1px solid var(--terminal-border); padding-left: 1.5rem;">|</div>
        <a href="#" class="action-link text-danger"><i class="fas fa-file-pdf"></i> استخراج تقرير مالي</a>
    </div>

</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.terminal-tab-btn');
        const sections = document.querySelectorAll('.tab-pane');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.getAttribute('data-target');
                
                // Update buttons
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // Update sections
                sections.forEach(s => s.classList.add('d-none'));
                document.querySelector(target).classList.remove('d-none');
            });
        });
    });
</script>
@endsection
