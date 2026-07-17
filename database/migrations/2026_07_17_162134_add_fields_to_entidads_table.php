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
    Schema::table('entidads', function (Blueprint $table) {
        $table->string('codigo', 30)->nullable()->after('id');
        $table->string('sector', 100)->nullable()->after('estructura');
        $table->string('subsector', 100)->nullable()->after('sector');
        $table->enum('nivel_gobierno', ['Nacional','Provincial','Municipal','Parroquial'])->default('Nacional')->after('subsector');
        $table->enum('estado', ['Activo','Inactivo'])->default('Activo')->after('nivel_gobierno');
        $table->text('vision')->nullable()->after('mision');
    });
}
public function down(): void {
    Schema::table('entidads', function (Blueprint $table) {
        $table->dropColumn(['codigo','sector','subsector','nivel_gobierno','estado','vision']);
    });
}
};
