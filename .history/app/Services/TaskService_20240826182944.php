<?php

namespace App\Services;

use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\TaskServiceInterface;
use App\Models\User;
use App\Notifications\TaskAssigned;
use App\Repositories\ProjectRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    protected $taskRepository;
    protected $projectRepository;
        protected $userRepository;

    public function __construct(TaskRepositoryInterface $taskRepository, ProjectRepositoryInterface $projectRepository, UserRepositoryInterface $userRepository)
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
        return $this->taskRepository->update($id, $data);
    }

    public function deleteTask(int $id)
    {
        return $this->taskRepository->delete($id);
    }

    public function getTaskById(int $id)
    {
        return $this->taskRepository->find($id);
    }

    public function getAllTasks()
    {
        return $this->taskRepository->all();
    }
}
