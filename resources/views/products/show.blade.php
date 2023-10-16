<x-app-layout>


    <div class="container mt-5">
        <h1>{{ $product->descripcion }}</h1>
        <div class="row my-4">
            <div class="col-12 col-md-4">
                @if ($product->img_path)
                    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/300x180" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/400x200" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/250x150" class="d-block w-100">
                            </div>
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
                            aria-selected="true">Ficha del
                            Producto</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false">Ticket
                            Asociado</button>
                    </li>
                </ul>
                <div class="tab-content" id="product-detail-content">
                    <div class="tab-pane fade mt-2 show active" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">EAN: <small class="fw-normal">{{ $product->ean }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Negocio: <small class="fw-normal">{{ $product->negocio }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Departamento: <small
                                        class="fw-normal">{{ $product->departamento }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Grupo: <small class="fw-normal">{{ $product->grupo }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Categoría: <small class="fw-normal">{{ $product->categoria }}</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Subcategoría: <small
                                        class="fw-normal">{{ $product->subcategoria }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Descripción: <small
                                        class="fw-normal">{{ $product->descripcion }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Referencia: <small
                                        class="fw-normal">{{ $product->referencia }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Marca: <small class="fw-normal">{{ $product->marca }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Medida: <small class="fw-normal">{{ $product->medida }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Color: <small class="fw-normal">{{ $product->color }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Razón Social: <small
                                        class="fw-normal">{{ $product->razon_social_proveedor }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">NIT Proveedor: <small
                                        class="fw-normal">{{ $product->nit_proveedor }}</small></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Precio Original: <small
                                        class="fw-normal">{{ toCurrency($product->costo, 'COP') }}</small></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Precio Actual:
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
                            <div class="col-6">
                                <p class="fw-bold">Antigüedad: <small
                                        class="fw-normal">{{ $product->dias_transcurridos }} días</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Descuento actual:
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
                        </div>
                    </div>
                    <div class="tab-pane fade mt-2" id="profile-tab-pane" role="tabpanel"
                        aria-labelledby="profile-tab" tabindex="0">
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Ticket #: <small class="fw-normal">{{ $product->ticket }}</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Tienda: <small class="fw-normal">{{ $product->queue }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Fecha de la avería <small
                                        class="fw-normal">{{ $product->fecha_inicio_gestion }}</small></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates praesentium
                                    provident placeat voluptate nisi nam inventore distinctio deserunt, ad, ea dolores.
                                    Ducimus nulla soluta quis tenetur magni fuga dignissimos ratione.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
