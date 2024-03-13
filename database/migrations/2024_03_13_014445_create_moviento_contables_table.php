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
        Schema::create('moviento_contables', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_movimiento');
            $table->string('concepto');
            $table->date('fecha_movimiento');
            $table->decimal('monto', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moviento_contables');
    }
};
