<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $task;

    public function __construct(User $task)
    {
        $this->task = $task;
    }

    public function all()
    {
        return User::all();
    }
}
