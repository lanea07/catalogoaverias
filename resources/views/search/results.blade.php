<x-app-layout :title="__('Search Results')">

    <div class="container pt-5 ">
        @if($allProducts->isEmpty())
            <h2 class="mb-5">{{ __('No results found for') }} {{ $query }}</h2>
        @else
            <h2 class="mb-5">{{ __('Results for') }} {{ $query }}</h2>
        @endif
        <div class="row" id="masonry-container" data-masonry='{"percentPosition": true }'>
            @foreach ($allProducts as $product)
                <div class="col-12 col-sm-6 col-md-3 mb-4 grid-item" >
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ route('products.show', $product->id) }}">
                        <div class="card">
                            {{-- <img src="https://placehold.co/300x180" class="card-img-top" alt="..."> --}}
                            <div class="d-flex justify-content-center align-items-center search-results-img-container">

                                @if ($product->img_path && Storage::disk('google')->exists($product->img_path))
                                    <img src="data:image/png;base64, {{ getGooglefirstImage($product->img_path) }}" class="search-results-img-blurred-background" alt="...">
                                    <img src="data:image/png;base64, {{ getGooglefirstImage($product->img_path) }}" class="search-results-img w-100" alt="...">
                                @else
                                    <img src="{{ url('/images/No_image_available.png') }}" class="search-results-img-blurred-background" alt="...">
                                    <img src="{{ url('/images/No_image_available.png') }}" class="search-results-img w-100" alt="...">
                                @endif
                            </div>
                            <div class="card-body bg-body-tertiary">
                                <h5 class="card-title">{{ $product->descripcion }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $product->referencia }}</h6>
                                {{ $product->subcategoria }}<br>
                                <small class="badge rounded-pill text-bg-danger">{{ __('Ticket') }} # {{ $product->ticket }}</small>
                                <p class="card-text">
                                    <b>{{ __('Antiquity') }}: </b>{{ $product->dias_transcurridos }} días<br>
                                    <b>{{ __('Store') }}: </b>{{ $product->queue }}<br>
                                    <b>{{ __('Original Price') }}: </b>{{ toCurrency($product->costo, "COP") }}<br>
                                    <b>{{ __('Current Cost') }}: </b>
                                    {{ calculateCostWithDiscount($product->costo, $product->dias_transcurridos, $product->custom_descuento) }}
                                    <br>
                                    <b>{{ __('Discount') }}: </b>
                                    {{ calculateDiscount($product->costo, $product->dias_transcurridos, $product->custom_descuento) }}
                                    <br>
                                    <b>{{ __('Warranty Expiration Date') }}: </b>{{ $product->garantia_expira }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
