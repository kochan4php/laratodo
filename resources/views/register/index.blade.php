@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col md-6">
            <h2 class="text-center mb-4">Please Register</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="/register">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control border border-secondary @error('name') is-invalid @enderror"
                        id="name" name="name" placeholder="fullname" required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control border border-secondary @error('username') is-invalid @enderror"
                        id="username" name="username" placeholder="username" required value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control border border-secondary @error('email') is-invalid @enderror"
                        id="email" name="email" placeholder="email address" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password"
                        class="form-control border border-secondary @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="password" required value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 my-3">Register</button>
            </form>

            <p class="fs-5 text-center">Already Registered? <a href="/login">Login!</a></p>
        </div>
    </div>
@endsection
