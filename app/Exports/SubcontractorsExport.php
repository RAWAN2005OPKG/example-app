<?php
namespace App\Exports;

use App\Models\Subcontractor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubcontractorsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Subcontractor::withCount('contracts')->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'الاسم',
            'نوع الخدمة',
            'الهاتف',
            'مسؤول التواصل',
            'عدد العقود',
            'تاريخ الإنشاء',
        ];
    }

    public function map($subcontractor): array
    {
        return [
            $subcontractor->id,
            $subcontractor->name,
            $subcontractor->service_type,
            $subcontractor->phone,
            $subcontractor->contact_person,
            $subcontractor->contracts_count,
            $subcontractor->created_at->format('Y-m-d'),
        ];
    }
}
