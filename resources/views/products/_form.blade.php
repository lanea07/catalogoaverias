@csrf


<div class="form-floating mb-3">
    <input type="number" class="form-control @error('ticket') is-invalid @else border-0 @enderror" id="ticket"
        placeholder="ticket" name="ticket" value="{{ old('ticket', $product->ticket) }}" required>
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
    <label for="costo">{{ __('Cost') }}</label>
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
    <input type="number" class="form-control @error('dias_transcurridos') is-invalid @else border-0 @enderror" id="dias_transcurridos"
        placeholder="dias_transcurridos" name="dias_transcurridos" value="{{ old('dias_transcurridos', $product->dias_transcurridos) }}" required>
    <label for="dias_transcurridos">{{ __('Running Days') }}*</label>
</div>

{{-- input images --}}
<div class="mb-3">
    <label for="formFileMultiple" class="form-label">{{ __('Images') }}</label>
    <input class="form-control" type="file" id="formFileMultiple" multiple>
  </div>
  
<x-primary-button>{{ $btnText }}</x-primary-button>


