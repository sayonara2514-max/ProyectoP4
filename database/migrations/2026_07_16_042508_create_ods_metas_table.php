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
    Schema::create('ods_metas', function (Blueprint $table) {
        $table->id();
        $table->string('codigo', 20);
        $table->text('descripcion');
        $table->foreignId('ods_id')->constrained('ods')->cascadeOnDelete();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ods_metas');
    }
};
