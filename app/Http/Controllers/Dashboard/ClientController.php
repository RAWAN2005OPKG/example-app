<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contract;
use App\Models\ProjectUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Throwable;

class ClientController extends Controller
{
    // --- دوال العرض والقراءة (Read) ---

    public function index(Request $request)
    {
        $query = Client::with('contracts');
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(fn($q) => $q->where('name', 'like', "%{$search}%")->orWhere('unique_id', 'like', "%{$search}%"));
        }
        $clients = $query->latest()->paginate(10);
        return view('dashboard.clients.index', compact('clients'));
    }

    public function show(Client $client)
    {
        $client->load(['contracts.projectUnit.project', 'payments' => fn($q) => $q->latest()]);
        return view('dashboard.clients.show', compact('client'));
    }

    // --- دوال الإنشاء (Create) ---

    public function create()
    {
        $availableUnits = ProjectUnit::where('status', 'available')->with('project:id,name')->get(['id', 'project_id', 'unit_number', 'floor', 'has_parking', 'finish_type']);
        return view('dashboard.clients.create', compact('availableUnits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'nullable|string|max:20|unique:clients,id_number',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'contracts' => 'required|array|min:1',
            'contracts.*.unit_id' => 'required|exists:project_units,id',
            'contracts.*.sale_date' => 'required|date',
            'contracts.*.total_amount' => 'required|numeric|min:0',
            'contracts.*.currency' => 'required|in:USD,JOD,ILS',
            'contracts.*.exchange_rate' => 'required|numeric|min:0',
            'contracts.*.total_amount_ils' => 'required|numeric|min:0',
            'contracts.*.down_payment' => 'nullable|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();
            
            // إنشاء العميل ببياناته فقط
            $clientData = $request->only(['name', 'id_number', 'phone', 'address', 'notes']);
            $client = Client::create($clientData);

            foreach ($validated['contracts'] as $contractData) {
                $unit = ProjectUnit::find($contractData['unit_id']);
                
                $contract = new Contract();
                $contract->unique_id = 'CON-' . time() . '-' . rand(100, 999);
                $contract->contractable_id = $client->id;
                $contract->contractable_type = Client::class;
                $contract->project_id = $unit->project_id;
                $contract->project_unit_id = $unit->id;
                $contract->contract_date = $contractData['sale_date'];
                $contract->contract_value = $contractData['total_amount'];
                $contract->currency = $contractData['currency'];
                $contract->exchange_rate = $contractData['exchange_rate'];
                $contract->total_amount_ils = $contractData['total_amount_ils'];
                $contract->status = 'active';
                $contract->save();

                $unit->update(['status' => 'sold']);

                if (!empty($contractData['down_payment']) && $contractData['down_payment'] > 0) {
                    $client->payments()->create([
                        'contract_id' => $contract->id, 'type' => 'in', 'method' => 'cash',
                        'payment_date' => $contractData['sale_date'], 'amount' => $contractData['down_payment'],
                        'currency' => $contractData['currency'], 'exchange_rate' => $contractData['exchange_rate'],
                        'amount_ils' => $contractData['down_payment'] * $contractData['exchange_rate'],
                        'notes' => 'دفعة مقدمة عند توقيع العقد',
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('dashboard.clients.show', $client->id)->with('success', 'تم إنشاء العميل وعقوده بنجاح.');
        } catch (Throwable $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'فشل حفظ البيانات. خطأ تقني: ' . $e->getMessage());
        }
    }

    // --- دوال التعديل (Update) ---

    public function edit(Client $client)
    {
        $client->load('contracts');
        $availableUnits = ProjectUnit::where('status', 'available')->orWhereIn('id', $client->contracts->pluck('project_unit_id'))->with('project:id,name')->get(['id', 'project_id', 'unit_number', 'floor', 'has_parking', 'finish_type']);
        return view('dashboard.clients.edit', compact('client', 'availableUnits'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'nullable|string|max:20|unique:clients,id_number,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'contracts' => 'nullable|array',
            'contracts.*.id' => 'nullable|exists:contracts,id',
            'contracts.*.unit_id' => 'required|exists:project_units,id',
            'contracts.*.sale_date' => 'required|date',
            'contracts.*.total_amount' => 'required|numeric|min:0', // اسم الحقل من النموذج
            'contracts.*.currency' => 'required|in:USD,JOD,ILS',
            'contracts.*.exchange_rate' => 'required|numeric|min:0',
            'contracts.*.total_amount_ils' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();
            
            $clientData = $request->only(['name', 'id_number', 'phone', 'address', 'notes']);
            $client->update($clientData);

            $existingContractIds = [];
            if (!empty($validated['contracts'])) {
                foreach ($validated['contracts'] as $contractData) {
                    $unit = ProjectUnit::find($contractData['unit_id']);
                    
                    $contract = Contract::updateOrCreate(
                        ['id' => $contractData['id'] ?? null],
                        [
                            'unique_id' => $contractData['id'] ? Contract::find($contractData['id'])->unique_id : ('CON-' . time() . '-' . rand(100, 999)),
                            'contractable_id' => $client->id,
                            'contractable_type' => Client::class,
                            'project_id' => $unit->project_id,
                            'project_unit_id' => $unit->id,
                            'contract_date' => $contractData['sale_date'],
                            'contract_value' => $contractData['total_amount'],
                            'currency' => $contractData['currency'],
                            'exchange_rate' => $contractData['exchange_rate'],
                            'total_amount_ils' => $contractData['total_amount_ils'],
                        ]
                    );
                    
                    $unit->update(['status' => 'sold']);
                    $existingContractIds[] = $contract->id;
                }
            }

            $client->contracts()->whereNotIn('id', $existingContractIds)->delete();

            DB::commit();
            return redirect()->route('dashboard.clients.show', $client->id)->with('success', 'تم تحديث بيانات العميل بنجاح.');
        } catch (Throwable $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'فشل تحديث البيانات. خطأ تقني: ' . $e->getMessage());
        }
    }

    // --- دوال الحذف وسلة المهملات ---

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('dashboard.clients.index')->with('success', 'تم نقل العميل إلى سلة المحذوفات.');
    }

    public function trash()
    {
        $trashedClients = Client::onlyTrashed()->latest()->paginate(10);
        return view('dashboard.clients.trash', compact('trashedClients'));
    }

    public function restore($id)
    {
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->restore();
        return redirect()->route('dashboard.clients.trash')->with('success', 'تم استعادة العميل بنجاح.');
    }

    public function forceDelete($id)
    {
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->forceDelete();
        return redirect()->route('dashboard.clients.trash')->with('success', 'تم حذف العميل نهائياً.');
    }

    // --- دوال التصدير والطباعة ---

    public function exportExcel(Request $request)
    {
        if ($request->has('client_id')) {
            return Excel::download(new ClientsExport($request->client_id), 'client_' . $request->client_id . '.xlsx');
        }
        return Excel::download(new ClientsExport(), 'clients.xlsx');
    }

    public function exportWord(Client $client)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addTitle('ملف العميل: ' . $client->name, 1);
        $section->addText('ID: ' . $client->unique_id);
        $section->addText('الهوية: ' . $client->id_number);
        $section->addText('الجوال: ' . $client->phone);
        $section->addTitle('الملخص المالي', 2);
        $section->addText('إجمالي المستحق: ' . number_format($client->total_due_ils, 2) . ' ILS');
        $section->addText('إجمالي المدفوع: ' . number_format($client->total_paid_ils, 2) . ' ILS');
        $section->addText('الرصيد المتبقي: ' . number_format($client->remaining_balance, 2) . ' ILS');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = 'client_' . $client->id . '.docx';
        $objWriter->save($fileName);
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
