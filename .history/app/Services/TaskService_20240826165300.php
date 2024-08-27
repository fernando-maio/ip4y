<?php

namespace App\Services;

use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\TaskServiceInterface;

class TaskService implements TaskServiceInterface
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createProject(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function updateProject(int $id, array $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function deleteProject(int $id)
    {
        return $this->taskRepository->delete($id);
    }

    public function getProjectById(int $id)
    {
        return $this->taskRepository->find($id);
    }

    public function getAllProjects()
    {
        return $this->taskRepository->all();
    }
}

