<?php

namespace App\Http\Controllers;

use App\Interfaces\ProjectServiceInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        // código para listar projetos
    }
}
