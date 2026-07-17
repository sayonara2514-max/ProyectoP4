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
    Schema::create('plan_ods', function (Blueprint $table) {
        $table->id();
        $table->foreignId('plan_id')->constrained('planes')->cascadeOnDelete();
        $table->foreignId('ods_id')->constrained('ods')->cascadeOnDelete();
        $table->timestamps();
    });
}
public function down(): void {
    Schema::dropIfExists('plan_ods');
}
};
