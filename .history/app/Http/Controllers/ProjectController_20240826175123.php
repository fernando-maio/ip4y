<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Interfaces\ProjectServiceInterface;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $this->projectService->createProject($request->validated());
        return redirect()->route('projects.index')->with('success', 'Projeto criado com sucesso!');
    }

    public function show($id)
    {
        $project = $this->projectService->getProjectById($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = $this->projectService->getProjectById($id);
        return view('projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $this->projectService->updateProject($id, $request->validated());
        return redirect()->route('projects.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->projectService->deleteProject($id);
        return redirect()->route('projects.index')->with('success', 'Projeto deletado com sucesso!');
    }

    public function downloadPDF()
{
    return $this->projectService->generateProjectReportPDF();
}

}

