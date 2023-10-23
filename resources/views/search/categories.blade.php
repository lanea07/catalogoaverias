<x-app-layout>

    <div class="container pt-5 ">
        <div class="row" data-masonry='{"percentPosition": true }'>
            @forelse ($categories as $category)
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <a class="link-offset-2 link-underline link-underline-opacity-0"
                        href="{{ route('search', ['q' => $category['categoria']]) }}">
                        <div class="">
                            <div class="card">
                                <div class="card-body bg-body-tertiary">
                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <p class="card-title fw-semibold text-break">{{ $category['categoria'] }}</p>
                                        <i class="fa-solid fa-arrow-up-right-from-square text-body-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body bg-body-tertiary">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <p class="card-title fw-semibold text-break">
                                    {{ __('No categories yet here. Try again later.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

</x-app-layout>
