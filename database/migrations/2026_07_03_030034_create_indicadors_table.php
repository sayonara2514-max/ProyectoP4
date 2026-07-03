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
    Schema::create('indicadors', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('formula')->nullable();
        $table->string('unidad_medida', 30)->nullable();
        $table->foreignId('meta_id')->constrained('metas')->cascadeOnDelete();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicadors');
    }
};
