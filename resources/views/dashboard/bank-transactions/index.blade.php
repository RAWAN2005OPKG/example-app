@extends('layouts.container')
@section('title', 'كشف حساب بنكي')

@push('styles')
<style>
    .table-success-light { background-color: #e8fff3 !important; }
    .table-danger-light { background-color: #fff5f8 !important; }
    .table-info-light { background-color: #f1faff !important; }
</style>
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            كشف حساب بنكي
            @if($selectedAccount)
                : <span class="text-primary font-weight-bolder">{{ $selectedAccount->account_name }}</span>
                (الرصيد الحالي: <span class="text-success font-weight-bolder">{{ number_format($currentBalance, 2) }} {{ $selectedAccount->currency }}</span>)
            @endif
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('dashboard.bank-transactions.create') }}" class="btn btn-primary"><i class="la la-plus"></i> إضافة حركة جديدة</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

        {{-- نموذج اختيار الحساب البنكي --}}
        <form method="GET" action="{{ route('dashboard.bank-transactions.index') }}" class="mb-8 p-4 bg-light rounded">
            <div class="form-group">
                <label for="bank_account_id" class="font-weight-bold">اختر حساباً بنكياً لعرض كشف حسابه:</label>
                <div class="input-group">
                    <select name="bank_account_id" id="bank_account_id" class="form-control form-control-lg" onchange="this.form.submit()">
                        <option value="">-- اختر حساب --</option>
                        @foreach($bankAccounts as $account)
                            <option value="{{ $account->id }}" @if($selectedAccount && $selectedAccount->id == $account->id) selected @endif>
                                {{ $account->account_name }} ({{ $account->bank->name ?? 'N/A' }}) - {{ $account->currency }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">عرض الكشف</button>
                    </div>
                </div>
            </div>
        </form>

        {{-- هذا الجزء يظهر فقط بعد اختيار حساب --}}
        @if($selectedAccount)
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>التاريخ</th>
                            <th>البيان/التفاصيل</th>
                            <th class="text-center">إيداع (دائن)</th>
                            <th class="text-center">سحب (مدين)</th>
                            <th>الرصيد</th>
                            <th class="text-center">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- صف الرصيد الافتتاحي --}}
                        <tr class="table-info-light">
                            <td colspan="5" class="font-weight-bold">الرصيد الافتتاحي</td>
                            <td class="font-weight-bolder">{{ number_format($openingBalance, 2) }}</td>
                        </tr>

                        {{-- عرض الحركات مع الرصيد المتراكم --}}
                        @forelse ($transactionsWithBalance as $transaction)
                            <tr class="{{ $transaction->is_credit ? 'table-success-light' : 'table-danger-light' }}">
                                <td>{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                                <td>{{ $transaction->details }}</td>
                                <td class="text-center">
                                    @if($transaction->is_credit)
                                        <span class="font-weight-bold text-success">+ {{ number_format($transaction->amount, 2) }}</span>
                                    @else - @endif
                                </td>
                                <td class="text-center">
                                    @if(!$transaction->is_credit)
                                        <span class="font-weight-bold text-danger">- {{ number_format($transaction->amount, 2) }}</span>
                                    @else - @endif
                                </td>
                                <td class="font-weight-bolder">{{ number_format($transaction->balance, 2) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dashboard.bank-transactions.edit', $transaction->id) }}" class="btn btn-sm btn-icon btn-light-warning" title="تعديل"><i class="la la-edit"></i></a>
                                    <form action="{{ route('dashboard.bank-transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟ سيتم عكس الأثر المالي لهذه الحركة.');" style="display: inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-light-danger" title="حذف"><i class="la la-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center py-5">لا توجد حركات لهذا الحساب.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">يرجى اختيار حساب بنكي من القائمة أعلاه لعرض كشف الحساب الخاص به.</div>
        @endif
    </div>
</div>
@endsection
