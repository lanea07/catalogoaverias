<x-app-layout :title="__('My Profile')">
    <x-slot name="header">
        <h2>{{ __('Profile') }}</h2>
    </x-slot>

    <div class="container my-5">

        <div class="bg-light-subtle rounded p-4 mb-5 shadow">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-light-subtle rounded p-4 mb-5 shadow">
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-light-subtle rounded p-4 mb-5 shadow">
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</x-app-layout>