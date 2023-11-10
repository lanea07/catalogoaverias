<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ticket' => 'required|numeric|gt:0',
            'queue' => 'required',
            'ean' => 'required|numeric|gt:0',
            'negocio' => 'nullable',
            'departamento' => 'nullable',
            'grupo' => 'nullable',
            'categoria' => 'required',
            'subcategoria' => 'nullable',
            'descripcion' => 'nullable',
            'referencia' => 'nullable',
            'marca' => 'nullable',
            'medida' => 'nullable',
            'color' => 'nullable',
            'costo' => 'required',
            'nit_proveedor' => 'nullable',
            'razon_social_proveedor' => 'nullable',
            'fecha_inicio_gestion' => 'required',
            'dias_transcurridos' => 'required|numeric|gte:0',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg',
            'garantia_expira' => 'nullable',
            'observaciones' => 'nullable'
        ];
    }
}
