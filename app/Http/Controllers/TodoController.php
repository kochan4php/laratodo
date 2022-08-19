<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class TodoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('todos.index', [
      'title' => 'Home',
      'tasks' => Todo::with('user')
        ->where('user_id', auth()->user()->id)
        ->orderBy('status', 'asc')
        ->get()
    ]);
  }

  public function completed()
  {
    return view('todos.completed.index', [
      'title' => 'Completed Tasks',
      'tasks' => Todo::with('user')
        ->where('user_id', auth()->user()->id)
        ->where('status', 1)
        ->get()
    ]);
  }

  public function uncompleted()
  {
    return view('todos.uncompleted.index', [
      'title' => 'Uncompleted Tasks',
      'tasks' => Todo::with('user')
        ->where('user_id', auth()->user()->id)
        ->where('status', 0)
        ->get()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated_data = $request->validate([
      'task' => ['required', 'min:3', 'max:150']
    ]);

    $validated_data['user_id'] = auth()->user()->id;

    Todo::create($validated_data);
    return redirect()->to('/', 201);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Todo $todo)
  {
    $task = Todo::find($request->task_id);

    if ($task->status === 0) $task->status = 1;
    else $task->status = 0;

    $task->save();
    return redirect()->to('/');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, Todo $todo)
  {
    Todo::find($request->task_id)->delete();
    return redirect()->to('/');
  }
}
