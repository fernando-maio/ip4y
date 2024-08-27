<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="project_id" class="form-label">Status</label>
                    <select name="project_id" class="form-control" id="project_id" required>
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Assign To</label>
                    <select name="user_id" class="form-control" id="user_id" required>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>