<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple todolist with some features">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    <style>
        * {
            box-sizing: border-box !important;
            font-family: "Lexend Deca", Arial, Helvetica, sans-serif !important;
        }

    </style>
    <title>Laratodo | {{ $title }}</title>
</head>

<body>
    @include('user.partials.navbar')
    <div class="container main-container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center">My Profile</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form method="POST" action="/profile/{{ auth()->user()->slug }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    @if ($user->avatar)
                        <div class="my-3 d-flex justify-content-center">
                            <img class="d-block avatar-preview rounded-circle" width="200px" height="200px">
                        </div>
                    @else
                        <div class="my-3 d-flex justify-content-center">
                            <img class="d-block avatar-preview rounded-circle" width="200px" height="200px"
                                src="https://cdn2.iconfinder.com/data/icons/avatars-99/62/avatar-370-456322-512.png">
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input class="form-control border border-2" type="file" id="avatar" name="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control border border-2 @error('name') is-invalid @enderror"
                            id="name" name="name" placeholder="fullname" required
                            value="{{ old('name', auth()->user()->name) }}">
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
                        <input type="email" class="form-control border border-2 @error('email') is-invalid @enderror"
                            id="email" name="email" placeholder="email address" required
                            value="{{ old('email', auth()->user()->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn w-100 my-3">Save Account</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/js/user.js"></script>
</body>

</html>
