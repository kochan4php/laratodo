<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tasks = Task::with('user')
      ->whereUserId(auth()->user()->id)
      ->orderBy('status', 'asc')
      ->get();
    return view('todos.index', compact('tasks'));
  }

  public function completed()
  {
    $tasks = Task::with('user')
      ->where('user_id', auth()->user()->id)
      ->where('status', 1)
      ->get();
    return view('todos.completed.index', compact('tasks'));
  }

  public function uncompleted()
  {
    $tasks = Task::with('user')
      ->where('user_id', auth()->user()->id)
      ->where('status', 0)
      ->get();
    return view('todos.uncompleted.index', compact('tasks'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated_data = $request->validate(['task' => ['required', 'min:3', 'max:150']]);
    $validated_data['user_id'] = auth()->user()->id;
    Task::create($validated_data);
    return redirect()->to('/', 201);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Task $task)
  {
    if ($task->status === 0) $task->status = 1;
    else $task->status = 0;

    $task->save();
    return redirect()->to('/');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Task $task)
  {
    $task->delete();
    return redirect()->to('/');
  }
}
