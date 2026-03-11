
@extends('layouts.container')
@section('title', 'تفاصيل بنك: ' . $bank->name)

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">تفاصيل بنك: {{ $bank->name }}</h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.banks.index') }}" class="btn btn-secondary">العودة إلى قائمة البنوك</a>
        </div>
    </div>
    <div class="card-body">

        <h4 class="mt-5 mb-5">الحسابات البنكية التابعة للبنك:</h4>

        @forelse($bank->accounts as $account)
            <div class="card card-custom gutter-b card-stretch" style="border: 1px solid #eee;">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ $account->account_name }}</h3>
                        <small class="text-muted ml-2">({{ $account->account_number }})</small>
                    </div>
                    <div class="card-toolbar">
                        <span class="label label-lg font-weight-bold label-light-primary label-inline">
                            الرصيد: {{ number_format($account->resolved_balance, 2) }} {{ $account->currency }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <h5>آخر الحركات على الحساب:</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>التاريخ</th>
                                    <th>الوصف</th>
                                    <th>النوع</th>
                                    <th>المبلغ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($account->transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->transaction_date }}</td>
                                        <td>{{ $transaction->description }}</td>
                                        <td>
                                            @if($transaction->type == 'deposit')
                                                <span class="label label-light-success label-inline">إيداع</span>
                                            @else
                                                <span class="label label-light-danger label-inline">سحب</span>
                                            @endif
                                        </td>
                                        <td class="font-weight-bold" style="color: {{ $transaction->type == 'deposit' ? 'green' : 'red' }};">
                                            {{ number_format($transaction->amount, 2) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center text-muted">لا توجد حركات على هذا الحساب.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-secondary text-center">لا توجد حسابات بنكية مضافة لهذا البنك بعد.</div>
        @endforelse
    </div>
</div>
@endsection
