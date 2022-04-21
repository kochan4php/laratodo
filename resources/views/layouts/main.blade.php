<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <style>
        body {
            /* min-height: 1000px; */
            background-color: rgba(10, 12, 15);
            color: #fff;
        }

        .main-container {
            margin-top: 5.1rem !important;
        }

        * {
            box-sizing: border-box;
            font-family: "Lexend Deca", Arial, Helvetica, sans-serif !important;
        }

        .jumbotron {
            background-color: #ddd;
            padding: 3rem;
        }

        .navbar .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler:focus,
        .navbar-toggler:active,
        .navbar-toggler-icon:focus,
        .btn:focus,
        .btn:active,
        .btn-close:focus,
        .btn-close:active,
        .form-control:active,
        .form-control:focus,
        .form-check-input:active,
        .form-check-input:focus {
            outline: none;
            box-shadow: none;
        }

        nav {
            background-color: rgba(10, 12, 15, 0.4);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.6px);
            -webkit-backdrop-filter: blur(8.6px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

    </style>
    <title>Laratodo | {{ $title }}</title>
</head>

<body>
    @include('todos.partials.navbar')
    <div class="container main-container mb-5">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
