<x-app-layout  :title="__('Edit Product')">

    <div class="d-flex justify-content-center align-items-center my-5">
        
        <div class="col-12 col-lg-8 mx-auto">
            @include('partials.validation-errors')
            @include('partials.session-status')
            <form class="bg-body-tertiary shadow rounded py-3 px-4" method="POST" action="{{ route('products.update', $product->id) }}"
                novalidate enctype="multipart/form-data">
                @method('PATCH')
                <h1 class="fs-2">{{ __('Edit Product') }}</h1>
                <hr>
                <p>{{ __('Fields marked with * are mandatory') }}</p>
                @include('products._form', ['btnText' => __('Save')])
            </form>

        </div>
    </div>

</x-app-layout>
