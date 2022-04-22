<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
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
            'task' => ['required', 'min:3']
        ]);

        $validated_data['user_id'] = auth()->user()->id;

        Todo::create($validated_data);

        return Redirect::to('/', 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
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
        //
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
        return Redirect::to('/');
    }
}
