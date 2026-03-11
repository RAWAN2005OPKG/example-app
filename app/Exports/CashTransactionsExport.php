<?php
namespace App\Exports;

use App\Models\CashTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CashTransactionsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return CashTransaction::latest('transaction_date')->get();
    }

    public function headings(): array
    {
        return ["التاريخ", "النوع", "المصدر", "المبلغ الأصلي", "العملة", "سعر الصرف", "القيمة (شيكل)", "التفاصيل"];
    }

    public function map($transaction): array
    {
        return [
            $transaction->transaction_date->format('Y-m-d'),
            $transaction->type == 'in' ? 'إيداع' : 'سحب',
            $transaction->source,
            $transaction->amount,
            $transaction->currency,
            $transaction->exchange_rate,
            $transaction->amount_ils,
            $transaction->details,
        ];
    }
}
