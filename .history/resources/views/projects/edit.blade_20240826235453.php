<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <form action="{{ route('projects.update', $project->id) }}" method="PUT">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="name" class="form-control" id="title" value="{{ $project->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" required>{{ $project->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Data de Conclusão</label>
            <input type="date" name="due_date" class="form-control" value="{{ $project->due_date }}" required />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-app-layout>