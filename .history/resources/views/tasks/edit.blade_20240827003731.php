@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="project_id">Project</label>
            <select class="form-control" id="project_id" name="project_id">
                @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Assign to</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
