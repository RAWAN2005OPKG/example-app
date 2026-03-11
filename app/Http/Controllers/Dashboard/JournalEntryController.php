<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\JournalEntry;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JournalEntryController extends Controller
{
    public function index(Request $request)
    {
        $query = JournalEntry::with('items.account')->latest();

        // فلتر البحث بالرقم المرجعي أو البيان
        if ($search = $request->input('search')) {
            $query->where('id', $search)
                  ->orWhere('description', 'like', "%{$search}%");
        }

        // فلتر التاريخ "من"
        if ($date_from = $request->input('date_from')) {
            $query->where('date', '>=', $date_from);
        }

        // فلتر التاريخ "إلى"
        if ($date_to = $request->input('date_to')) {
            $query->where('date', '<=', $date_to);
        }

        $journalEntries = $query->paginate(20);
        $accounts = Account::where('is_main', false)->orderBy('name')->get(); // جلب الحسابات الفرعية فقط

        return view('dashboard.journal_entries.index', compact('journalEntries', 'accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'items' => 'required|array|min:2',
            'items.*.account_id' => 'required|exists:accounts,id',
            'items.*.debit' => 'nullable|numeric|min:0',
            'items.*.credit' => 'nullable|numeric|min:0',
        ], [
            'items.required' => 'يجب إضافة سطرين على الأقل في القيد.',
            'items.min' => 'يجب إضافة سطرين على الأقل في القيد.',
        ]);

        $totalDebit = collect($request->items)->sum(fn($item) => (float)($item['debit'] ?? 0));
        $totalCredit = collect($request->items)->sum(fn($item) => (float)($item['credit'] ?? 0));

        if (round($totalDebit, 2) !== round($totalCredit, 2)) {
            return back()->withErrors(['balance' => 'القيد غير متوازن! مجموع المدين لا يساوي مجموع الدائن.'])->withInput();
        }
        if ($totalDebit == 0) {
            return back()->withErrors(['balance' => 'لا يمكن إنشاء قيد بقيمة صفر.'])->withInput();
        }

        DB::beginTransaction();
        try {
            $journalEntry = JournalEntry::create($request->only('date', 'description'));
            foreach ($request->items as $item) {
                if (!empty($item['debit']) || !empty($item['credit'])) {
                    $journalEntry->items()->create([
                        'account_id' => $item['account_id'],
                        'debit' => $item['debit'] ?? 0,
                        'credit' => $item['credit'] ?? 0,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('dashboard.journal-entries.index')->with('success', 'تم تسجيل القيد بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء حفظ القيد: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(JournalEntry $journalEntry)
    {
        $journalEntry->delete();
        return redirect()->route('dashboard.journal-entries.index')->with('success', 'تم حذف القيد بنجاح.');
    }
}
