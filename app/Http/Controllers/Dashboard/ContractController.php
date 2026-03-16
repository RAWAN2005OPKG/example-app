<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Project;
use App\Models\Client;
use App\Models\Investor;
use App\Models\Subcontractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ContractController extends Controller
{
    /**
     * عرض قائمة بكل العقود مع منطق البحث.
     */
    public function index(Request $request)
    {
        $query = Contract::with(['contractable', 'project'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('unique_id', 'like', "%{$search}%")
                ->orWhereHas('project', fn($p) => $p->where('name', 'like', "%{$search}%"))
                ->orWhereHasMorph('contractable', [Client::class, Investor::class, Subcontractor::class],
                    fn($sub) => $sub->where('name', 'like', "%{$search}%")
                );
            });
        }

        $contracts = $query->paginate(15);
        return view('dashboard.contracts.index', compact('contracts', 'request'));
    }

    /**
     * عرض نموذج إنشاء عقد جديد.
     */
    public function create()
    {
        $projects = Project::select('id', 'name')->get();
        return view('dashboard.contracts.create', compact('projects'));
    }

    /**
     * تخزين عقد جديد.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'contractable_type' => 'required|string|in:Client,Investor,Subcontractor',
            'contractable_id' => 'required|integer',
            'project_id' => 'nullable|exists:projects,id',
            'contract_date' => 'required|date',
            'contract_value' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'contract_details' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
        ]);

        try {
            $modelClass = 'App\\Models\\' . $validated['contractable_type'];
            $contractable = $modelClass::findOrFail($validated['contractable_id']);

            $attachmentPath = $request->hasFile('attachment') ? $request->file('attachment')->store('contracts', 'public') : null;

            $contractable->contracts()->create([
                'unique_id' => 'CON-' . time(),
                'project_id' => $validated['project_id'],
                'contract_date' => $validated['contract_date'],
                'contract_details' => $validated['contract_details'],
                'contract_value' => $validated['contract_value'],
                'currency' => $validated['currency'],
                'exchange_rate' => $validated['exchange_rate'],
                'total_amount_ils' => $validated['contract_value'] * $validated['exchange_rate'],
                'attachment' => $attachmentPath,
            ]);

            return redirect()->route('dashboard.contracts.index')->with('success', 'تم حفظ العقد بنجاح.');

        } catch (Throwable $e) {
            return back()->withInput()->with('error', 'فشل حفظ العقد: ' . $e->getMessage());
        }
    }

    /**
     * دالة AJAX لجلب الكيانات للبحث.
     */
    public function getContractables(Request $request)
    {
        $request->validate(['type' => 'required|string']);
        $modelName = 'App\\Models\\' . $request->type;
        if (!class_exists($modelName)) { return response()->json(['items' => []]); }
        $query = $modelName::query();
        if ($search = $request->query('q')) { $query->where('name', 'LIKE', "%{$search}%")->orWhere('unique_id', 'LIKE', "%{$search}%"); }
        if ($id = $request->query('id')) { $query->where('id', $id); }
        $items = $query->select('id', 'name', 'unique_id')->take(10)->get()->map(fn($item) => ['id' => $item->id, 'text' => "{$item->name} ({$item->unique_id})"]);
        return response()->json(['items' => $items]);
    }
    public function show(Contract $contract)
    {
        $contract->load(['contractable', 'project']);
        return view('dashboard.contracts.show', compact('contract'));
    }

    /**
     * عرض نموذج تعديل عقد.
     */
     public function edit(Contract $contract)
    {
        $projects = Project::select('id', 'name')->get();
        $contract->load('contractable');

        $selectedContractable = null;
        if ($contract->contractable) {
            $selectedContractable = [
                'id' => $contract->contractable->id,
                'text' => $contract->contractable->name . ' (' . $contract->contractable->unique_id . ')'
            ];
        }

        return view('dashboard.contracts.edit', compact('contract', 'projects', 'selectedContractable'));
    }
     public function update(Request $request, Contract $contract)
    {
        $validated = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'contract_date' => 'required|date',
            'contract_value' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'exchange_rate' => 'required|numeric|min:0',
            'contract_details' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
        ]);

        try {
            $dataToUpdate = $validated;
            $dataToUpdate['total_amount_ils'] = $validated['contract_value'] * $validated['exchange_rate'];

            if ($request->hasFile('attachment')) {
                if ($contract->attachment) {
                    Storage::disk('public')->delete($contract->attachment);
                }
                $dataToUpdate['attachment'] = $request->file('attachment')->store('contracts', 'public');
            }

            $contract->update($dataToUpdate);
            return redirect()->route('dashboard.contracts.index')->with('success', 'تم تحديث العقد بنجاح.');
        } catch (Throwable $e) {
            return back()->withInput()->with('error', 'فشل تحديث العقد: ' . $e->getMessage());
        }
    }

    /**
     * نقل عقد إلى سلة المهملات.
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('dashboard.contracts.index')->with('success', 'تم نقل العقد إلى سلة المهملات.');
    }

    /**
     * عرض سلة المهملات.
     */
    public function trash()
    {
        $trashedContracts = Contract::onlyTrashed()->with('contractable')->latest('deleted_at')->paginate(10);
        return view('dashboard.contracts.trash', compact('trashedContracts'));
    }

    /**
     * استعادة عقد من سلة المهملات.
     */
    public function restore($id)
    {
        $contract = Contract::onlyTrashed()->findOrFail($id);
        $contract->restore();
        return redirect()->route('dashboard.contracts.trash')->with('success', 'تم استعادة العقد بنجاح.');
    }

    /**
     * حذف عقد بشكل نهائي.
     */
    public function forceDelete($id)
    {
        $contract = Contract::onlyTrashed()->findOrFail($id);
        if ($contract->attachment) {
            Storage::disk('public')->delete($contract->attachment);
        }
        $contract->forceDelete();
        return redirect()->route('dashboard.contracts.trash')->with('success', 'تم حذف العقد نهائياً.');
    }
}
