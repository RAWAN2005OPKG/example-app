<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::latest()->paginate(15);
        return view('dashboard.banks.index', compact('banks'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:banks,name']);
        Bank::create($request->only('name'));
        return back()->with('success', 'تمت إضافة البنك بنجاح.');
    }

    public function update(Request $request, Bank $bank)
    {
        $request->validate(['name' => 'required|string|unique:banks,name,' . $bank->id]);
        $bank->update($request->only('name'));
        return back()->with('success', 'تم تعديل اسم البنك بنجاح.');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return back()->with('success', 'تم حذف البنك بنجاح.');
    }
public function show(Bank $bank)
{
   
    $bank->load('accounts.transactions');

    return view('dashboard.banks.show', compact('bank'));
}}
