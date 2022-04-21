@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">What's plan today?</h2>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body p-0">
                    <form action="/tasks" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text"
                                class="form-control input-task border-1 border-warning @error('task') is-invalid border-danger @enderror"
                                placeholder="Add Task..." name="task">
                            <button class="btn btn-warning" type="submit" name="submit">Add Task</button>
                        </div>
                        @error('task')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </form>
                </div>
                <ul class="list-group list-group-flush mt-4 rounded border border-warning border-1">
                    @if ($tasks->count() > 0)
                        @foreach ($tasks as $todo)
                            <hr class="my-0">
                            <li class="list-group-item my-0 d-flex justify-content-between">
                                <p class="d-flex my-auto">{{ $todo->task }}</p>
                                <form action="/tasks/{{ $todo->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{ $todo->id }}">
                                    <button type="submit" class="my-0 badge bg-dark border-0 fs-6"
                                        onclick="return confirm('Delete Task?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
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
