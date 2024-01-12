@csrf

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('name') is-invalid @else border-0 @enderror" id="name"
        placeholder="name" name="name" value="{{ old('name', $role->name) }}" required>
    <label for="name">{{ __('Name') }}*</label>
</div>


<div class="form-floating mb-3">
    <select class="form-select" id="valid_id" name="valid_id">
        <option {{ old('valid_id', $role->valid_id) == 1 ? "selected" : "" }} value="1">{{ __('Valid') }}</option>
        <option {{ old('valid_id', $role->valid_id) == 0 ? "selected" : "" }} value="0">{{ __('Invalid') }}</option>
    </select>
    <label for="name">{{ __('Valid') }}*</label>
</div>

<x-primary-button>{{ $btnText }}</x-primary-button>