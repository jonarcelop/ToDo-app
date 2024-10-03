<!-- resources/views/notes.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>My Notes</h1>
                <a href="{{ route('notes.create') }}" class="btn btn-primary">Add New Note</a>
            </div>

            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Creation Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                        <tr>
                            <td>{{ $note->title }}</td>
                            <td>{{ $note->description }}</td>
                            <td>{{ $note->created_at }}</td>
                            <td>
                                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
