<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * List all tasks
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('tasks.index', [
            'tasks' => Task::latest()->paginate(20)
        ]);
    }

    /**
     * List single task
     * @param \App\Models\Task $task
     * @return \Illuminate\View\View
     */
    public function show(Task $task): View
    {
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    /**
     * Create a task
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('tasks.create');
    }

    /**
     * Store a task
     * @param \App\Http\Requests\TaskRequest $request
     * @return \Illuminate\View\View
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        Task::create($request->validated());

        return redirect()->route('index')->with('message', 'Task was successfully added!');
    }

    /**
     * Edit a task
     * @param \App\Models\Task $task
     * @return \Illuminate\View\View
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update a task
     * @param \App\Http\Requests\TaskRequest $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('tasks.show', [
            'task' => $task->id
        ])->with('message', 'Task was sucessfully updated!');
    }

    /**
     * Delete a task
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('index')->with('message', 'Task was successfully deleted!');
    }

    /**
     * Toggle task status
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggle(Task $task): RedirectResponse
    {
        $task->toggle();

        return redirect()->back()->with('message', 'Task status was successfully updated!');
    }
}
