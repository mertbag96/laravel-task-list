@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mb-8">
        <a href="{{ route('tasks.index') }}" class="link">
            ← Go back to tasks
        </a>
    </div>

    <p class="mb-4 text-white">
        {{ $task->description }}
    </p>

    @if ($task->long_description)
        <p class="mb-4 text-white">
            {{ $task->long_description }}
        </p>
    @endif

    <p class="mb-8 text-sm text-slate-400">
        Created {{ $task->created_at->diffForHumans() }} • Updated
        {{ $task->updated_at->diffForHumans() }}
    </p>

    <p class="flex mb-8">
        @if ($task->completed)
            <span class="bg-white w-full py-3 font-bold text-center text-green-600">
                Completed
            </span>
        @else
            <span class="bg-white w-full py-3 font-bold text-center text-red-600">
                Not completed
            </span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-edit">
            Edit
        </a>

        <form method="POST" action="{{ route('tasks.toggle', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" @class(['btn', $task->completed ? 'btn-red' : 'btn-green'])>
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">
                Delete
            </button>
        </form>
    </div>

@endsection
