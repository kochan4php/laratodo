<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/profile/{{ auth()->user()->slug }}">{{ $title }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            <div class="collapse navbar-collapse navbarNavAltMarkup justify-content-end my-2" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <p class="nav-link auth-user dropdown-toggle active d-inline" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </p>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li class="d-flex align-items-center justify-content-center mt-3 mb-4">
                                @if (!auth()->user()->avatar)
                                    <img src="https://cdn2.iconfinder.com/data/icons/avatars-99/62/avatar-370-456322-512.png"
                                        class="rounded-circle" width="95" height="95" alt="Avatar" loading="lazy" />
                                @else
                                    <img src="{{ asset('/storage/' . auth()->user()->avatar) }}" class="rounded-circle"
                                        width="95" height="95" alt="Avatar" loading="lazy" />
                                @endif
                            </li>
                            <li>
                                <a class="dropdown-item" href="/">Back To Tasks</a>
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
    </div>
</nav>
