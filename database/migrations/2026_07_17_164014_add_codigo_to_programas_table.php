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
    Schema::table('programas', function (Blueprint $table) {
        $table->string('codigo', 30)->nullable()->after('id');
        $table->text('descripcion')->nullable()->after('nombre');
        $table->string('responsable')->nullable()->after('descripcion');
    });
    }
    public function down(): void {
        Schema::table('programas', function (Blueprint $table) {
            $table->dropColumn(['codigo','descripcion','responsable','observaciones']);
        });
    }
    };
