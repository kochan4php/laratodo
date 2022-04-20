@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('failed'))
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col md-6">
            <h1 class="text-center mb-4">Please Login</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control border border-secondary" id="email" name="email"
                        placeholder="email address" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control border border-secondary" id="password" name="password"
                        placeholder="password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input border-secondary" id="remember-me" name="remember-me">
                    <label class="form-check-label" for="remember-me">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 my-3">Login</button>
            </form>

            <p class="fs-5 text-center">Don't have account? <a href="/register">Register!</a></p>
        </div>
    </div>
@endsection
