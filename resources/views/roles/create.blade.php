<x-app-layout  :title="__('Create new role')">
    <div class="d-flex justify-content-center align-items-center my-5">
        
        
        <div class="col-12 col-lg-8 mx-auto">
            @include('partials.validation-errors')
            @include('partials.session-status')
            <form class="bg-body-tertiary shadow rounded py-3 px-4" method="POST" action="{{ route('roles.store') }}" novalidate>
                <h1 class="fs-2">{{ __('New Role') }}</h1>
                <hr>
                <p>{{ __('Fields marked with * are mandatory') }}</p>
                @include('roles._form', ['btnText' => __('Save')])
            </form>

        </div>
    </div>
</x-app-layout>
