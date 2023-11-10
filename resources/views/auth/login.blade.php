<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">{{ __('Email') }}</label>
            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">{{ __('Password') }}</label>
            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Remember Me -->
        <div class="form-check">
            <label for="remember_me" class="form-check-label">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <span class="ml-2 text-sm text-secondary">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4">
            @if (Route::has('password.request'))
                <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-4" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="mt-4">
                <x-primary-button>{{ __('Log in') }}</x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
