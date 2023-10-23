@csrf

<div class="form-floating mb-3">
    <input type="number" class="form-control @error('ticket') is-invalid @else border-0 @enderror" id="ticket"
        placeholder="ticket" name="ticket" value="{{ old('ticket', $product->ticket) }}" required
        {{ request()->routeIs('products.edit') ? 'readonly' : '' }}>
    <label for="ticket">{{ __('Ticket') }}*</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('queue') is-invalid @else border-0 @enderror" id="queue"
        placeholder="queue" name="queue" value="{{ old('queue', $product->queue) }}" required>
    <label for="queue">{{ __('Queue') }}*</label>
</div>

<div class="form-floating mb-3">
    <input type="number" class="form-control @error('ean') is-invalid @else border-0 @enderror" id="ean"
        placeholder="ean" name="ean" value="{{ old('ean', $product->ean) }}" required>
    <label for="ean">{{ __('Ean') }}*</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('negocio') is-invalid @else border-0 @enderror" id="negocio"
        placeholder="negocio" name="negocio" value="{{ old('negocio', $product->negocio) }}">
    <label for="negocio">{{ __('Business Unit') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('departamento') is-invalid @else border-0 @enderror"
        id="departamento" placeholder="departamento" name="departamento"
        value="{{ old('departamento', $product->departamento) }}">
    <label for="departamento">{{ __('Department') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('grupo') is-invalid @else border-0 @enderror" id="grupo"
        placeholder="grupo" name="grupo" value="{{ old('grupo', $product->grupo) }}">
    <label for="grupo">{{ __('Group') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('categoria') is-invalid @else border-0 @enderror" id="categoria"
        placeholder="categoria" name="categoria" value="{{ old('categoria', $product->categoria) }}">
    <label for="categoria">{{ __('Category') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('subcategoria') is-invalid @else border-0 @enderror"
        id="subcategoria" placeholder="subcategoria" name="subcategoria"
        value="{{ old('subcategoria', $product->subcategoria) }}">
    <label for="subcategoria">{{ __('Subcategory') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('descripcion') is-invalid @else border-0 @enderror"
        id="descripcion" placeholder="descripcion" name="descripcion"
        value="{{ old('descripcion', $product->descripcion) }}">
    <label for="descripcion">{{ __('Description') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('referencia') is-invalid @else border-0 @enderror" id="referencia"
        placeholder="referencia" name="referencia" value="{{ old('referencia', $product->referencia) }}">
    <label for="referencia">{{ __('Reference') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('marca') is-invalid @else border-0 @enderror" id="marca"
        placeholder="marca" name="marca" value="{{ old('marca', $product->marca) }}">
    <label for="marca">{{ __('Brand') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('medida') is-invalid @else border-0 @enderror" id="medida"
        placeholder="medida" name="medida" value="{{ old('medida', $product->medida) }}">
    <label for="medida">{{ __('Measure') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('color') is-invalid @else border-0 @enderror" id="color"
        placeholder="color" name="color" value="{{ old('color', $product->color) }}">
    <label for="color">{{ __('Color') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="" class="form-control @error('costo') is-invalid @else border-0 @enderror" id="costo"
        placeholder="costo" name="costo" value="{{ old('costo', $product->costo) }}" required>
    <label for="costo">{{ __('Cost') }}*</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('nit_proveedor') is-invalid @else border-0 @enderror"
        id="nit_proveedor" placeholder="nit_proveedor" name="nit_proveedor"
        value="{{ old('nit_proveedor', $product->nit_proveedor) }}">
    <label for="nit_proveedor">{{ __('Provider NIT') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('razon_social_proveedor') is-invalid @else border-0 @enderror"
        id="razon_social_proveedor" placeholder="razon_social_proveedor" name="razon_social_proveedor"
        value="{{ old('razon_social_proveedor', $product->razon_social_proveedor) }}">
    <label for="razon_social_proveedor">{{ __('Provider Name') }}</label>
</div>

<div class="form-floating mb-3">
    <input type="date" class="form-control @error('fecha_inicio_gestion') is-invalid @else border-0 @enderror"
        id="fecha_inicio_gestion" placeholder="fecha_inicio_gestion" name="fecha_inicio_gestion"
        value="{{ old('fecha_inicio_gestion', $product->fecha_inicio_gestion) }}">
    <label for="fecha_inicio_gestion">{{ __('Starting Date') }}*</label>
</div>

<div class="form-floating mb-3">
    <input type="number" class="form-control @error('dias_transcurridos') is-invalid @else border-0 @enderror"
        id="dias_transcurridos" placeholder="dias_transcurridos" name="dias_transcurridos"
        value="{{ old('dias_transcurridos', $product->dias_transcurridos) }}" required>
    <label for="dias_transcurridos">{{ __('Days Passed') }}*</label>
</div>

<div class="mb-3">
    <h5>{{ __('Images') }}</h5>
    <div class="d-flex overflow-auto">
        @forelse (Storage::disk('google')->files($product->img_path) as $image)
            <div class="img-container mx-2 mb-2">
                <img class="" src="{{ Storage::disk('google')->url($image) }}" alt="" height=150>
                <div class="overlay-view">
                    <button type="button" class="icon btn text-light" data-bs-toggle="modal" data-bs-target="#image-viewer"
                        data-bs-path="{{ Storage::disk('google')->url($image) }}" title="{{ __('View') }}">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
                <div class="overlay-delete">
                    <a href="/products/delete-image?product_id={{ $product->id }}&imgPath={{ $image }}"
                        class="icon link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" title="{{ __('Delete') }}">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </div>
            </div>
        @empty
            <p>{{ __('No photos where found. Try adding some.') }}</p>
        @endforelse
    </div>
</div>

{{-- input images --}}
<div class="mb-3">
    <label for="formFileMultiple" class="form-label">{{ __('Upload Photos') }}</label>
    <input class="form-control" type="file" id="formFileMultiple" name="images[]" multiple
        value="{{ old('img_path') }}">
</div>

<x-primary-button>{{ $btnText }}</x-primary-button>

{{-- Image Viewer Modal --}}
<div class="modal fade" id="image-viewer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="img-thumbnail" src="" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
