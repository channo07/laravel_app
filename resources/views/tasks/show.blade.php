@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Task Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description ?: 'No description provided.' }}</p>
            <p class="card-text">
                <strong>Status:</strong> {{ $task->is_completed ? 'Completed' : 'Pending' }}
            </p>
            <p class="card-text">
                <strong>Created:</strong> {{ $task->created_at->format('Y-m-d H:i:s') }}
            </p>
            <p class="card-text">
                <strong>Last Updated:</strong> {{ $task->updated_at->format('Y-m-d H:i:s') }}
            </p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection 