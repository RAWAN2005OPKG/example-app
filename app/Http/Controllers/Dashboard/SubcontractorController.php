<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Project;
use App\Models\Subcontractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SubcontractorController extends Controller
{
    public function index(Request $request)
    {
        $query = Subcontractor::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%")
                  ->orWhere('unique_id', 'like', "%{$request->search}%")
                  ->orWhere('specialization', 'like', "%{$request->search}%");
        }
        $subcontractors = $query->withCount('contracts')->latest()->paginate(15);
        return view('dashboard.subcontractors.index', compact('subcontractors'));
    }

    public function create()
    {
        $projects = Project::select('id', 'name')->get();
        return view('dashboard.subcontractors.create', compact('projects'));
    }

public function store(Request $request)
{

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'specialization' => 'required|string|max:255',
        'id_number' => 'nullable|string|max:20|unique:subcontractors,id_number',
        'phone' => 'nullable|string|max:20',
        'notes' => 'nullable|string',

        // التأكد من أن اسم المصفوفة هو 'contracts' كما في النموذج
        'contracts' => 'nullable|array',

        // التأكد من أن كل الحقول داخل المصفوفة تستخدم 'contracts.*'
        'contracts.*.project_id' => 'required|exists:projects,id',
        'contracts.*.contract_date' => 'required|date',
        'contracts.*.contract_value' => 'required|numeric|min:0',
        'contracts.*.currency' => 'required|string|size:3',
        'contracts.*.exchange_rate' => 'required|numeric',
        'contracts.*.contract_details' => 'nullable|string',
    ]);

    try {
        DB::transaction(function () use ($validatedData) {
            // 1. إنشاء المقاول
            $subcontractor = Subcontractor::create($validatedData);

            // 2. ربط العقود (هذا الجزء كان صحيحاً)
            if (!empty($validatedData['contracts'])) {
                foreach ($validatedData['contracts'] as $contractData) {
                    $pivotData = [
                        'contract_date'    => $contractData['contract_date'],
                        'contract_value'   => $contractData['contract_value'],
                        'currency'         => $contractData['currency'],
                        'exchange_rate'    => $contractData['exchange_rate'],
                        'contract_details' => $contractData['contract_details'] ?? null,
                    ];
                    $subcontractor->contracts()->attach($contractData['project_id'], $pivotData);
                }
            }
        });

        return redirect()->route('dashboard.subcontractors.index')->with('success', 'تم حفظ المقاول وعقوداته بنجاح.');

    } catch (\Exception $e) {
        return back()->withInput()->with('error', 'فشل حفظ البيانات. خطأ تقني: ' . $e->getMessage());
    }
}


    public function show(Subcontractor $subcontractor)
    {
        $subcontractor->load('contracts.project', 'payments');
        return view('dashboard.subcontractors.show', compact('subcontractor'));
    }

    public function edit(Subcontractor $subcontractor)
    {
        $projects = Project::select('id', 'name')->get();
        $subcontractor->load('contracts');
        return view('dashboard.subcontractors.edit', compact('subcontractor', 'projects'));
    }

    public function update(Request $request, Subcontractor $subcontractor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'id_number' => ['nullable', 'string', 'max:255', Rule::unique('subcontractors')->ignore($subcontractor->id)],
            'phone' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);
        $subcontractor->update($validated);
        return redirect()->route('dashboard.subcontractors.show', $subcontractor->id)->with('success', 'تم تحديث بيانات المورد بنجاح.');
    }

    public function destroy(Subcontractor $subcontractor)
    {
        $subcontractor->delete();
        return redirect()->route('dashboard.subcontractors.index')->with('success', 'تم نقل المورد إلى سلة المحذوفات.');
    }

    public function trash()
    {
        $trashedSubcontractors = Subcontractor::onlyTrashed()->latest()->paginate(15);
        return view('dashboard.subcontractors.trash', compact('trashedSubcontractors'));
    }

    public function restore($id)
    {
        $subcontractor = Subcontractor::onlyTrashed()->findOrFail($id);
        $subcontractor->restore();
        return redirect()->route('dashboard.subcontractors.trash')->with('success', 'تم استعادة المورد بنجاح.');
    }

    public function forceDelete($id)
    {
        $subcontractor = Subcontractor::onlyTrashed()->findOrFail($id);
        $subcontractor->forceDelete();
        return redirect()->route('dashboard.subcontractors.trash')->with('success', 'تم حذف المورد نهائياً.');
    }
}
