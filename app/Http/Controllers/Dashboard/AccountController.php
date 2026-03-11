<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * عرض صفحة دليل الحسابات.
     */
    public function index()
    {
        // جلب شجرة الحسابات الكاملة (الحسابات التي ليس لها أب) لعرضها
        $accounts = Account::whereNull('parent_id')->with('children')->get();

        // جلب الحسابات الرئيسية فقط لتعبئة قائمة "الحساب الرئيسي التابع له"
        $mainAccounts = Account::where('is_main', true)->orderBy('name')->get();

        return view('dashboard.accounts.index', compact('accounts', 'mainAccounts'));
    }

    /**
     * تخزين حساب جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:accounts,code',
            'is_main' => 'required|boolean',
            // الحقل parent_id مطلوب فقط إذا كان الحساب فرعياً (is_main = 0)
            'parent_id' => [
                Rule::requiredIf(function () use ($request) {
                    return !$request->is_main;
                }),
                'nullable',
                'exists:accounts,id'
            ],
        ]);

        // إذا كان الحساب رئيسياً، تأكد من أن parent_id هو null
        $parentId = $request->is_main ? null : $request->parent_id;

        Account::create([
            'name' => $request->name,
            'code' => $request->code,
            'is_main' => $request->is_main,
            'parent_id' => $parentId,
            // افترض أن النوع يتم تحديده بناءً على الحساب الأب أو منطق آخر
            // للتسهيل، سنعطيه قيمة افتراضية الآن
            'type' => 'asset',
        ]);

        return redirect()->route('dashboard.accounts.index')->with('success', 'تم إضافة الحساب بنجاح.');
    }

    /**
     * تحديث بيانات حساب موجود.
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => ['required', 'string', Rule::unique('accounts')->ignore($account->id)],
            'is_main' => 'required|boolean',
            'parent_id' => [
                Rule::requiredIf(!$request->is_main),
                'nullable',
                'exists:accounts,id'
            ],
            'is_active' => 'required|boolean',
        ]);

        // منع تعيين الحساب كابن لنفسه
        if ($request->parent_id == $account->id) {
            return back()->with('error', 'لا يمكن تعيين الحساب كحساب أب لنفسه.');
        }

        $parentId = $request->is_main ? null : $request->parent_id;

        $account->update([
            'name' => $request->name,
            'code' => $request->code,
            'is_main' => $request->is_main,
            'parent_id' => $parentId,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('dashboard.accounts.index')->with('success', 'تم تحديث الحساب بنجاح.');
    }

    /**
     * حذف حساب من قاعدة البيانات.
     */
    public function destroy(Account $account)
    {
        // منطق أمان: لا تسمح بحذف حساب رئيسي لديه حسابات فرعية
        if ($account->children()->exists()) {
            return redirect()->route('dashboard.accounts.index')->with('error', 'لا يمكن حذف حساب رئيسي يحتوي على حسابات فرعية.');
        }

        $account->delete();

        return redirect()->route('dashboard.accounts.index')->with('success', 'تم حذف الحساب بنجاح.');
    }
}
