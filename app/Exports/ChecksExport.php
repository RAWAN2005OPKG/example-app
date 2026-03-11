<?php

namespace App\Exports;

use App\Models\Check;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ChecksExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Check::with(['project', 'depositAccount', 'paymentAccount'])->get();
    }

    /**
     * العناوين في ملف الإكسل
     */
    public function headings(): array
    {
        return [
            'رقم الشيك',
            'البنك',
            'تاريخ التحرير',
            'تاريخ الاستحقاق',
            'النوع',
            'الطرف الثاني',
            'المبلغ',
            'العملة',
            'سعر الصرف',
            'القيمة بالشيكل',
            'المشروع',
            'ملاحظات'
        ];
    }

    /**
     * ربط البيانات بالأعمدة
     */
    public function map($check): array
    {
        return [
            $check->check_number,
            $check->bank_name,
            $check->issue_date,
            $check->due_date,
            $check->type == 'receivable' ? 'وارد (قبض)' : 'صادر (دفع)',
            $check->party_name,
            $check->amount,
            $check->currency,
            $check->exchange_rate,
            $check->amount_ils,
            $check->project ? $check->project->name : '-',
            $check->notes,
        ];
    }
}
