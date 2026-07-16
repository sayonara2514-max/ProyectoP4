<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Ods;

class OdsSeeder extends Seeder {
    public function run(): void {
        $ods = [
            ['codigo'=>'ODS1','nombre'=>'Fin de la Pobreza','descripcion'=>'Poner fin a la pobreza en todas sus formas y en todo el mundo.'],
            ['codigo'=>'ODS2','nombre'=>'Hambre Cero','descripcion'=>'Poner fin al hambre, lograr la seguridad alimentaria y la mejora de la nutricion y promover la agricultura sostenible.'],
            ['codigo'=>'ODS3','nombre'=>'Salud y Bienestar','descripcion'=>'Garantizar una vida sana y promover el bienestar de todos a todas las edades.'],
            ['codigo'=>'ODS4','nombre'=>'Educacion de Calidad','descripcion'=>'Garantizar una educacion inclusiva y equitativa de calidad y promover oportunidades de aprendizaje permanente para todos.'],
            ['codigo'=>'ODS5','nombre'=>'Igualdad de Genero','descripcion'=>'Lograr la igualdad de genero y empoderar a todas las mujeres y las ninas.'],
            ['codigo'=>'ODS6','nombre'=>'Agua Limpia y Saneamiento','descripcion'=>'Garantizar la disponibilidad y la gestion sostenible del agua y el saneamiento para todos.'],
            ['codigo'=>'ODS7','nombre'=>'Energia Asequible y No Contaminante','descripcion'=>'Garantizar el acceso a una energia asequible, fiable, sostenible y moderna para todos.'],
            ['codigo'=>'ODS8','nombre'=>'Trabajo Decente y Crecimiento Economico','descripcion'=>'Promover el crecimiento economico sostenido, inclusivo y sostenible, el empleo pleno y productivo y el trabajo decente para todos.'],
            ['codigo'=>'ODS9','nombre'=>'Industria, Innovacion e Infraestructura','descripcion'=>'Construir infraestructuras resilientes, promover la industrializacion inclusiva y sostenible y fomentar la innovacion.'],
            ['codigo'=>'ODS10','nombre'=>'Reduccion de las Desigualdades','descripcion'=>'Reducir la desigualdad en los paises y entre ellos.'],
            ['codigo'=>'ODS11','nombre'=>'Ciudades y Comunidades Sostenibles','descripcion'=>'Lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes y sostenibles.'],
            ['codigo'=>'ODS12','nombre'=>'Produccion y Consumo Responsables','descripcion'=>'Garantizar modalidades de consumo y produccion sostenibles.'],
            ['codigo'=>'ODS13','nombre'=>'Accion por el Clima','descripcion'=>'Adoptar medidas urgentes para combatir el cambio climatico y sus efectos.'],
            ['codigo'=>'ODS14','nombre'=>'Vida Submarina','descripcion'=>'Conservar y utilizar sosteniblemente los oceanos, los mares y los recursos marinos para el desarrollo sostenible.'],
            ['codigo'=>'ODS15','nombre'=>'Vida de Ecosistemas Terrestres','descripcion'=>'Proteger, restablecer y promover el uso sostenible de los ecosistemas terrestres.'],
            ['codigo'=>'ODS16','nombre'=>'Paz, Justicia e Instituciones Solidas','descripcion'=>'Promover sociedades pacificas e inclusivas para el desarrollo sostenible, facilitar el acceso a la justicia para todos.'],
            ['codigo'=>'ODS17','nombre'=>'Alianzas para Lograr los Objetivos','descripcion'=>'Fortalecer los medios de implementacion y revitalizar la Alianza Mundial para el Desarrollo Sostenible.'],
        ];
        foreach ($ods as $item) { Ods::create($item); }
    }
}