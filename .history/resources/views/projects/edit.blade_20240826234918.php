<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->title }}
        </h2>
    </x-slot>

@section('content')
    <div class="container">
        <h1>Edit Project</h1>

        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $project->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{ $project->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
