<?php

namespace App\Interfaces;

interface TaskServiceInterface
{
    public function createTask(array $data);
    public function updateProject(int $id, array $data);
    public function deleteProject(int $id);
    public function getProjectById(int $id);
    public function getAllProjects();
}
