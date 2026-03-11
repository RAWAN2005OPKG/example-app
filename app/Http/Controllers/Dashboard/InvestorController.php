<?php

namespace App\Http\Controllers\Dashboard;

// 1. استيراد الكلاسات الأساسية
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 2. استيراد المودلات
use App\Models\Investor;
use App\Models\Project;

// 3. استيراد المكتبات الإضافية
use App\Exports\InvestorsExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

use Illuminate\Support\Facades\DB;
use Throwable;

class InvestorController extends Controller
{
    /**
     * [مهم] عرض قائمة المستثمرين مع البحث والبيانات المرتبطة.
     */
    public function index(Request $request)
    {
        $query = Investor::query()->with(['projects', 'payments']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('unique_id', 'like', "%{$search}%")
                  ->orWhere('id_number', 'like', "%{$search}%");
            });
        }

        $investors = $query->latest()->paginate(10);
        return view('dashboard.investors.index', compact('investors'));
    }

    /**
     * عرض نموذج إنشاء مستثمر جديد.
     */
    public function create()
    {
        $projects = Project::select('id', 'name')->get();
        return view('dashboard.investors.create', compact('projects'));
    }

    /**
     * [مهم] حفظ مستثمر جديد في قاعدة البيانات.
     */
   public function store(Request $request)
{
    // [مهم] تعديل قواعد التحقق لتكون أكثر مرونة
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'company' => 'nullable|string|max:255',
        'id_number' => 'nullable|string|max:20|unique:investors,id_number',
        'phone' => 'nullable|string|max:20',
        'projects' => 'nullable|array', // قسم المشاريع بأكمله اختياري
        'projects.*.project_id' => 'required_with:projects|exists:projects,id', // مطلوب فقط إذا كان قسم المشاريع موجوداً
        'projects.*.invested_amount' => 'required_with:projects|numeric|min:0',
        'projects.*.currency' => 'required_with:projects|in:USD,JOD,ILS',
        'projects.*.exchange_rate' => 'required_with:projects|numeric|min:0',
        'projects.*.invested_amount_ils' => 'required_with:projects|numeric|min:0',
        'projects.*.investment_percentage' => 'nullable|numeric|min:0|max:100',
    ]);

    try {
        DB::beginTransaction();

        $investor = Investor::create([
            'name' => $validated['name'],
            'company' => $validated['company'],
            'id_number' => $validated['id_number'],
            'phone' => $validated['phone'],
        ]);

        // التحقق من أن هناك مشاريع لإضافتها
        if (!empty($validated['projects'])) {
            $projectsData = [];
            foreach ($validated['projects'] as $proj) {
                // [مهم] التأكد من أن project_id ليس فارغاً قبل المتابعة
                if (empty($proj['project_id'])) {
                    continue; // تجاهل هذا الاستثمار إذا لم يتم اختيار مشروع
                }
                $projectsData[$proj['project_id']] = [
                    'investment_percentage' => $proj['investment_percentage'] ?? null,
                    'invested_amount' => $proj['invested_amount'],
                    'currency' => $proj['currency'],
                    'exchange_rate' => $proj['exchange_rate'],
                    'invested_amount_ils' => $proj['invested_amount_ils'],
                    'notes' => $proj['notes'] ?? null,
                ];
            }
            // فقط قم بالإرفاق إذا كانت هناك بيانات فعلية
            if (!empty($projectsData)) {
                $investor->projects()->attach($projectsData);
            }
        }

        DB::commit();

        return redirect()->route('dashboard.investors.show', $investor->id)
            ->with('success', 'تم إنشاء المستثمر بنجاح!');

    } catch (Throwable $e) {
        DB::rollBack();
        // [الأهم] عرض رسالة خطأ واضحة جداً للمستخدم
        return back()->withInput()->with('error', 'فشل حفظ البيانات. خطأ تقني: ' . $e->getMessage());
    }
}

    /**
     * عرض صفحة تفاصيل المستثمر (ملف المستثمر).
     */
    public function show(Investor $investor)
    {
        $investor->load(['projects', 'payments' => function ($query) {
            $query->latest('payment_date');
        }]);

        return view('dashboard.investors.show', compact('investor'));
    }

    /**
     * عرض نموذج تعديل المستثمر.
     */
    public function edit(Investor $investor)
    {
        $projects = Project::select('id', 'name')->get();
        $investor->load('projects');
        return view('dashboard.investors.edit', compact('investor', 'projects'));
    }

    /**
     * تحديث بيانات المستثمر في قاعدة البيانات.
     */
    public function update(Request $request, Investor $investor)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'nullable|string|unique:investors,id_number,' . $investor->id, // تجاهل المستثمر الحالي عند التحقق
            'projects' => 'nullable|array',
            'projects.*.project_id' => 'required|exists:projects,id',
            'projects.*.invested_amount' => 'required|numeric|min:0',
            'projects.*.currency' => 'required|string|in:USD,JOD,ILS',
            'projects.*.exchange_rate' => 'required|numeric|min:0',
            'projects.*.invested_amount_ils' => 'required|numeric|min:0',
            'projects.*.investment_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        try {
            DB::transaction(function () use ($validatedData, $investor) {
                $investor->update(collect($validatedData)->except('projects')->toArray());
                $syncData = [];
                if (!empty($validatedData['projects'])) {
                    // تحويل البيانات للشكل الذي تتوقعه دالة sync
                    foreach ($validatedData['projects'] as $proj) {
                        $syncData[$proj['project_id']] = [
                            'investment_percentage' => $proj['investment_percentage'],
                            'invested_amount' => $proj['invested_amount'],
                            'currency' => $proj['currency'],
                            'exchange_rate' => $proj['exchange_rate'],
                            'invested_amount_ils' => $proj['invested_amount_ils'],
                        ];
                    }
                }
                $investor->projects()->sync($syncData);
            });
            return redirect()->route('dashboard.investors.show', $investor->id)->with('success', 'تم تحديث المستثمر بنجاح.');
        } catch (Throwable $e) {
            return back()->withInput()->with('error', 'فشل تحديث المستثمر: ' . $e->getMessage());
        }
    }

    /**
     * نقل مستثمر إلى سلة المحذوفات.
     */
    public function destroy(Investor $investor)
    {
        $investor->delete();
        return redirect()->route('dashboard.investors.index')->with('success', 'تم نقل المستثمر إلى سلة المحذوفات.');
    }

    // --- دوال سلة المحذوفات ---

    /**
     * عرض سلة المحذوفات.
     */
 public function trash()
{
    $trashedInvestors = Investor::onlyTrashed()->latest()->paginate(10);
    return view('dashboard.investors.trash', compact('trashedInvestors'));
}

    /**
     * استعادة مستثمر محذوف.
     */
    public function restore($id)
    {
        $investor = Investor::onlyTrashed()->findOrFail($id);
        $investor->restore();
        return redirect()->route('dashboard.investors.trash')->with('success', 'تم استعادة المستثمر بنجاح.');
    }

    /**
     * حذف مستثمر بشكل نهائي.
     */
    public function forceDelete($id)
    {
        $investor = Investor::onlyTrashed()->findOrFail($id);
        $investor->forceDelete();
        return redirect()->route('dashboard.investors.trash')->with('success', 'تم حذف المستثمر نهائياً.');
    }

    // --- دوال التصدير ---

    /**
     * تصدير قائمة المستثمرين إلى ملف Excel.
     */
    public function exportExcel()
    {
        return Excel::download(new InvestorsExport, 'investors.xlsx');
    }

    /**
     * تصدير بيانات مستثمر محدد إلى ملف Word.
     */
    public function exportWord(Investor $investor)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addTitle('ملف المستثمر: ' . $investor->name, 1);
        $section->addText('الاسم: ' . $investor->name);
        $section->addText('رقم الهوية: ' . $investor->id_number);
        $section->addText('الجوال: ' . $investor->phone);
        $section->addTitle('الملخص المالي', 2);
        $section->addText('إجمالي الاستثمار: ' . number_format($investor->total_investment_ils, 2) . ' ILS');
        $section->addText('إجمالي المصروف له: ' . number_format($investor->total_paid_out, 2) . ' ILS');
        $section->addText('الرصيد المتبقي له: ' . number_format($investor->remaining_balance, 2) . ' ILS');
        $section->addTitle('كشف الحساب', 2);
        $table = $section->addTable(['borderColor' => '000000', 'borderSize' => 6]);
        $table->addRow();
        $table->addCell(2000)->addText('التاريخ');
        $table->addCell(2000)->addText('النوع');
        $table->addCell(2000)->addText('المبلغ (ILS)');

        foreach ($investor->payments as $payment) {
            $table->addRow();
            $table->addCell()->addText($payment->payment_date->format('Y-m-d'));
            $table->addCell()->addText($payment->type == 'out' ? 'صرف له' : 'قبض منه');
            $table->addCell()->addText(number_format($payment->amount_ils, 2));
        }

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = 'investor_' . $investor->id . '.docx';
        $objWriter->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
