<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Concern

class ProjectsExport implements FromCollection
{
    public function collection()
    {
        return Project::all();
    }
}
