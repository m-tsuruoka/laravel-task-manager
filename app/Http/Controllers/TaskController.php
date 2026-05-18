<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
  $tasks = Task::where('user_id', auth()->id())
   ->latest()
   ->get();
   return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => ['required', 'max:255'],
        'description' => ['nullable'],
        'status' => ['required', 'in:0,1,2'],
    ]);

    Task::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'status' => $validated['status'],
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('tasks.index');
}
 public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
  public function update(Request $request, Task $task)
{
    $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'status' => ['required', 'in:0,1,2'],
    ]);

    $task->update($validated);

    return redirect()->route('tasks.index');
}
public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
