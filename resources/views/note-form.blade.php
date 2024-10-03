<!-- resources/views/note-form.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($note) ? 'Edit Note' : 'Add New Note' }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ isset($note) ? route('notes.update', $note->id) : route('notes.store') }}">
                        @csrf
                        @if (isset($note))
                            @method('PUT')
                        @endif

                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ isset($note) ? $note->title : old('title') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ isset($note) ? $note->description : old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ isset($note) ? 'Update Note' : 'Create Note' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
