<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\OdsMeta;
use App\Models\Ods;

class OdsMetaSeeder extends Seeder {
    public function run(): void {
        $metas = [
            // ODS 1 - Fin de la Pobreza
            ['ods_codigo'=>'ODS1','codigo'=>'1.1','descripcion'=>'Para 2030, erradicar la pobreza extrema para todas las personas en el mundo, actualmente medida por un ingreso por persona inferior a 1,25 dolares de los Estados Unidos al dia'],
            ['ods_codigo'=>'ODS1','codigo'=>'1.2','descripcion'=>'Para 2030, reducir al menos a la mitad la proporcion de hombres, mujeres y ninos de todas las edades que viven en la pobreza en todas sus dimensiones con arreglo a las definiciones nacionales'],
            ['ods_codigo'=>'ODS1','codigo'=>'1.3','descripcion'=>'Implementar a nivel nacional sistemas y medidas apropiadas de proteccion social para todos'],
            ['ods_codigo'=>'ODS1','codigo'=>'1.4','descripcion'=>'Para 2030, garantizar que todos los hombres y mujeres, en particular los pobres y los vulnerables, tengan los mismos derechos a los recursos economicos'],
            ['ods_codigo'=>'ODS1','codigo'=>'1.5','descripcion'=>'Para 2030, fomentar la resiliencia de los pobres y las personas que se encuentran en situaciones de vulnerabilidad'],
            // ODS 2 - Hambre Cero
            ['ods_codigo'=>'ODS2','codigo'=>'2.1','descripcion'=>'Para 2030, poner fin al hambre y asegurar el acceso de todas las personas, en particular los pobres y las personas en situaciones de vulnerabilidad, a una alimentacion sana, nutritiva y suficiente durante todo el ano'],
            ['ods_codigo'=>'ODS2','codigo'=>'2.2','descripcion'=>'Para 2030, poner fin a todas las formas de malnutricion'],
            ['ods_codigo'=>'ODS2','codigo'=>'2.3','descripcion'=>'Para 2030, duplicar la productividad agricola y los ingresos de los productores de alimentos en pequena escala'],
            ['ods_codigo'=>'ODS2','codigo'=>'2.4','descripcion'=>'Para 2030, asegurar la sostenibilidad de los sistemas de produccion de alimentos y aplicar practicas agricolas resilientes'],
            // ODS 3 - Salud y Bienestar
            ['ods_codigo'=>'ODS3','codigo'=>'3.1','descripcion'=>'Para 2030, reducir la tasa mundial de mortalidad materna a menos de 70 por cada 100.000 nacidos vivos'],
            ['ods_codigo'=>'ODS3','codigo'=>'3.2','descripcion'=>'Para 2030, poner fin a las muertes evitables de recien nacidos y de ninos menores de 5 anos'],
            ['ods_codigo'=>'ODS3','codigo'=>'3.3','descripcion'=>'Para 2030, poner fin a las epidemias del SIDA, la tuberculosis, la malaria y las enfermedades tropicales desatendidas'],
            ['ods_codigo'=>'ODS3','codigo'=>'3.4','descripcion'=>'Para 2030, reducir en un tercio la mortalidad prematura por enfermedades no transmisibles'],
            ['ods_codigo'=>'ODS3','codigo'=>'3.8','descripcion'=>'Lograr la cobertura sanitaria universal, en particular la proteccion contra los riesgos financieros'],
            // ODS 4 - Educacion de Calidad
            ['ods_codigo'=>'ODS4','codigo'=>'4.1','descripcion'=>'Para 2030, asegurar que todas las ninas y todos los ninos terminen la ensenanza primaria y secundaria'],
            ['ods_codigo'=>'ODS4','codigo'=>'4.2','descripcion'=>'Para 2030, asegurar que todas las ninas y todos los ninos tengan acceso a servicios de atencion y desarrollo en la primera infancia'],
            ['ods_codigo'=>'ODS4','codigo'=>'4.3','descripcion'=>'Para 2030, asegurar el acceso igualitario de todos los hombres y las mujeres a una formacion tecnica, profesional y superior de calidad'],
            ['ods_codigo'=>'ODS4','codigo'=>'4.4','descripcion'=>'Para 2030, aumentar considerablemente el numero de jovenes y adultos que tienen las competencias necesarias para acceder al empleo'],
            // ODS 5 - Igualdad de Genero
            ['ods_codigo'=>'ODS5','codigo'=>'5.1','descripcion'=>'Poner fin a todas las formas de discriminacion contra todas las mujeres y las ninas en todo el mundo'],
            ['ods_codigo'=>'ODS5','codigo'=>'5.2','descripcion'=>'Eliminar todas las formas de violencia contra todas las mujeres y las ninas en los ambitos publico y privado'],
            ['ods_codigo'=>'ODS5','codigo'=>'5.5','descripcion'=>'Asegurar la participacion plena y efectiva de las mujeres y la igualdad de oportunidades de liderazgo a todos los niveles'],
            // ODS 6 - Agua Limpia
            ['ods_codigo'=>'ODS6','codigo'=>'6.1','descripcion'=>'Para 2030, lograr el acceso universal y equitativo al agua potable a un precio asequible para todos'],
            ['ods_codigo'=>'ODS6','codigo'=>'6.2','descripcion'=>'Para 2030, lograr el acceso a servicios de saneamiento e higiene adecuados y equitativos para todos'],
            ['ods_codigo'=>'ODS6','codigo'=>'6.3','descripcion'=>'Para 2030, mejorar la calidad del agua reduciendo la contaminacion'],
            // ODS 7 - Energia
            ['ods_codigo'=>'ODS7','codigo'=>'7.1','descripcion'=>'Para 2030, garantizar el acceso universal a servicios energeticos asequibles, fiables y modernos'],
            ['ods_codigo'=>'ODS7','codigo'=>'7.2','descripcion'=>'Para 2030, aumentar considerablemente la proporcion de energia renovable en el conjunto de fuentes energeticas'],
            ['ods_codigo'=>'ODS7','codigo'=>'7.3','descripcion'=>'Para 2030, duplicar la tasa mundial de mejora de la eficiencia energetica'],
            // ODS 8 - Trabajo Decente
            ['ods_codigo'=>'ODS8','codigo'=>'8.1','descripcion'=>'Mantener el crecimiento economico per capita de conformidad con las circunstancias nacionales'],
            ['ods_codigo'=>'ODS8','codigo'=>'8.5','descripcion'=>'Para 2030, lograr el empleo pleno y productivo y el trabajo decente para todas las mujeres y los hombres'],
            ['ods_codigo'=>'ODS8','codigo'=>'8.6','descripcion'=>'Para 2020, reducir considerablemente la proporcion de jovenes que no estan empleados y no cursan estudios ni reciben capacitacion'],
            // ODS 9 - Industria
            ['ods_codigo'=>'ODS9','codigo'=>'9.1','descripcion'=>'Desarrollar infraestructuras fiables, sostenibles, resilientes y de calidad para apoyar el desarrollo economico y el bienestar humano'],
            ['ods_codigo'=>'ODS9','codigo'=>'9.2','descripcion'=>'Promover una industrializacion inclusiva y sostenible y aumentar significativamente la contribucion de la industria al empleo'],
            ['ods_codigo'=>'ODS9','codigo'=>'9.4','descripcion'=>'Para 2030, modernizar la infraestructura y reconvertir las industrias para que sean sostenibles'],
            // ODS 10 - Reduccion Desigualdades
            ['ods_codigo'=>'ODS10','codigo'=>'10.1','descripcion'=>'Para 2030, lograr progresivamente y mantener el crecimiento de los ingresos del 40% mas pobre de la poblacion a una tasa superior a la media nacional'],
            ['ods_codigo'=>'ODS10','codigo'=>'10.2','descripcion'=>'Para 2030, potenciar y promover la inclusion social, economica y politica de todas las personas'],
            ['ods_codigo'=>'ODS10','codigo'=>'10.3','descripcion'=>'Garantizar la igualdad de oportunidades y reducir la desigualdad de resultados'],
            // ODS 11 - Ciudades Sostenibles
            ['ods_codigo'=>'ODS11','codigo'=>'11.1','descripcion'=>'Para 2030, asegurar el acceso de todas las personas a viviendas y servicios basicos adecuados, seguros y asequibles'],
            ['ods_codigo'=>'ODS11','codigo'=>'11.2','descripcion'=>'Para 2030, proporcionar acceso a sistemas de transporte seguros, asequibles, accesibles y sostenibles para todos'],
            ['ods_codigo'=>'ODS11','codigo'=>'11.3','descripcion'=>'Para 2030, aumentar la urbanizacion inclusiva y sostenible y la capacidad para la planificacion y la gestion participativas'],
            // ODS 12 - Produccion Responsable
            ['ods_codigo'=>'ODS12','codigo'=>'12.1','descripcion'=>'Aplicar el Marco Decenal de Programas sobre Modalidades de Consumo y Produccion Sostenibles'],
            ['ods_codigo'=>'ODS12','codigo'=>'12.2','descripcion'=>'Para 2030, lograr la gestion sostenible y el uso eficiente de los recursos naturales'],
            ['ods_codigo'=>'ODS12','codigo'=>'12.5','descripcion'=>'Para 2030, reducir considerablemente la generacion de desechos mediante actividades de prevencion, reduccion, reciclado y reutilizacion'],
            // ODS 13 - Accion Climatica
            ['ods_codigo'=>'ODS13','codigo'=>'13.1','descripcion'=>'Fortalecer la resiliencia y la capacidad de adaptacion a los riesgos relacionados con el clima y los desastres naturales en todos los paises'],
            ['ods_codigo'=>'ODS13','codigo'=>'13.2','descripcion'=>'Incorporar medidas relativas al cambio climatico en las politicas, estrategias y planes nacionales'],
            ['ods_codigo'=>'ODS13','codigo'=>'13.3','descripcion'=>'Mejorar la educacion, la sensibilizacion y la capacidad humana e institucional respecto de la mitigacion del cambio climatico'],
            // ODS 14 - Vida Submarina
            ['ods_codigo'=>'ODS14','codigo'=>'14.1','descripcion'=>'Para 2025, prevenir y reducir significativamente la contaminacion marina de todo tipo'],
            ['ods_codigo'=>'ODS14','codigo'=>'14.2','descripcion'=>'Para 2020, gestionar y proteger sosteniblemente los ecosistemas marinos y costeros'],
            ['ods_codigo'=>'ODS14','codigo'=>'14.3','descripcion'=>'Minimizar y abordar los efectos de la acidificacion de los oceanos'],
            // ODS 15 - Vida Terrestre
            ['ods_codigo'=>'ODS15','codigo'=>'15.1','descripcion'=>'Para 2020, asegurar la conservacion, el restablecimiento y el uso sostenible de los ecosistemas terrestres y de agua dulce'],
            ['ods_codigo'=>'ODS15','codigo'=>'15.2','descripcion'=>'Para 2020, promover la gestion sostenible de todos los tipos de bosques'],
            ['ods_codigo'=>'ODS15','codigo'=>'15.3','descripcion'=>'Para 2030, luchar contra la desertificacion, rehabilitar las tierras y los suelos degradados'],
            // ODS 16 - Paz y Justicia
            ['ods_codigo'=>'ODS16','codigo'=>'16.1','descripcion'=>'Reducir significativamente todas las formas de violencia y las correspondientes tasas de mortalidad en todo el mundo'],
            ['ods_codigo'=>'ODS16','codigo'=>'16.2','descripcion'=>'Poner fin al maltrato, la explotacion, la trata y todas las formas de violencia y tortura contra los ninos'],
            ['ods_codigo'=>'ODS16','codigo'=>'16.6','descripcion'=>'Crear a todos los niveles instituciones eficaces y transparentes que rindan cuentas'],
            ['ods_codigo'=>'ODS16','codigo'=>'16.10','descripcion'=>'Garantizar el acceso publico a la informacion y proteger las libertades fundamentales'],
            // ODS 17 - Alianzas
            ['ods_codigo'=>'ODS17','codigo'=>'17.1','descripcion'=>'Fortalecer la movilizacion de recursos internos, incluso mediante la prestacion de apoyo internacional a los paises en desarrollo'],
            ['ods_codigo'=>'ODS17','codigo'=>'17.6','descripcion'=>'Mejorar la cooperacion regional e internacional Norte-Sur, Sur-Sur y triangular en materia de ciencia, tecnologia e innovacion'],
            ['ods_codigo'=>'ODS17','codigo'=>'17.16','descripcion'=>'Mejorar la Alianza Mundial para el Desarrollo Sostenible, complementada por alianzas entre multiples interesados'],
            ['ods_codigo'=>'ODS17','codigo'=>'17.17','descripcion'=>'Fomentar y promover la constitucion de alianzas eficaces en las esferas publica, publico-privada y de la sociedad civil'],
        ];

        foreach ($metas as $meta) {
            $ods = Ods::where('codigo', $meta['ods_codigo'])->first();
            if ($ods) {
                OdsMeta::create([
                    'codigo' => $meta['codigo'],
                    'descripcion' => $meta['descripcion'],
                    'ods_id' => $ods->id,
                ]);
            }
        }
    }
}