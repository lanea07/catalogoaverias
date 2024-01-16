<x-app-layout  :title="__('Edit User')">

    <div class="col-12 col-lg-8 mx-auto">
        @include('partials.validation-errors')
        @include('partials.session-status')
        <form class="bg-body-tertiary shadow rounded py-3 px-4" method="POST" action="{{ route('users.update', $user->id) }}" novalidate>
            @method('PATCH')
            <h1 class="fs-2">{{ __('Edit User') }}</h1>
            <hr>
            <p>{{ __('Fields marked with * are mandatory') }}</p>
            @include('users._form', ['btnText' => __('Update')])
        </form>

    </div>
</div>

</x-app-layout>