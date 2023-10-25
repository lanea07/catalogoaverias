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
                <td><b>{{ __('Current Price') }}</b></td>
                <td>
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
                </td>
            </tr>
            <tr>
                <td><b>{{ __('Discount') }}</b></td>
                <td>
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


<input type="hidden" name="id" value="{{ $product->id }}">
<x-primary-button>{{ $btnText }}</x-primary-button>