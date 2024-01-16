<x-app-layout :title="__('View')">

    <div class="container mt-5">

        <ul class="nav justify-content-end nav-pills">
            <li class="nav-item">
                <a class="btn btn-outline-warning" aria-current="page" href="{{ route('roles.edit', $role->id) }}">{{ __('Edit') }}</a>
            </li>
        </ul>

        <h1>{{ trans_choice('Role|Roles', 1) }}{{ $role->valid_id ? '' : ' ('.__('Invalid').')' }}</h1>
        <p>{{ $role->name }}</p>
    </div>

</x-app-layout>
