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

    public function updateTask(int $id, array $data)
    {
        return $this->TaskRepository->update($id, $data);
    }

    public function deleteTask(int $id)
    {
        return $this->TaskRepository->delete($id);
    }

    public function getTaskById(int $id)
    {
        return $this->TaskRepository->find($id);
    }

    public function getAllTasks()
    {
        return $this->TaskRepository->all();
    }
}
