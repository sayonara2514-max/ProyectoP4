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
    Schema::table('plan_actividades', function (Blueprint $table) {
        $table->enum('tipo', ['Inversion','Capacitacion','Gestion','Regulacion','Coordinacion'])->default('Gestion')->after('descripcion');
        $table->enum('prioridad', ['Alta','Media','Baja'])->default('Media')->after('tipo');
        $table->decimal('presupuesto', 14, 2)->default(0)->after('prioridad');
        $table->integer('porcentaje_avance')->default(0)->after('presupuesto');
        $table->enum('estado_actividad', ['Pendiente','En Ejecucion','Completada','Suspendida'])->default('Pendiente')->after('porcentaje_avance');
        $table->string('unidad_responsable')->nullable()->after('responsable');
    });
}
public function down(): void {
    Schema::table('plan_actividades', function (Blueprint $table) {
        $table->dropColumn(['tipo','prioridad','presupuesto','porcentaje_avance','estado_actividad','unidad_responsable']);
    });
}
};
