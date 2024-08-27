<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

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
                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="pending">Pendente</option>
                <option value="in_progress">Em progresso</option>
                <option value="completed">Concluída</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Data de Conclusão</label>
            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" />
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
</x-app-layout>