<?php

namespace App\Exports;

use App\Models\Project;
use FromCollec

class ProjectsExport implements FromCollection
{
    public function collection()
    {
        return Project::all();
    }
}
