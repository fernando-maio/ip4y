<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function create(array $data)
    {
        return $this->task->create($data);
    }

    public function update(int $id, array $data)
    {
        $task = $this->task->find($id);
        if ($task) {
            $task->update($data);
            return $task;
        }
        return null;
    }

    public function delete(int $id)
    {
        $task = $this->task->find($id);
        if ($task) {
            $task->delete();
            return true;
        }
        return false;
    }

    public function find(int $id)
    {
        return $this->task->find($id);
    }

    public function all()
    {
        return $this->task->all();
    }
}
