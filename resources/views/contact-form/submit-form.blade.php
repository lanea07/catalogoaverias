<x-app-layout  :title="__('Contact Form')">
    <div class="d-flex justify-content-center align-items-center my-5">
        
        <div class="col-12 col-lg-8 mx-auto">
            @include('partials.validation-errors')
            @include('partials.session-status')
            <form class="bg-body-tertiary shadow rounded py-3 px-4" method="POST" action="{{ url('/contact') }}" novalidate>
                <h1 class="fs-2">{{ __('Contact Form') }}</h1>
                <hr>
                <p>{{ __('We\'re glad you are interested in owr products. Please fill this form and one of owr agents will get in touch with you soon.') }}</p>
                @include('contact-form._form', ['btnText' => __('Send')])
            </form>

        </div>
    </div>
</x-app-layout>
