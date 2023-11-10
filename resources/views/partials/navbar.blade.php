<header>
    <nav class="navbar bd-navbar navbar-expand-lg bg-body-tertiary d-flex px-5 sticky-top">

        <a class="navbar-brand" href="/">
            <x-application-logo class="d-inline-block align-text-top" height="30" />
            {{ config('app.name', 'Catalogo de Averías') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasWithBothOptions" role="button"
                            aria-controls="offcanvasWithBothOptions">
                            {{ __('Menu') }}
                        </a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home') }}" aria-current="page"
                        href="/">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('search') }}"
                        href="{{ route('categories') }}">{{ trans_choice(__('Category|Categories'), 1) }}</a>
                </li>
            </ul>

            {{-- Lang Toggler --}}
            <ul class="navbar-nav mx-lg-1">
                <li class="nav-item dropdown">
                    <button
                        class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center "
                        id="bd-lang" type="button" aria-expanded="true" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-label="Toggle lang (dark)">
                        <svg class="bi my-1 lang-icon-active">
                            <use href="#lang-es"></use>
                        </svg>
                        <span class="d-lg-none ms-2" id="bd-lang-text">{{ __('Toggle lang') }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-lang-text" data-bs-popper="static">
                        <li>
                            <a href="{{ route('set-locale', ['lang' => 'es']) }}" type="button" class="align-items-center d-flex dropdown-item"
                                data-bs-lang-value="es" aria-pressed="false">
                                <svg class="bi me-2 opacity-50 lang-icon">
                                    <use href="#lang-es"></use>
                                </svg>
                                {{ __('Spanish') }}
                                <svg class="bi ms-auto d-none">
                                    <use href="#check2"></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('set-locale', ['lang' => 'en']) }}" type="button" class="active align-items-center d-flex dropdown-item"
                                data-bs-lang-value="en" aria-pressed="false">
                                <svg class="bi me-2 opacity-50 lang-icon">
                                    <use href="#lang-en"></use>
                                </svg>
                                {{ __('English') }}
                                <svg class="bi d-none ms-auto">
                                    <use href="#check2"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            {{-- Theme Toggler --}}
            <ul class="navbar-nav mx-lg-1">
                <li class="nav-item dropdown">
                    <button
                        class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center "
                        id="bd-theme" type="button" aria-expanded="true" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-label="Toggle theme (dark)">
                        <svg class="bi my-1 theme-icon-active">
                            <use href="#sun-fill"></use>
                        </svg>
                        <span class="d-lg-none ms-2" id="bd-theme-text">{{ __('Toggle theme') }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text" data-bs-popper="static">
                        <li>
                            <button type="button" class="align-items-center d-flex dropdown-item"
                                data-bs-theme-value="light" aria-pressed="false">
                                <svg class="bi me-2 opacity-50 theme-icon">
                                    <use href="#sun-fill"></use>
                                </svg>
                                {{ __('Light') }}
                                <svg class="bi ms-auto d-none">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="active align-items-center d-flex dropdown-item"
                                data-bs-theme-value="dark" aria-pressed="false">
                                <svg class="bi me-2 opacity-50 theme-icon">
                                    <use href="#moon-stars-fill"></use>
                                </svg>
                                {{ __('Dark') }}
                                <svg class="bi d-none ms-auto">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="auto" aria-pressed="false">
                                <svg class="bi me-2 opacity-50 theme-icon">
                                    <use href="#circle-half"></use>
                                </svg>
                                {{ __('Auto') }}
                                <svg class="bi ms-auto d-none">
                                    <use href="#check2"></use>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav">
                @auth
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                    </div>
                @else
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                @endauth
            </ul>

        </div>
    </nav>
</header>
