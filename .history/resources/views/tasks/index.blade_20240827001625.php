<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
        <p><a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Project</a></p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

        @if($tasks->isEmpty())
            <p>No tasks found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Project</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->project->name }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
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
@endsection
