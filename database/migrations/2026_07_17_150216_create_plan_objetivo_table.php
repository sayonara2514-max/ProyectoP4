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
    Schema::create('plan_objetivo', function (Blueprint $table) {
        $table->id();
        $table->foreignId('plan_id')->constrained('planes')->cascadeOnDelete();
        $table->foreignId('objetivo_estrategico_id')->constrained('objetivo_estrategicos')->cascadeOnDelete();
        $table->timestamps();
    });
}
public function down(): void {
    Schema::dropIfExists('plan_objetivo');
}
};
