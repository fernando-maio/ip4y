<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user::all();
    }
}
