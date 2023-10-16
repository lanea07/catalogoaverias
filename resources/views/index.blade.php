<x-app-layout>

    <!-- Masthead-->
    <header class="masthead h-100">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <h3 class="mb-5">{{ __('Type to search products by category, or use categories menu on top link to see all available categories') }}</h3>
                    </div>
                    @livewire('search-product')
                </div>
            </div>
        </div>
    </header>
</x-app-layout>