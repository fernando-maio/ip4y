<?php

namespace App\Interfaces;

interface ProjectServiceInterface
{
    public function createProject(array $data);
    public function updateProject(int $id, array $data);
    public function deleteProject(int $id);
    public function getProjectById(int $id);
    public function getAllProjects();
    public function generateProjectReportPDF();
}
