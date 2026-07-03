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
    Schema::create('metas', function (Blueprint $table) {
        $table->id();
        $table->text('descripcion');
        $table->decimal('valor_objetivo', 10, 2);
        $table->string('periodo', 20);
        $table->foreignId('proyecto_id')->constrained('proyectos')->cascadeOnDelete();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metas');
    }
};
