@extends('layouts.container')
@section('title', 'عرض القيد رقم ' . $journalEntry->id)

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1><i class="fas fa-eye"></i> عرض القيد رقم #{{ $journalEntry->id }}</h1>
        <div class="header-actions">
            <button onclick="window.print()" class="btn btn-secondary"><i class="fas fa-print"></i> طباعة</button>
        </div>
    </div>

    <div class="form-container">
        <div class="form-grid" style="grid-template-columns: 1fr 3fr;">
            <p><strong>التاريخ:</strong> {{ $journalEntry->date }}</p>
            <p><strong>البيان:</strong> {{ $journalEntry->description }}</p>
        </div>

        <h3 class="container-title mt-4">بنود القيد</h3>
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الحساب</th>
                        <th>مدين</th>
                        <th>دائن</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($journalEntry->items as $item)
                    <tr>
                        <td>{{ $item->account->name }} ({{ $item->account->code }})</td>
                        <td>{{ number_format($item->debit, 2) }}</td>
                        <td>{{ number_format($item->credit, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="text-right"><strong>الإجمالي</strong></td>
                        <td><strong>{{ number_format($journalEntry->items->sum('debit'), 2) }}</strong></td>
                        <td><strong>{{ number_format($journalEntry->items->sum('credit'), 2) }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>
@endsection
