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
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }} text-white" href="/">
                        All Tasks
                    </a>
                    <a class="nav-link {{ Request::is('completed') ? 'active' : '' }} text-white" href="/completed">
                        Completed Tasks
                    </a>
                    <a class="nav-link {{ Request::is('uncompleted') ? 'active' : '' }} text-white" href="/uncompleted">
                        Uncompleted Tasks
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse navbarNavAltMarkup justify-content-end my-2" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <p class="nav-link auth-user dropdown-toggle active d-inline" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </p>
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
