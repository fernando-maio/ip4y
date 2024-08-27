<?php

namespace App\Services;

use App\Interfaces\ProjectRepositoryInterface as InterfacesProjectRepositoryInterface;
use App\Interfaces\ProjectServiceInterface;
use App\Repositories\ProjectRepositoryInterface;

class ProjectService implements ProjectServiceInterface
{
    protected $projectRepository;

    public function __construct(InterfacesProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function createProject(array $data)
    {
        // lógica de criação de projeto
    }

    // demais métodos
}
