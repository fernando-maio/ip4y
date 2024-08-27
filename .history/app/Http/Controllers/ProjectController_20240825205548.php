<?php

namespace App\Http\Controllers;

use App\Interfaces\ProjectServiceInterface;

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
