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
    Schema::table('proyectos', function (Blueprint $table) {
        $table->string('codigo', 30)->nullable()->after('id');
        $table->text('descripcion')->nullable()->after('nombre');
        $table->enum('tipo', ['Inversion','Preinversion','Estudio','Cooperacion'])->default('Inversion')->after('descripcion');
        $table->string('sector_intervencion')->nullable()->after('tipo');
        $table->enum('fuente_financiamiento', ['Recursos Fiscales','Cooperacion Internacional','Credito Externo','Recursos Propios'])->default('Recursos Fiscales')->after('sector_intervencion');
        $table->decimal('presupuesto_ejecutado', 14, 2)->default(0)->after('presupuesto');
        $table->string('ubicacion_geografica')->nullable()->after('presupuesto_ejecutado');
    });
}
public function down(): void {
    Schema::table('proyectos', function (Blueprint $table) {
        $table->dropColumn(['codigo','descripcion','tipo','sector_intervencion','fuente_financiamiento','presupuesto_ejecutado','ubicacion_geografica']);
    });
}
};
