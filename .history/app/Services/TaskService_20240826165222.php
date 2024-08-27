<?php

namespace App\Services;

use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\TaskServiceInterface;

class TaskService implements TaskServiceInterface
{
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function createProject(array $data)
    {
        return $this->projectRepository->create($data);
    }

    public function updateProject(int $id, array $data)
    {
        return $this->projectRepository->update($id, $data);
    }

    public function deleteProject(int $id)
    {
        return $this->projectRepository->delete($id);
    }

    public function getProjectById(int $id)
    {
        return $this->projectRepository->find($id);
    }

    public function getAllProjects()
    {
        return $this->projectRepository->all();
    }
}

