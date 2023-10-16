<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex px-5 sticky-top">

        <a class="navbar-brand" href="/">
            <x-application-logo class="d-inline-block align-text-top" width="30" height="24" />
            {{ config('app.name', 'Catalogo de Averías') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasWithBothOptions" role="button"
                        aria-controls="offcanvasWithBothOptions">
                        {{ __('Menu') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home') }}" aria-current="page"
                        href="/">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('search') }}" href="#">{{ __('Categories') }}</a>
                </li>
                @auth
                    <li class="nav-item dropdown d-lg-none">
                        <div class="">
                            <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>

                                </form>
                            </ul>
                        </div>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                @endauth
            </ul>
        </div>

        @auth
            <div class="d-none dropdown d-lg-block">
                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>

                    </form>
                </ul>
            @else
                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
            </div>
        @endauth

    </nav>
</header>
