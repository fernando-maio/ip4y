<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskServiceInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create', [
            'projects' => $this->taskService->getAllProjects(),
            'users' => $this->taskService->getAllUsers(),
        ]);
    }

    public function store(TaskRequest $request)
    {
        $this->taskService->createTask($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function show($id)
    {
        $task = $this->taskService->getTaskById($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = $this->taskService->getTaskById($id);
        return view('tasks.edit', [
            'task' => $task,
            'projects' => $this->taskService->getAllProjects(),
            'users' => $this->taskService->getAllUsers(),
        ]);
    }

    public function update(TaskRequest $request, $id)
    {
        $this->taskService->updateTask($id, $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso!');
    }
}
