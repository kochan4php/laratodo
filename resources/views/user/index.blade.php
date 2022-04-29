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

        .avatar-preview {
            object-fit: cover;
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/js/user.js"></script>
</body>

</html>
