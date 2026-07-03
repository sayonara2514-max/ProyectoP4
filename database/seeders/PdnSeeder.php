<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Pdn;

class PdnSeeder extends Seeder {
    public function run(): void {
        $pdns = [
            ['codigo' => 'EJE1', 'nombre' => 'Derechos para todos durante toda la vida'],
            ['codigo' => 'EJE2', 'nombre' => 'Economía al servicio de la sociedad'],
            ['codigo' => 'EJE3', 'nombre' => 'Más sociedad, mejor Estado'],
            ['codigo' => 'OBJ1.1', 'nombre' => 'Garantizar una vida digna con iguales oportunidades'],
            ['codigo' => 'OBJ2.1', 'nombre' => 'Desarrollar las capacidades productivas'],
            ['codigo' => 'OBJ3.1', 'nombre' => 'Fomentar la participación ciudadana'],
        ];
        foreach ($pdns as $item) { Pdn::create($item); }
    }
}