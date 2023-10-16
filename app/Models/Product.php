<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket',
        'queue',
        'ean',
        'negocio',
        'departamento',
        'grupo',
        'categoria',
        'subcategoria',
        'descripcion',
        'referencia',
        'marca',
        'medida',
        'color',
        'costo',
        'nit_proveedor',
        'razon_social_proveedor',
        'fecha_inicio_gestion',
        'dias_transcurridos',
        'img_path',
        'observaciones'
    ];
}
