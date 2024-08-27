<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectsExport implements App\Exports\FromCollection
{
    public function collection()
    {
        return Project::all();
    }
}
