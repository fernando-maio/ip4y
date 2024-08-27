<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $project = $this->model->find($id);
        if ($project) {
            $project->update($data);
            return $project;
        }
        return null;
    }

    public function delete(int $id)
    {
        $project = $this->model->find($id);
        if ($project) {
            $project->delete();
            return true;
        }
        return false;
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }
}
