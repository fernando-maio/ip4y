<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Classes\PHPExcel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectsExport implements FromCollection
{
    public function collection()
    {
        return Project::all();
    }
}
