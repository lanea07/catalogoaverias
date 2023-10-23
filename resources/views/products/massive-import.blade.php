<x-app-layout :title="__('Massive Upload')">
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="col-12 col-lg-8 mx-auto">
            @include('partials.validation-errors')
            @include('partials.session-status')

            @livewire('preview-upload')

        </div>
    </div>
</x-app-layout>
