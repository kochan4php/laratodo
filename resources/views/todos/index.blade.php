@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">What's plan today?</h2>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-0">
                    <form action="/" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control input-task border-2 border-warning"
                                placeholder="Add Task..." name="task">
                            <button class="btn btn-warning" type="submit" name="submit">Add Task</button>
                        </div>
                    </form>
                </div>
                <ul class="list-group list-group-flush mt-4 rounded border border-warning border-2">
                    @foreach ($tasks as $todo)
                        <li class="list-group-item">
                            {{ $todo->task }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
