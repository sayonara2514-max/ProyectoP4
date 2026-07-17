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
    Schema::table('objetivo_estrategicos', function (Blueprint $table) {
        $table->foreignId('entidad_id')->nullable()->constrained('entidads')->nullOnDelete()->after('plan_id');
        $table->enum('estado', ['Activo','Inactivo'])->default('Activo')->after('entidad_id');
        $table->date('fecha_registro')->nullable()->after('estado');
    });
}
public function down(): void {
    Schema::table('objetivo_estrategicos', function (Blueprint $table) {
        $table->dropForeign(['entidad_id']);
        $table->dropColumn(['entidad_id','estado','fecha_registro']);
    });
}
};
