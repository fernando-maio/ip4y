<?php

namespace App\Services;

class ProjectService implements ProjectServiceInterface
{
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function createProject(array $data)
    {
        // lógica de criação de projeto
    }

    // demais métodos
}
