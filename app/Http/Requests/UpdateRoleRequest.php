<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'valid_id' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('The name is required.'),
            'name.unique' => __('The name is already taken.'),
            'valid_id.required' => __('The valid_id is required.'),
            'valid_id.boolean' => __('The valid_id must be a boolean value.'),
        ];
    }
}
