<x-app-layout  :title="__('Create new user')">

    <div class="col-12 col-lg-8 mx-auto">
        @include('partials.validation-errors')
        @include('partials.session-status')
        <form class="bg-body-tertiary shadow rounded py-3 px-4" method="POST" action="{{ route('users.store') }}" novalidate enctype="multipart/form-data">
            <h1 class="fs-2">{{ __('New User') }}</h1>
            <hr>
            <p>{{ __('Fields marked with * are mandatory') }}</p>
            @include('users._form', ['btnText' => __('Save')])
        </form>

    </div>
</div>

</x-app-layout>