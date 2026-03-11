<?php

namespace App\Exports;

use App\Models\Investor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvestorsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // جلب المستثمرين مع علاقاتهم
        return Investor::with('projects')->get();
    }

    public function headings(): array
    {
        // عناوين الأعمدة في ملف Excel
        return [
            'ID',
            'الاسم',
            'رقم الهوية',
            'الجوال',
            'إجمالي الاستثمار (ILS)',
            'المصروف له (ILS)',
            'الرصيد (ILS)',
        ];
    }

    public function map($investor): array
    {
        // تحديد البيانات التي ستوضع في كل صف
        return [
            $investor->unique_id,
            $investor->name,
            $investor->id_number,
            $investor->phone,
            $investor->total_investment_ils,
            $investor->total_paid_out,
            $investor->remaining_balance,
        ];
    }
}
