<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('plans', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->date('periodo_inicio');
        $table->date('periodo_fin');
        $table->enum('estado', ['borrador','activo','cerrado'])->default('borrador');
        $table->foreignId('entidad_id')->constrained('entidads')->cascadeOnDelete();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
