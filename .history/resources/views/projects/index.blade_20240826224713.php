<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if($projects->isEmpty())
            <p>No projects found.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</x-app-layout>