{{-- <nav class="navbar navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Laratodo</a>
        @auth
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Laratodo | {{ $title }}</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-2">
                        <li class="nav-item dropdown">
                            <a class="text-dark nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                My Task
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="offcanvasNavbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/">All Tasks</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/completed">Completed Tasks</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/uncompleted">Uncompleted Task</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="text-dark nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="offcanvasNavbarDropdown">
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth
        @guest
            <a href="/login" class="btn btn-primary">Login</a>
        @endguest
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Laratodo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            <div class="collapse navbar-collapse justify-content-end navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">All Tasks</a>
                    <a class="nav-link" href="/completed">Completed Tasks</a>
                    <a class="nav-link" href="/uncompleted">Uncompleted Tasks</a>
                </div>
            </div>
            <div class="collapse navbar-collapse navbarNavAltMarkup justify-content-end" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="/profile/{{ auth()->user()->id }}">My Profile</a>
                            </li>
                            <li>
                                <form action="/logout" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @endauth
        @guest
            <div class="collapse navbar-collapse justify-content-end navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="/login">Login</a>
                </div>
            </div>
        @endguest
    </div>
</nav>
