@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{ $task->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="project_id" class="form-label">Project</label>
                <select name="project_id" class="form-control" id="project_id" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div
