@extends('layouts.app')

@section('content')
    <h1>Projetos</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Criar Projeto</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Data de Entrega</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->due_date }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
