<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filtro;

class FiltroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filtros para la sección "unidades"
        $filtros_unidades = [
            ['seccion' => 'unidades', 'tipo' => 'diferencial', 'valor' => '40,000 libras'],
            ['seccion' => 'unidades', 'tipo' => 'diferencial', 'valor' => '42,000 libras'],
            ['seccion' => 'unidades', 'tipo' => 'diferencial', 'valor' => '44,000 libras'],
            ['seccion' => 'unidades', 'tipo' => 'diferencial', 'valor' => '46,000 libras'],
            ['seccion' => 'unidades', 'tipo' => 'diferencial', 'valor' => '48,000 libras'],
            ['seccion' => 'unidades', 'tipo' => 'diferencial', 'valor' => '52,000 libras'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'Cummins'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'Paccar MX-13'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'ISX15 (Máquina Roja)'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'Volvo D13'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'Caterpillar C15'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'Detroit Diesel DD15'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'Mack MP8'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'International A26'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_motor', 'valor' => 'Otros'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_camarote', 'valor' => 'Grande con Sleep Studio'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_camarote', 'valor' => 'Grande sin Sleep Studio'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_camarote', 'valor' => 'Mediano con Sleep Studio'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_camarote', 'valor' => 'Mediano sin Sleep Studio'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_camarote', 'valor' => 'Chico con Sleep Studio'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_camarote', 'valor' => 'Chico sin Sleep Studio'],
            ['seccion' => 'unidades', 'tipo' => 'tipo_camarote', 'valor' => 'Cabina Diurna (sin camarote)'],
            ['seccion' => 'unidades', 'tipo' => 'ano_modelo', 'valor' => 'De 2010 a 2019'],
            ['seccion' => 'unidades', 'tipo' => 'kilometraje', 'valor' => '0 - 100,000 km'],
            ['seccion' => 'unidades', 'tipo' => 'kilometraje', 'valor' => '100,001 - 300,000 km'],
            ['seccion' => 'unidades', 'tipo' => 'kilometraje', 'valor' => '300,001 - 500,000 km'],
            ['seccion' => 'unidades', 'tipo' => 'kilometraje', 'valor' => '500,001 - 800,000 km'],
            ['seccion' => 'unidades', 'tipo' => 'kilometraje', 'valor' => '800,001 - 1,000,000 km'],
            ['seccion' => 'unidades', 'tipo' => 'kilometraje', 'valor' => 'Más de 1,000,000 km'],
            ['seccion' => 'unidades', 'tipo' => 'transmision', 'valor' => 'Manual'],
            ['seccion' => 'unidades', 'tipo' => 'transmision', 'valor' => 'Automática'],
            ['seccion' => 'unidades', 'tipo' => 'transmision', 'valor' => 'Automática con retardador'],
            ['seccion' => 'unidades', 'tipo' => 'rango_precios', 'valor' => 'Menos de $500,000 MXN'],
            ['seccion' => 'unidades', 'tipo' => 'rango_precios', 'valor' => '$500,000 MXN - $1,000,000 MXN'],
            ['seccion' => 'unidades', 'tipo' => 'rango_precios', 'valor' => '$1,000,000 MXN - $1,500,000 MXN'],
            ['seccion' => 'unidades', 'tipo' => 'rango_precios', 'valor' => 'Más de $1,500,000 MXN'],
        ];

        // Filtros para la sección "cajas"
        $filtros_cajas = [
            ['seccion' => 'cajas', 'tipo' => 'tipo_caja', 'valor' => 'Seca'],
            ['seccion' => 'cajas', 'tipo' => 'tipo_caja', 'valor' => 'Refrigerada'],
            ['seccion' => 'cajas', 'tipo' => 'tamano', 'valor' => '40 ft'],
            ['seccion' => 'cajas', 'tipo' => 'tamano', 'valor' => '48 ft'],
            ['seccion' => 'cajas', 'tipo' => 'tamano', 'valor' => '53 ft'],
            ['seccion' => 'cajas', 'tipo' => 'marca', 'valor' => 'Utility'],
            ['seccion' => 'cajas', 'tipo' => 'marca', 'valor' => 'Gran Danés'],
            ['seccion' => 'cajas', 'tipo' => 'marca', 'valor' => 'Wabash'],
            ['seccion' => 'cajas', 'tipo' => 'ano', 'valor' => '2015'],
            ['seccion' => 'cajas', 'tipo' => 'ano', 'valor' => '2016'],
            ['seccion' => 'cajas', 'tipo' => 'ano', 'valor' => '2017'],
            ['seccion' => 'cajas', 'tipo' => 'ano', 'valor' => '2018'],
            ['seccion' => 'cajas', 'tipo' => 'ano', 'valor' => '2019'],
            ['seccion' => 'cajas', 'tipo' => 'ano', 'valor' => '2020'],
            ['seccion' => 'cajas', 'tipo' => 'condicion', 'valor' => 'Nueva'],
            ['seccion' => 'cajas', 'tipo' => 'condicion', 'valor' => 'Seminueva'],
            ['seccion' => 'cajas', 'tipo' => 'condicion', 'valor' => 'Usada'],
            ['seccion' => 'cajas', 'tipo' => 'tipo_suspension', 'valor' => 'Mecánica'],
            ['seccion' => 'cajas', 'tipo' => 'tipo_suspension', 'valor' => 'Neumática'],
        ];

        // Insertar los filtros en la base de datos
        foreach (array_merge($filtros_unidades, $filtros_cajas) as $filtro) {
            Filtro::create($filtro);
        }
    }
}
