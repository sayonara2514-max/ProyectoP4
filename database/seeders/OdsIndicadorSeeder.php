<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\OdsIndicador;
use App\Models\OdsMeta;

class OdsIndicadorSeeder extends Seeder {
    public function run(): void {
        $indicadores = [
            ['meta_codigo'=>'1.1','codigo'=>'1.1.1','descripcion'=>'Proporcion de la poblacion que vive por debajo del umbral de pobreza internacional, desglosada por sexo, edad, situacion laboral y ubicacion geografica'],
            ['meta_codigo'=>'1.2','codigo'=>'1.2.1','descripcion'=>'Proporcion de la poblacion que vive por debajo del umbral nacional de pobreza, desglosada por sexo y edad'],
            ['meta_codigo'=>'1.3','codigo'=>'1.3.1','descripcion'=>'Proporcion de la poblacion cubierta por sistemas de proteccion social, desglosada por sexo'],
            ['meta_codigo'=>'1.4','codigo'=>'1.4.1','descripcion'=>'Proporcion de la poblacion que vive en hogares con acceso a los servicios basicos'],
            ['meta_codigo'=>'2.1','codigo'=>'2.1.1','descripcion'=>'Prevalencia de la subalimentacion'],
            ['meta_codigo'=>'2.2','codigo'=>'2.2.1','descripcion'=>'Prevalencia del retraso del crecimiento en ninos menores de 5 anos'],
            ['meta_codigo'=>'2.3','codigo'=>'2.3.1','descripcion'=>'Volumen de produccion por unidad de trabajo desglosado por clases de tamano de la empresa agropecuaria'],
            ['meta_codigo'=>'3.1','codigo'=>'3.1.1','descripcion'=>'Tasa de mortalidad materna'],
            ['meta_codigo'=>'3.2','codigo'=>'3.2.1','descripcion'=>'Tasa de mortalidad de ninos menores de 5 anos'],
            ['meta_codigo'=>'3.3','codigo'=>'3.3.1','descripcion'=>'Numero de nuevas infecciones por el VIH por cada 1.000 habitantes no infectados'],
            ['meta_codigo'=>'3.4','codigo'=>'3.4.1','descripcion'=>'Tasa de mortalidad atribuida a las enfermedades cardiovasculares, el cancer, la diabetes o las enfermedades respiratorias cronicas'],
            ['meta_codigo'=>'3.8','codigo'=>'3.8.1','descripcion'=>'Cobertura de los servicios de salud esenciales'],
            ['meta_codigo'=>'4.1','codigo'=>'4.1.1','descripcion'=>'Proporcion de ninos y jovenes que han alcanzado al menos un nivel minimo de competencia en lectura y matematicas'],
            ['meta_codigo'=>'4.2','codigo'=>'4.2.1','descripcion'=>'Proporcion de ninos menores de 5 anos cuyo desarrollo es adecuado en lo que respecta a la salud, el aprendizaje y el bienestar psicosocial'],
            ['meta_codigo'=>'4.3','codigo'=>'4.3.1','descripcion'=>'Tasa de participacion de los jovenes y adultos en ensenanza academica y no academica y capacitacion en los ultimos 12 meses'],
            ['meta_codigo'=>'5.1','codigo'=>'5.1.1','descripcion'=>'Existencia o no de marcos juridicos para promover, hacer cumplir y supervisar la igualdad y la no discriminacion por razon de sexo'],
            ['meta_codigo'=>'5.2','codigo'=>'5.2.1','descripcion'=>'Proporcion de mujeres y ninas de 15 anos o mas que han tenido pareja alguna vez y que han sufrido violencia fisica, sexual o psicologica'],
            ['meta_codigo'=>'5.5','codigo'=>'5.5.1','descripcion'=>'Proporcion de escanos ocupados por mujeres en los parlamentos nacionales y los gobiernos locales'],
            ['meta_codigo'=>'6.1','codigo'=>'6.1.1','descripcion'=>'Proporcion de la poblacion que utiliza servicios de agua potable gestionados de forma segura'],
            ['meta_codigo'=>'6.2','codigo'=>'6.2.1','descripcion'=>'Proporcion de la poblacion que utiliza servicios de saneamiento gestionados de forma segura'],
            ['meta_codigo'=>'7.1','codigo'=>'7.1.1','descripcion'=>'Proporcion de la poblacion con acceso a la electricidad'],
            ['meta_codigo'=>'7.2','codigo'=>'7.2.1','descripcion'=>'Proporcion de energia renovable en el consumo final total de energia'],
            ['meta_codigo'=>'8.1','codigo'=>'8.1.1','descripcion'=>'Tasa de crecimiento anual del PIB real per capita'],
            ['meta_codigo'=>'8.5','codigo'=>'8.5.1','descripcion'=>'Ganancias medias por hora de empleadas y empleados, desglosadas por ocupacion, edad y personas con discapacidad'],
            ['meta_codigo'=>'9.1','codigo'=>'9.1.1','descripcion'=>'Proporcion de la poblacion rural que vive a menos de 2 km de una carretera transitable todo el ano'],
            ['meta_codigo'=>'9.2','codigo'=>'9.2.1','descripcion'=>'Valor anadido por la industria manufacturera en proporcion al PIB y per capita'],
            ['meta_codigo'=>'10.1','codigo'=>'10.1.1','descripcion'=>'Tasas de crecimiento de los gastos de los hogares o el ingreso per capita entre el 40% mas pobre de la poblacion y la poblacion total'],
            ['meta_codigo'=>'11.1','codigo'=>'11.1.1','descripcion'=>'Proporcion de la poblacion urbana que vive en barrios marginales, asentamientos informales o viviendas inadecuadas'],
            ['meta_codigo'=>'11.2','codigo'=>'11.2.1','descripcion'=>'Proporcion de la poblacion que tiene acceso conveniente al transporte publico, desglosada por sexo, edad y personas con discapacidad'],
            ['meta_codigo'=>'12.2','codigo'=>'12.2.1','descripcion'=>'Huella material en terminos absolutos, huella material per capita y huella material por PIB'],
            ['meta_codigo'=>'13.1','codigo'=>'13.1.1','descripcion'=>'Numero de muertes, personas desaparecidas y personas afectadas directamente atribuido a desastres por cada 100.000 personas'],
            ['meta_codigo'=>'13.2','codigo'=>'13.2.1','descripcion'=>'Numero de paises que han comunicado el establecimiento de una contribucion determinada a nivel nacional, una estrategia a largo plazo'],
            ['meta_codigo'=>'14.1','codigo'=>'14.1.1','descripcion'=>'Indice de eutrofizacion costera y densidad de desechos plasticos flotantes'],
            ['meta_codigo'=>'15.1','codigo'=>'15.1.1','descripcion'=>'Superficie forestal en proporcion a la superficie terrestre total'],
            ['meta_codigo'=>'15.2','codigo'=>'15.2.1','descripcion'=>'Avances hacia la gestion forestal sostenible'],
            ['meta_codigo'=>'16.1','codigo'=>'16.1.1','descripcion'=>'Numero de victimas de homicidios dolosos por cada 100.000 habitantes, desglosado por sexo y edad'],
            ['meta_codigo'=>'16.6','codigo'=>'16.6.1','descripcion'=>'Gastos del gobierno primario en proporcion al presupuesto aprobado originalmente, desglosados por sector'],
            ['meta_codigo'=>'17.1','codigo'=>'17.1.1','descripcion'=>'Total de ingresos del gobierno en proporcion al PIB, desglosado por fuente'],
            ['meta_codigo'=>'17.16','codigo'=>'17.16.1','descripcion'=>'Numero de paises que informan sobre el progreso en marcos de seguimiento de la eficacia del desarrollo de multi-interesados'],
        ];

        foreach ($indicadores as $indicador) {
            $meta = OdsMeta::where('codigo', $indicador['meta_codigo'])->first();
            if ($meta) {
                OdsIndicador::create([
                    'codigo' => $indicador['codigo'],
                    'descripcion' => $indicador['descripcion'],
                    'ods_meta_id' => $meta->id,
                ]);
            }
        }
    }
}