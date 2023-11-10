<x-app-layout :title="__('View Product')">

    <div class="container mt-5">
        <h1>{{ $product->descripcion }}</h1>
        <div class="row my-4" data-masonry='{"percentPosition": true }'>
            <div class="col-12 col-md-4 mb-sm-3 d-flex align-items-center flex-column">
                @if ($images)
                    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner rounded">
                            @foreach ($images as $key => $image)
                                <div class="carousel-item @if ($key === 0) active @endif rounded">
                                    <a type="button" class="h-100 d-flex justify-content-center align-items-center" data-bs-toggle="modal"
                                        data-bs-target="#images-modal" data-bs-img-path="{{ $image }}">
                                        <img src="{{ $image }}" class="d-block w-100 rounded product-detail-img-blurred-background">
                                        <img src="{{ $image }}" class="d-block w-100 rounded product-detail-img">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn-link text-secondary" data-bs-toggle="modal"
                        data-bs-target="#images-modal">
                        {{ __('Enlarge') }}<i class="fa-solid fa-magnifying-glass ms-2"></i>
                    </a>
                @else
                    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <img src="{{ url('/images/No_image_available.png') }}" class="d-block w-100">
                    </div>
                @endif
            </div>

            <div class="col-12 col-md-8 shadow-sm product-detail p-3 bg-body-tertiary">
                <ul class="nav nav-tabs" id="product-detail" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">{{ __('Product Sheet') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane"
                            aria-selected="false">{{ __('Associated Ticket') }}</button>
                    </li>
                </ul>
                <div class="tab-content" id="product-detail-content">
                    <div class="tab-pane fade mt-2 show active" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('EAN') }}: <small
                                        class="fw-normal">{{ $product->ean }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Business Unit') }}: <small
                                        class="fw-normal">{{ $product->negocio }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Department') }}: <small
                                        class="fw-normal">{{ $product->departamento }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Group') }}: <small
                                        class="fw-normal">{{ $product->grupo }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ trans_choice(__('Category|Categories'), 1) }}: <small
                                        class="fw-normal">{{ $product->categoria }}</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Subcategory') }}: <small
                                        class="fw-normal">{{ $product->subcategoria }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Description') }}: <small
                                        class="fw-normal">{{ $product->descripcion }}</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Reference') }}: <small
                                        class="fw-normal">{{ $product->referencia }}</small>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Brand') }}: <small
                                        class="fw-normal">{{ $product->marca }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Measure') }}: <small
                                        class="fw-normal">{{ $product->medida }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Color') }}: <small
                                        class="fw-normal">{{ $product->color }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Provider Name') }}: <small
                                        class="fw-normal">{{ $product->razon_social_proveedor }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Provider NIT') }}: <small
                                        class="fw-normal">{{ $product->nit_proveedor }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Antiquity') }}: <small
                                        class="fw-normal">{{ $product->dias_transcurridos }} días</small></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Current Cost') }}:
                                    <small class="fw-normal">
                                        @switch($product->dias_transcurridos)
                                            @case($product->dias_transcurridos >= 0 && $product->dias_transcurridos <= 30)
                                                {{ toCurrency($product->costo, 'COP') }}
                                            @break

                                            @case($product->dias_transcurridos > 30 && $product->dias_transcurridos <= 60)
                                                {{ toCurrency($product->costo * 0.8, 'COP') }}
                                            @break

                                            @case($product->dias_transcurridos > 60 && $product->dias_transcurridos <= 90)
                                                {{ toCurrency($product->costo * 0.5, 'COP') }}
                                            @break

                                            @case($product->dias_transcurridos >= 90)
                                                {{ toCurrency($product->costo * 0.2, 'COP') }}
                                            @break
                                        @endswitch
                                    </small>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Discount') }}:
                                    <small class="fw-normal">
                                        @switch($product->dias_transcurridos)
                                            @case($product->dias_transcurridos >= 0 && $product->dias_transcurridos <= 30)
                                                {{ NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(0) }}
                                            @break

                                            @case($product->dias_transcurridos > 30 && $product->dias_transcurridos <= 60)
                                                {{ NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($product->costo * 0.2) / $product->costo) }}
                                            @break

                                            @case($product->dias_transcurridos > 60 && $product->dias_transcurridos <= 90)
                                                {{ NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($product->costo * 0.5) / $product->costo) }}
                                            @break

                                            @case($product->dias_transcurridos >= 90)
                                                {{ NumberFormatter::create('es_CO', NumberFormatter::PERCENT)->format(($product->costo * 0.8) / $product->costo) }}
                                            @break
                                        @endswitch
                                    </small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Warranty Expiration Date') }}: <small
                                        class="fw-normal">{{ $product->garantia_expira }}</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade mt-2" id="profile-tab-pane" role="tabpanel"
                        aria-labelledby="profile-tab" tabindex="0">
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Ticket') }}: <small
                                        class="fw-normal">{{ $product->ticket }}</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Store') }}: <small
                                        class="fw-normal">{{ $product->queue }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">{{ __('Failure Date') }} <small
                                        class="fw-normal">{{ $product->fecha_inicio_gestion }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if (empty($product->observaciones))
                                    <p>{{ __('No anotations.') }}</p>
                                @else
                                    <h5>{{ __('Observations') }}</h5>
                                    <p>{{ $product->observaciones }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @auth
                    <div class="align-items-center d-flex flex-column-reverse flex-md-row justify-content-between">
                        <div class="btn-group">
                            <a class="btn btn-primary"
                                href="{{ route('products.edit', $product) }}">{{ __('Edit') }}</a>
                            <a class="btn btn-danger" href="#"
                                onclick="document.getElementById('delete-directorio').submit()">{{ __('Delete') }}</a>
                        </div>
                        <form class="d-none" id="delete-directorio" action="{{ route('products.destroy', $product) }}"
                            method="post">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                @endauth
                @guest
                    <div class="align-items-center d-flex flex-column-reverse flex-md-row justify-content-end">
                        <div class="btn-group d-flex">
                            <a class="btn btn-success"
                                href="{{ url('contact', $product) }}">{{ __('I\'m interested') }}</a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="images-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="w-100 img-thumbnail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
