@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')

    <nav class="mb-8">
        <a href="{{ route('tasks.create') }}" class="link">
            Add Task
        </a>
    </nav>

    @forelse ($tasks as $task)
        <div class="mb-4">
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed, 'task'])>
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-12">
            {{ $tasks->links() }}
        </nav>
    @endif

@endsection
