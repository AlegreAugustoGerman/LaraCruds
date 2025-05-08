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
            $table->string('nombre');
            $table->double('precio', 15, 8)->nullable(); // Precio con 15 dígitos en total y 8 decimales
            $table->text('descripcion')->nullable();
            $table->binary('imagen')->nullable();
            $table->double('cantidad', 15, 8)->nullable();

/*

            provider_id: Identificador del proveedor del producto (requerido, clave foránea a la tabla providers).
            price: Precio de compra del producto (requerido, decimal).
            price_with_markup: Precio de venta del producto (decimal, calculado a partir de price y el porcentaje de aumento).
            quantity: Cantidad disponible del producto (requerido, entero).
            category: Categoría del producto (opcional).
            image: Imagen del producto (opcional). */
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
