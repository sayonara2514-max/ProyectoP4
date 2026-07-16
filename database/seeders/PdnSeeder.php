<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Pdn;

class PdnSeeder extends Seeder {
    public function run(): void {
        $pdns = [
            ['codigo'=>'EJE1','nombre'=>'Eje Social'],
            ['codigo'=>'EJE1-OBJ1','nombre'=>'Garantizar el acceso universal a servicios de salud de calidad'],
            ['codigo'=>'EJE1-OBJ2','nombre'=>'Asegurar educacion de calidad e inclusiva en todos los niveles'],
            ['codigo'=>'EJE1-OBJ3','nombre'=>'Reducir la pobreza y proteger a grupos vulnerables'],
            ['codigo'=>'EJE1-OBJ4','nombre'=>'Promover la igualdad de genero y los derechos de las mujeres'],
            ['codigo'=>'EJE1-OBJ5','nombre'=>'Fortalecer la seguridad ciudadana y el acceso a la justicia'],
            ['codigo'=>'EJE2','nombre'=>'Eje Economico, Productivo y Empleo'],
            ['codigo'=>'EJE2-OBJ1','nombre'=>'Impulsar el crecimiento economico sostenible e inclusivo'],
            ['codigo'=>'EJE2-OBJ2','nombre'=>'Generar empleo digno y reducir el desempleo'],
            ['codigo'=>'EJE2-OBJ3','nombre'=>'Diversificar la matriz productiva con valor agregado'],
            ['codigo'=>'EJE2-OBJ4','nombre'=>'Fomentar la inversion nacional y extranjera'],
            ['codigo'=>'EJE2-OBJ5','nombre'=>'Apoyar a los sectores agricola, turistico y exportador'],
            ['codigo'=>'EJE3','nombre'=>'Eje Ambiente, Agua, Energia y Conectividad'],
            ['codigo'=>'EJE3-OBJ1','nombre'=>'Garantizar el acceso al agua segura y saneamiento'],
            ['codigo'=>'EJE3-OBJ2','nombre'=>'Promover la transicion energetica y energias renovables'],
            ['codigo'=>'EJE3-OBJ3','nombre'=>'Proteger el medio ambiente y la biodiversidad'],
            ['codigo'=>'EJE3-OBJ4','nombre'=>'Ampliar la conectividad digital y telecomunicaciones'],
            ['codigo'=>'EJE3-OBJ5','nombre'=>'Desarrollar infraestructura vial, portuaria y aeroportuaria'],
            ['codigo'=>'EJE4','nombre'=>'Eje Institucional'],
            ['codigo'=>'EJE4-OBJ1','nombre'=>'Fortalecer la institucionalidad publica y la gobernanza'],
            ['codigo'=>'EJE4-OBJ2','nombre'=>'Mejorar la gestion y transparencia del Estado'],
            ['codigo'=>'EJE4-OBJ3','nombre'=>'Impulsar la descentralizacion y autonomia territorial'],
            ['codigo'=>'EJE4-OBJ4','nombre'=>'Modernizar los servicios publicos digitales'],
            ['codigo'=>'EJE4-OBJ5','nombre'=>'Combatir la corrupcion y fortalecer el control'],
            ['codigo'=>'EJE5','nombre'=>'Eje Gestion de Riesgos'],
            ['codigo'=>'EJE5-OBJ1','nombre'=>'Fortalecer la gestion integral de riesgos y desastres'],
            ['codigo'=>'EJE5-OBJ2','nombre'=>'Desarrollar sistemas de alerta temprana'],
            ['codigo'=>'EJE5-OBJ3','nombre'=>'Promover la resiliencia ante el cambio climatico'],
            ['codigo'=>'EJE5-OBJ4','nombre'=>'Coordinar la respuesta interinstitucional ante emergencias'],
        ];
        foreach ($pdns as $item) { Pdn::create($item); }
    }
}