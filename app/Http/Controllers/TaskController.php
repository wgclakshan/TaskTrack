<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        // Get the authenticated user
        $userId = Auth::id();

        //$tasks = Task::paginate(9);
        $tasks = Task::where('user_id', $userId) // Filter tasks by the logged-in user
                 ->orderBy('updated_at', 'desc') // Sort by latest tasks first
                 ->paginate(9); // Paginate with 9 tasks per page
      
        // Render the Inertia component and pass the tasks data
        return Inertia::render('Task/Index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Task/AddTask'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ]);

            // Create the task with the validated data
        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'user_id' => Auth::id(), // Assuming you want to associate the task with the logged-in user
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
        return Inertia::render('Task/EditTask',[
            'task' => $task,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ]);

        // Update the task with validated data
        $task->update($validated);

        // Redirect back with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        dd('ok');
        // Delete the task
        $task->delete();

        // Redirect back with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
