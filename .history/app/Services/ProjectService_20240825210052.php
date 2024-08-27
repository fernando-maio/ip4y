<?php

namespace App\Services;

use App\Interfaces\ProjectServiceInterface;
use App\Repositories\ProjectRepository;

class ProjectService implements ProjectServiceInterface
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function createProject(array $data)
    {
        // lógica de criação de projeto
    }

    // demais métodos
}
