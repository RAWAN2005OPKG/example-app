<?php

namespace App\Exports;

use App\Models\Khaled;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KhaledsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Khaled::with(['project', 'client', 'investor'])->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'تاريخ السند',
            'النوع',
            'البيان',
            'المبلغ',
            'العملة',
            'سعر الصرف',
            'القيمة بالشيكل',
            'المشروع',
            'العميل',
            'المستثمر',
            'طريقة الدفع',
            'ملاحظات',
        ];
    }

    public function map($khaled): array
    {
        return [
            $khaled->id,
            $khaled->voucher_date->format('Y-m-d'),
            $khaled->type == 'receipt' ? 'قبض' : 'صرف',
            $khaled->description,
            $khaled->amount,
            $khaled->currency,
            $khaled->exchange_rate,
            $khaled->amount_ils,
            $khaled->project->name ?? '',
            $khaled->client->name ?? '',
            $khaled->investor->name ?? '',
            $khaled->payment_method,
            $khaled->notes,
        ];
    }
}
