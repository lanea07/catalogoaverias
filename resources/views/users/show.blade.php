<x-app-layout :title="trans_choice('User|Users', 1)">

    <div class="container mt-5">
        <div class="bg-body-tertiary p-5 shadow rounded">

            <div class="row mb-4 d-md-flex flex-column flex-md-row">
                <div class="col-md-4">
                    <h4>{{ __('Name') }}</h4>
                    {{ $user->name }}
                </div>
                <div class="col-md-4">
                    <h4>{{ __('Email') }}</h4>
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </div>
                <div class="col-md-4">
                    <h4>{{ trans_choice('Role|Roles', 1) }}</h4>
                    {{ $user->roles->pluck('name')->join('|') }}
                </div>
            </div>

            <div class="row mb-4 d-md-flex flex-column flex-md-row">
                <div class="col-md-4">
                    <h4>{{ __('Created at') }}</h4>
                    {{ $user->created_at }}
                </div>
                <div class="col-md-4">
                    <h4>{{ __('Updated at') }}</h4>
                    {{ $user->updated_at }}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-3">
                    <a href="{{ route('users.index') }}">{{ __('Back') }}</a>
                    <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">{{ __('Edit') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>