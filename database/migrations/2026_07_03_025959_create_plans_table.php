<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('periodo_inicio');
            $table->date('periodo_fin');
            $table->enum('estado', ['formulado','en_revision','validado','aprobado'])->default('formulado');
            $table->text('observacion')->nullable();
            $table->foreignId('entidad_id')->constrained('entidads')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('planes');
    }
};