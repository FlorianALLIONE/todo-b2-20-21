<?php

namespace App\Http\Controllers;

use App\Models\{ Task, Board };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Renvoi une vue à laquelle on transmet les tasks de l'utilisateurs (ceux auxquels il participe)
        $user = Auth::user();
        return view('tasks.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $board = new Board();
        $user = Auth::user();
        return view('tasks.create', ['user' => $user, 'board' => $board]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', 
            'description' => 'max:4096',
            'due_date' => 'required|date|max:10',
            'board_id' => 'string'
        ]);
        $board = new Board();
        $task = new Task(); 
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->due_date = $validatedData['due_date'];
        $task->board_id = $validatedData['board_id'];

        $task->save(); 
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $user = Auth::user();
        $board = new Board();
        return view('tasks.edit', ['task' => $task, 'board' => $board, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', 
            'description' => 'max:4096',
            'due_date' => 'required|date|max:10',
            'board_id' => 'string'
        ]
        );
        $task->title = $validatedData['title']; 
        $task->description = $validatedData['description']; 
        $task->due_date = $validatedData['due_date'];
        $task->board_id = $validatedData['board_id'];
        $task->update(); 

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}
