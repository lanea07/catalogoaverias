@csrf

<div class="mb-3">

    <p>Este es el producto que elegiste</p>
    <table class="table table-sm table-borderless table-hover">
        <tbody>
            <tr>
                <td><b>{{ __('Description') }}</b></td>
                <td>{{ $product->descripcion }}</td>
            </tr>
            <tr>
                <td><b>{{ __('Reference') }}</b></td>
                <td>{{ $product->referencia }}</td>
            </tr>
            <tr>
                <td><b>{{ __('Brand') }}</b></td>
                <td>{{ $product->marca }}</td>
            </tr>
            <tr>
                <td><b>{{ __('Color') }}</b></td>
                <td>{{ $product->color }}</td>
            </tr>
            <tr>
                <td><b>{{ __('Original Price') }}</b></td>
                <td>{{ toCurrency($product->costo, 'COP') }}</td>
            </tr>
            <tr>
                <td><b>{{ __('Current Cost') }}</b></td>
                <td>
                    {{ calculateCostWithDiscount($product->costo, $product->dias_transcurridos, $product->custom_descuento) }}
                </td>
            </tr>
            <tr>
                <td><b>{{ __('Discount') }}</b></td>
                <td>
                    {{ calculateDiscount($product->costo, $product->dias_transcurridos, $product->custom_descuento) }}
                </td>
            </tr>
        </tbody>
    </table>

</div>

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @else border-0 @enderror" id="name"
                placeholder="name" name="name" value="{{ old('name') }}" required>
            <label for="name">{{ __('Name') }}*</label>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="form-floating mb-3">
            <input type="phone" class="form-control @error('phone') is-invalid @else border-0 @enderror" id="phone"
                placeholder="phone" name="phone" value="{{ old('phone') }}" required>
            <label for="phone">{{ __('Mobile') }}*</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @else border-0 @enderror" id="email"
                placeholder="email" name="email" value="{{ old('email') }}" required>
            <label for="email">{{ __('Email') }}*</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-floating mb-3">
            <textarea type="" class="form-control border-0" id="notes"
                placeholder="notes" name="notes" rows=3>{{ old('notes') }}</textarea>
            <label for="notes">{{ __('Notes') }}</label>
        </div>
    </div>
</div>

<p><a target="_blank" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="https://www.flamingo.com.co/institucional/politica-tratamiento-datos" class="alert-link">{{ __('Data Processing Policies') }}</a></p>    

<input type="hidden" name="id" value="{{ $product->id }}">
<x-primary-button>{{ $btnText }}</x-primary-button>