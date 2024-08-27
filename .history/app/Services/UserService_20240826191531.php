<?php

namespace App\Services;

use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UserServiceInterface;
use App\Models\User;
use App\Notifications\TaskAssigned;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
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

    public function getAllProjects()
    {
        return $this->projectRepository->all();
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }
}
