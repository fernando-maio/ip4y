<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function create(array $data)
    {
        return $this->project->create($data);
    }

    public function update(int $id, array $data)
    {
        $project = $this->project->find($id);
        if ($project) {
            $project->update($data);
            return $project;
        }
        return null;
    }

    public function delete(int $id)
    {
        $project = $this->project->find($id);
        if ($project) {
            $project->delete();
            return true;
        }
        return false;
    }

    public function find(int $id)
    {
        return $this->project->find($id);
    }

    public function all()
    {
        return $this->project->all();
    }
}
