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
    Schema::create('plan_actividades', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->string('responsable')->nullable();
        $table->string('unidad_responsable')->nullable();
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->foreignId('plan_id')->constrained('planes')->cascadeOnDelete();
        $table->timestamps();
    });
}
public function down(): void {
    Schema::dropIfExists('plan_actividades');
}
};
