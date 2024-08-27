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

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }
}
