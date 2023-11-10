<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="name" name="name" required value="{{ old('name') }}">
            <label for="name">{{ __('Name') }}</label>
            {{-- <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> --}}
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="email" name="email" required value="{{ old('email') }}">
            <label for="email">{{ __('Email') }}</label>
            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" /> --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            {{-- <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" /> --}}
            <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
            <label for="password">{{ __('Password') }}</label>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-floating mb-3">
            {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" /> --}}

            <input type="password" class="form-control" id="password_confirmation" placeholder="password_confirmation" name="password_confirmation" required>
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
