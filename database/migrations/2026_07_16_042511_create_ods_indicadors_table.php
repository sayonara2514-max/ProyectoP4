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
    Schema::create('ods_indicadores', function (Blueprint $table) {
        $table->id();
        $table->string('codigo', 30);
        $table->text('descripcion');
        $table->foreignId('ods_meta_id')->constrained('ods_metas')->cascadeOnDelete();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ods_indicadors');
    }
};
