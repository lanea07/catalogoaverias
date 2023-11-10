<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->double('ticket')->unique();
            $table->text('queue');
            $table->text('ean');
            $table->text('negocio')->nullable();
            $table->text('departamento')->nullable();
            $table->text('grupo')->nullable();
            $table->text('categoria')->nullable();
            $table->text('subcategoria')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('referencia')->nullable();
            $table->text('marca')->nullable();
            $table->text('medida')->nullable();
            $table->text('color')->nullable();
            $table->double('costo');
            $table->text('nit_proveedor')->nullable();
            $table->text('razon_social_proveedor')->nullable();
            $table->text('fecha_inicio_gestion');
            $table->text('dias_transcurridos');
            $table->text('img_path')->nullable();
            $table->text('garantia_expira')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
