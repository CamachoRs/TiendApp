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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marca_id')->constrained()->onDelete('cascade');
            $table->string('nombre');
            $table->enum('unidad_medida', ['Unidad', 'Display', 'Caja']);
            $table->text('observaciones');
            $table->integer('cantidad_inventario');
            $table->date('fecha_embarque');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
