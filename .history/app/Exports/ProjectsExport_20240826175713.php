<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\PHP_E
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectsExport implements FromCollection
{
    public function collection()
    {
        return Project::all();
    }
}
