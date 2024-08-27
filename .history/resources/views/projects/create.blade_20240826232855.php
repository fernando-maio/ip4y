<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>
