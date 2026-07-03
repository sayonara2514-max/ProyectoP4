<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Ods;

class OdsSeeder extends Seeder {
    public function run(): void {
        $ods = [
            ['codigo' => 'ODS1', 'nombre' => 'Fin de la pobreza', 'descripcion' => 'Erradicar la pobreza en todas sus formas'],
            ['codigo' => 'ODS2', 'nombre' => 'Hambre cero', 'descripcion' => 'Seguridad alimentaria y agricultura sostenible'],
            ['codigo' => 'ODS3', 'nombre' => 'Salud y bienestar', 'descripcion' => 'Garantizar vida sana y promover bienestar'],
            ['codigo' => 'ODS4', 'nombre' => 'Educación de calidad', 'descripcion' => 'Educación inclusiva, equitativa y de calidad'],
            ['codigo' => 'ODS8', 'nombre' => 'Trabajo decente y crecimiento económico', 'descripcion' => 'Crecimiento económico sostenido e inclusivo'],
            ['codigo' => 'ODS9', 'nombre' => 'Industria, innovación e infraestructura', 'descripcion' => 'Infraestructura resiliente e innovación'],
            ['codigo' => 'ODS16', 'nombre' => 'Paz, justicia e instituciones sólidas', 'descripcion' => 'Instituciones eficaces, responsables e inclusivas'],
            ['codigo' => 'ODS17', 'nombre' => 'Alianzas para lograr los objetivos', 'descripcion' => 'Medios de implementación y alianza mundial'],
        ];
        foreach ($ods as $item) { Ods::create($item); }
    }
}