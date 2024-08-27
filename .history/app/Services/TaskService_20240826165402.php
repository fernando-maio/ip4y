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
}
