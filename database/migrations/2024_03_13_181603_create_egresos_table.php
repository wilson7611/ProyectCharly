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
        Schema::create('egresos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_egreso');
            $table->string('concepto');
            $table->decimal('monto', 10, 2);
            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')
                ->references('id')
                ->on('compras')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('movimiento_contable_id');
            $table->foreign('movimiento_contable_id')
                ->references('id')
                ->on('moviento_contables')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egresos');
    }
};
