<?php

namespace App\Exports;

use App\Models\Project;
use FromCol

class ProjectsExport implements FromCollection
{
    public function collection()
    {
        return Project::all();
    }
}
