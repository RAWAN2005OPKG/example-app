<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $clientId;

    // [الجديد] استقبال ID العميل
    public function __construct($clientId = null)
    {
        $this->clientId = $clientId;
    }

    public function collection()
    {
        // [الجديد] إذا كان هناك ID، جلب هذا العميل فقط
        if ($this->clientId) {
            return Client::with(['contracts.projectUnit'])->where('id', $this->clientId)->get();
        }

        // السلوك القديم: جلب كل العملاء
        return Client::with(['contracts.projectUnit'])->get();
    }

    // ... (بقية الملف لا يتغير)
    public function headings(): array
    {
        return [
            'ID', 'الاسم', 'رقم الهوية', 'الجوال', 'الوحدات المشتراة',
            'إجمالي المستحق (ILS)', 'إجمالي المدفوع (ILS)', 'الرصيد المتبقي (ILS)',
        ];
    }

    public function map($client): array
    {
        $units = $client->contracts->map(fn($c) => $c->projectUnit->unit_number ?? 'N/A')->implode(', ');
        return [
            $client->unique_id, $client->name, $client->id_number, $client->phone, $units,
            $client->total_due_ils, $client->total_paid_ils, $client->remaining_balance,
        ];
    }
}
