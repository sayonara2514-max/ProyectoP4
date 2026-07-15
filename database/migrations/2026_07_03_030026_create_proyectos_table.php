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
    Schema::create('proyectos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->decimal('presupuesto', 14, 2)->default(0);
        $table->date('fecha_inicio');
        $table->date('fecha_fin');
        $table->enum('estado', ['formulado','en_revision','aprobado'])->default('formulado');
        $table->foreignId('programa_id')->constrained('programas')->cascadeOnDelete();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
