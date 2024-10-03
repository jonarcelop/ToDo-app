@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Dashboard</h2>
    <p>Bienvenido, {{ Auth::user()->name }}</p>

    <div class="row">
        <div class="col-md-12">
            <h3>Tus Notas</h3>
            <a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">Crear nueva nota</a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($notes->isEmpty())
                <p>No tienes notas aún.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                            <tr>
                                <td>{{ $note->title }}</td>
                                <td>{{ $note->description }}</td>
                                <td>{{ $note->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
