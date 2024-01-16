@csrf

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('name') is-invalid @else border-0 @enderror" id="name"
        placeholder="name" name="name" value="{{ old('name', $user->name) }}" required
        {{ request()->routeIs('users.edit') ? 'readonly' : '' }}>
    <label for="name">{{ __('Name') }}*</label>
</div>

<div class="form-floating mb-3">
    <input type="email" class="form-control @error('email') is-invalid @else border-0 @enderror" id="email"
        placeholder="email" name="email" value="{{ old('email', $user->email) }}" required>
    <label for="email">{{ __('Email') }}*</label>
</div>

<div class="form-floating mb-3">
    <input type="password" class="form-control @error('password') is-invalid @else border-0 @enderror" id="password"
        placeholder="password" name="password">
    <label for="password">{{ __('Password') }}</label>
</div>
{{ old('role') }}
<div class="form-floating mb-3">
    <select class="form-select" id="role" name="role">
        @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </select>
    <label for="name">{{ trans_choice('Role|Roles', 1) }}*</label>
</div>

<div class="form-floating mb-3">
    <select class="form-select" id="valid_id" name="valid_id">
        <option {{ old('valid_id', $user->valid_id) == 1 ? "selected" : "" }} value="1">{{ __('Valid') }}</option>
        <option {{ old('valid_id', $user->valid_id) == 0 ? "selected" : "" }} value="0">{{ __('Invalid') }}</option>
    </select>
    <label for="name">{{ __('Valid') }}*</label>
</div>

<x-primary-button>{{ $btnText }}</x-primary-button>