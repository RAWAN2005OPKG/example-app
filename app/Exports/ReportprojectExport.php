<?php
// app/Exports/ProjectsExport.php
namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Project::all(['name', 'project_title', 'owner_name', 'project_status', 'total_budget', 'currency']);
    }

    public function headings(): array
    {
        return [
            'اسم المشروع',
            'عنوان المشروع',
            'اسم المالك',
            'حالة المشروع',
            'الميزانية الإجمالية',
            'العملة',
        ];
    }
}
