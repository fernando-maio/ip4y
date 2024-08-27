<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\

class ProjectsExport implements FromCollection
{
    public function collection()
    {
        return Project::all();
    }
}
