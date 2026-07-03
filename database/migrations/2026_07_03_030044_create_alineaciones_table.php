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
    Schema::create('alineaciones', function (Blueprint $table) {
        $table->id();
        $table->foreignId('objetivo_estrategico_id')->constrained('objetivo_estrategicos')->cascadeOnDelete();
        $table->foreignId('ods_id')->nullable()->constrained('ods')->nullOnDelete();
        $table->foreignId('pdn_id')->nullable()->constrained('pdns')->nullOnDelete();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alineaciones');
    }
};
