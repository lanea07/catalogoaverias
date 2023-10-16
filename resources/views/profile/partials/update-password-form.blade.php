<section>
    <header>
        <h2 class="text-secondary">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="current_password" placeholder="{{ __('Current Password') }}" name="current_password">
            <label for="current_password">{{ __('Current Password') }}</label>
            {{-- <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" /> --}}
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" placeholder="{{ __('New Password') }}" name="password">
            <label for="password">{{ __('New Password') }}</label>
            {{-- <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" /> --}}
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password_confirmation" placeholder="{{ __('Confirm Password') }}" name="password_confirmation">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            {{-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" /> --}}
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="fw-light"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
