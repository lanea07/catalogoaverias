<x-app-layout>
    <div class="d-flex justify-content-center align-items-center my-5">
        
        
        <div class="col-12 col-lg-8 mx-auto">
            @include('partials.validation-errors')
            @include('partials.session-status')
            <form class="bg-body-tertiary shadow rounded py-3 px-4" method="POST" action="{{ route('products.store') }}" novalidate>
                <h1 class="fs-2">{{ __('New Product') }}</h1>
                <hr>
                <p>{{ __('Fields marked with * are mandatory') }}</p>
                @include('products._form', ['btnText' => __('Save')])
            </form>

        </div>
    </div>
</x-app-layout>
