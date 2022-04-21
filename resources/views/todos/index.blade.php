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
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Add Task..." name="task">
                            <button class="btn btn-success" type="submit" name="submit">Add Task</button>
                        </div>
                    </form>
                </div>
                <ul class="list-group list-group-flush mt-3 rounded">
                    <li class="list-group-item">1 .An item</li>
                    <li class="list-group-item">2. A second item</li>
                    <li class="list-group-item">3. A third item</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
