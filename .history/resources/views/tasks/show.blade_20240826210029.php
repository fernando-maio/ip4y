@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $task->name }}</h1>
        <p>{{ $project->description }}</p>

        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>

        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection