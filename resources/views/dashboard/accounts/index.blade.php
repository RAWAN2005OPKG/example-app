@extends('layouts.container')
@section('title', 'دليل الحسابات')

@section('content')
    {{-- الكود الخاص بعرض شجرة الحسابات هنا --}}
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">دليل الحسابات</h3>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addAccountModal">
                    <i class="fas fa-plus"></i> إضافة حساب جديد
                </button>
            </div>
        </div>
        <div class="card-body">
            {{-- هنا يمكنك وضع كود عرض الشجرة --}}
            <ul>
                @foreach($accounts as $account)
                    @include('dashboard.accounts.partials.account_node', ['account' => $account])
                @endforeach
            </ul>
        </div>
    </div>

    {{-- استدعاء النافذة المنبثقة --}}
    @include('dashboard.accounts.partials.add_modal', ['mainAccounts' => $mainAccounts])
@endsection
