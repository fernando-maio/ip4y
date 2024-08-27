<?php

namespace App\Interfaces;

interface UserServiceInterface
{
    public function createTask(array $data);
    public function updateTask(int $id, array $data);
    public function deleteTask(int $id);
    public function getTaskById(int $id);
    public function getAllTasks();
    public function getAllProjects();
    public function getAllUsers();
}
