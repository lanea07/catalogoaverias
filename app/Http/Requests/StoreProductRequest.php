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
            'negocio' => 'required_unless:negocio,null',
            'departamento' => 'required_unless:departamento,null',
            'grupo' => 'required_unless:grupo,null',
            'categoria' => 'required_unless:categoria,null',
            'subcategoria' => 'required_unless:subcategoria,null',
            'descripcion' => 'required_unless:descripcion,null',
            'referencia' => 'required_unless:referencia,null',
            'marca' => 'required_unless:marca,null',
            'medida' => 'required_unless:medida,null',
            'color' => 'required_unless:color,null',
            'costo' => 'required',
            'nit_proveedor' => 'required_unless:nit_proveedor,null',
            'razon_social_proveedor' => 'required_unless:razon_social_proveedor,null',
            'fecha_inicio_gestion' => 'required',
            'dias_transcurridos' => 'required|numeric|gte:0'
        ];
    }
}
