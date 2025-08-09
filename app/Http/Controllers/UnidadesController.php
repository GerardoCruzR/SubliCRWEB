<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    public function unidadesEnVenta(Request $request)
    {
        // Inicializa la consulta para obtener todas las unidades desde el modelo Truck
        $query = Truck::query();

        // Recorre todos los parámetros de la solicitud y aplica filtros dinámicos
        foreach ($request->except(['page']) as $campo => $valor) {
            // Si el campo está lleno y no es 'precio' o 'kilometraje' que tienen un tratamiento especial
            if ($request->filled($campo) && !in_array($campo, ['kilometraje', 'precio'])) {
                $query->where($campo, $valor);
            }
        }

        // Filtrar por Kilometraje
        if ($request->filled('kilometraje')) {
            // Divide el rango de kilometraje por el guion (-)
            $kilometraje = explode('-', $request->input('kilometraje'));

            // Asegura que haya exactamente dos valores en el rango
            if (count($kilometraje) === 2) {
                $query->whereBetween('kilometraje', [$kilometraje[0], $kilometraje[1]]);
            }
        }

        // Filtrar por Rango de Precio
        if ($request->filled('precio')) {
            switch ($request->input('precio')) {
                case 'menor_500000':
                    $query->where('precio', '<', 500000);
                    break;
                case '500000_1000000':
                    $query->whereBetween('precio', [500000, 1000000]);
                    break;
                case '1000000_1500000':
                    $query->whereBetween('precio', [1000000, 1500000]);
                    break;
                case 'mayor_1500000':
                    $query->where('precio', '>', 1500000);
                    break;
            }
        }

        // Obtener los valores únicos para los filtros
        $filtros = [
            'motor' => Truck::select('motor as valor')->distinct()->get(),
            'transmision' => Truck::select('transmision as valor')->distinct()->get(),
            'ano' => Truck::select('ano as valor')->distinct()->get(),
            'kilometraje' => Truck::select('kilometraje as valor')->distinct()->get(),
            'color' => Truck::select('color as valor')->distinct()->get(),
            'combustible' => Truck::select('combustible as valor')->distinct()->get(),
        ];

        // Obtener las unidades filtradas
        $unidades = $query->paginate(4);

        // Pasar la variable $unidades y los filtros a la vista
        return view('unidades-en-venta', ['unidades' => $unidades, 'filtros' => $filtros]);
    }

    public function show($id)
    {
        // Obtener la unidad específica por su ID
        $unidad = Truck::findOrFail($id);

        // Pasar la unidad a la vista 'unidad-detalle'
        return view('unidad-detalle', ['unidad' => $unidad]);
    }
}
