@extends('layouts.app')

@section('content')
    @include('partials.navbar')
    @include('partials.offcanvas')

    <div class="container pt-5">
        @if($allProducts->isEmpty())
            <h2 class="mb-5">No se encontraron resultados para {{ $query }}</h2>
        @else
            <h2 class="mb-5">Resultados de la búsqueda para {{ $query }}</h2>
        @endif
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach ($allProducts as $product)
                <div class="col-12 col-sm-6 col-md-3 mb-4">
                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ route('products.show', $product->id) }}">
                        <div class="card" style="width: 18rem;">
                            <img src="https://placehold.co/300x180" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->descripcion }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $product->referencia }}</h6>
                                {{ $product->subcategoria }}<br>
                                <small class="badge rounded-pill text-bg-danger">Ticket # {{ $product->ticket }}</small>
                                <p class="card-text">
                                    <b>Antigüedad: </b>{{ $product->dias_transcurridos }} días<br>
                                    <b>Tienda: </b>{{ $product->queue }}<br>
                                    <b>Precio actual: </b>
                                    @switch($product->dias_transcurridos)
                                        @case($product->dias_transcurridos >= 0 && $product->dias_transcurridos <= 30)
                                            {{ toCurrency($product->costo, "COP") }}
                                            @break
                                        @case($product->dias_transcurridos > 30 && $product->dias_transcurridos <= 60)
                                            {{ toCurrency($product->costo * 0.8, "COP") }}
                                            @break
                                        @case($product->dias_transcurridos > 60 && $product->dias_transcurridos <= 90)
                                            {{ toCurrency($product->costo * 0.5, "COP") }}
                                            @break
                                        @case($product->dias_transcurridos >= 90)
                                            {{ toCurrency($product->costo * 0.2, "COP") }}
                                            @break
                                    @endswitch
                                    <br>
                                    <b>Precio original: </b>{{ toCurrency($product->costo, "COP") }}
                                    <b>Descuento actual: </b>
                                    @switch($product->dias_transcurridos)
                                        @case($product->dias_transcurridos >= 0 && $product->dias_transcurridos <= 30)
                                            {{ NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(0) }}
                                            @break
                                        @case($product->dias_transcurridos > 30 && $product->dias_transcurridos <= 60)
                                            {{ NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($product->costo * 0.2)/$product->costo) }}
                                            @break
                                        @case($product->dias_transcurridos > 60 && $product->dias_transcurridos <= 90)
                                            {{ NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($product->costo * 0.5)/$product->costo) }}
                                            @break
                                        @case($product->dias_transcurridos >= 90)
                                            {{ NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($product->costo * 0.8)/$product->costo) }}
                                            @break
                                    @endswitch
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection()
