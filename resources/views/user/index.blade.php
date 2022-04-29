@extends('layouts.main')

@section('navbar')
    @include('user.partials.navbar')
@endsection

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center">My Profile</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="my-3 d-flex justify-content-center">
                @if (auth()->user()->avatar)
                    <img class="d-block avatar-preview rounded-circle" width="200px" height="200px"
                        src="{{ asset('/storage/' . auth()->user()->avatar) }}">
                @else
                    <img class="d-block avatar-preview rounded-circle" width="200px" height="200px"
                        src="https://cdn2.iconfinder.com/data/icons/avatars-99/62/avatar-370-456322-512.png">
                @endif
            </div>
            <div class="my-4 d-flex flex-column text-center justify-content-center">
                <div>
                    <p class="fs-5">Name: {{ auth()->user()->name }}</p>
                </div>
                <div>
                    <p class="fs-5">Username: {{ auth()->user()->username }}</p>
                </div>
                <div>
                    <p class="fs-5">Email: {{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="my-4 d-flex flex-column">
                <a href="/profile/edit/{{ auth()->user()->slug }}" class="btn col-md-6 m-auto edit-profile">Edit
                    Profile</a>
            </div>
        </div>
    </div>
@endsection
