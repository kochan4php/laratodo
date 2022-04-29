@extends('layouts.main')

@section('navbar')
    @include('user.partials.navbar')
@endsection

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center">{{ $title }}</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form method="POST" action="/profile/{{ auth()->user()->slug }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="my-3 d-flex justify-content-center">
                    @if (auth()->user()->avatar)
                        <img class="d-block avatar-preview rounded-circle" width="200px" height="200px"
                            src="{{ asset('/storage/' . auth()->user()->avatar) }}">
                    @else
                        <img class="d-block avatar-preview rounded-circle" width="200px" height="200px"
                            src="https://cdn2.iconfinder.com/data/icons/avatars-99/62/avatar-370-456322-512.png">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input class="form-control border border-2" type="file" id="avatar" name="avatar">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control border border-2 @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="fullname" required value="{{ old('name', auth()->user()->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control border border-2 @error('username') is-invalid @enderror"
                        id="username" name="username" placeholder="username" required
                        value="{{ old('username', auth()->user()->username) }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control border border-2 @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="email address" required
                        value="{{ old('email', auth()->user()->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn w-100 my-2">Update Profile</button>
                    <a href="/profile/{{ auth()->user()->slug }}" class="btn w-100 my-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
