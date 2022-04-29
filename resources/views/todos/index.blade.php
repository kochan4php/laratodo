@extends('layouts.main')

@section('navbar')
    @include('partials.navbar')
@endsection

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">What's plan today {{ auth()->user()->name }}?</h2>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-body border-0 p-0">
                    <form action="/tasks" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text"
                                class="form-control input-task border-2 @error('task') is-invalid border-danger @enderror"
                                placeholder="Add Task..." value="{{ old('task') }}" name="task" autofocus>
                            <button class="btn add-task-btn" type="submit" name="submit">Add Task</button>
                        </div>
                        @error('task')
                            <p class="text-danger mt-2 mb-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </form>
                </div>
                <ul class="list-group list-group-flush mt-4 rounded border border-2">
                    @if ($tasks->count() > 0)
                        @foreach ($tasks as $todo)
                            <hr class="my-0">
                            <li class="list-group-item my-0 d-flex justify-content-between">
                                @if ($todo->status === 0)
                                    <p class="d-flex my-auto">{{ $todo->task }}</p>
                                @else
                                    <s class="d-flex my-auto">{{ $todo->task }}</s>
                                @endif
                                <div class="d-flex action-btn">
                                    <form action="/tasks/{{ $todo->id }}" method="POST" class="d-inline update-todos">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="task_id" value="{{ $todo->id }}">
                                        <button type="submit" class="my-0 badge bg-dark border-0 fs-6">
                                            @if ($todo->status === 0)
                                                <i class="bi bi-square-fill"></i>
                                            @else
                                                <i class="bi bi-check-square-fill"></i>
                                            @endif
                                        </button>
                                    </form>
                                    <form action="/tasks/{{ $todo->id }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="task_id" value="{{ $todo->id }}">
                                        <button type="submit" class="my-0 badge bg-dark border-0 fs-6"
                                            onclick="return confirm('Delete Task?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </li>
                            <hr class="my-0">
                        @endforeach
                    @else
                        <li class="list-group-item">
                            <p class="d-inline">No Tasks Today</p>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
