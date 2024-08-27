<?php

namespace App\Services;

use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\TaskServiceInterface;
use App\Models\User;
use App\Notifications\TaskAssigned;

class TaskService implements TaskServiceInterface
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask(array $data)
    {
        $task = $this->taskRepository->create($data);
        $user = User::find($data['user_id']);
        $user->notify(new TaskAssigned($task));
        return $task;
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
