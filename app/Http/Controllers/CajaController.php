<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Filtro;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    // Mostrar la lista paginada de cajas con filtros dinámicos
    public function index(Request $request)
    {
        $filtros = Filtro::where('seccion', 'cajas')->get()->groupBy('tipo');
        $query = Caja::query();

        // Aplicar filtros si están presentes
        if ($request->filled('tipo_caja')) {
            $query->where('tipo_caja', $request->input('tipo_caja'));
        }
        if ($request->filled('marca')) {
            $query->where('marca', $request->input('marca'));
        }
        if ($request->filled('tamano')) {
            $query->where('tamano', $request->input('tamano'));
        }
        if ($request->filled('ano_min') && $request->filled('ano_max')) {
            $query->whereBetween('ano', [$request->input('ano_min'), $request->input('ano_max')]);
        }
        if ($request->filled('condicion')) {
            $query->where('condicion', $request->input('condicion'));
        }
        if ($request->filled('tipo_suspension')) {
            $query->where('tipo_suspension', $request->input('tipo_suspension'));
        }

        $cajas = $query->paginate(10);
        return view('cajas.index', compact('cajas', 'filtros'));
    }

    public function create()
    {
        return view('cajas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_caja' => 'nullable|string|max:50',
            'tamano' => 'nullable|string|max:50',
            'marca' => 'nullable|string|max:50',
            'ano' => 'nullable|integer',
            'condicion' => 'nullable|string|max:50',
            'precio' => 'nullable|numeric',
            'disponibilidad' => 'nullable|boolean',
            'tipo_suspension' => 'nullable|string|max:50',
            'bolsas_aire' => 'nullable|boolean',
            'numero_ejes' => 'nullable|integer',
            'frenos' => 'nullable|string|max:50',
            'tipo_puertas' => 'nullable|string|max:50',
            'capacidad_carga' => 'nullable|string|max:50',
            'tipo_motor' => 'nullable|string|max:50',
            'imagenes.*' => 'nullable|image|max:1048576',
        ]);

        $imagenes = [];
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $image) {
                $imagenes[] = base64_encode(file_get_contents($image->getRealPath()));
            }
        }

        Caja::create(array_merge($validatedData, ['imagenes' => $imagenes]));

        return redirect()->route('cajas.index')->with('success', 'Caja creada exitosamente.');
    }

    public function edit($id)
    {
        $caja = Caja::findOrFail($id);
        return view('cajas.edit', compact('caja'));
    }

    public function update(Request $request, $id)
    {
        $caja = Caja::findOrFail($id);

        $validatedData = $request->validate([
            'tipo_caja' => 'nullable|string|max:50',
            'tamano' => 'nullable|string|max:50',
            'marca' => 'nullable|string|max:50',
            'ano' => 'nullable|integer',
            'condicion' => 'nullable|string|max:50',
            'precio' => 'nullable|numeric',
            'disponibilidad' => 'nullable|boolean',
            'tipo_suspension' => 'nullable|string|max:50',
            'bolsas_aire' => 'nullable|boolean',
            'numero_ejes' => 'nullable|integer',
            'frenos' => 'nullable|string|max:50',
            'tipo_puertas' => 'nullable|string|max:50',
            'capacidad_carga' => 'nullable|string|max:50',
            'tipo_motor' => 'nullable|string|max:50',
            'imagenes.*' => 'nullable|image|max:1048576',
        ]);

        $imagenes = $caja->imagenes ?? [];

        if ($request->has('imagenes_a_eliminar')) {
            foreach ($request->imagenes_a_eliminar as $index) {
                if (isset($imagenes[$index])) {
                    unset($imagenes[$index]);
                }
            }
        }

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $image) {
                if ($image->isValid()) {
                    $imagenes[] = base64_encode(file_get_contents($image->getRealPath()));
                }
            }
        }

        $caja->update(array_merge($validatedData, ['imagenes' => array_values($imagenes)]));

        return redirect()->route('cajas.index')->with('success', 'Caja actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $caja = Caja::findOrFail($id);
        $caja->delete();

        return redirect()->route('cajas.index')->with('success', 'Caja eliminada exitosamente.');
    }

    public function toggleDisponible($id)
    {
        $caja = Caja::findOrFail($id);
        $caja->disponibilidad = !$caja->disponibilidad;
        $caja->save();

        return redirect()->route('cajas.index')->with('success', 'Estado de disponibilidad actualizado.');
    }

    public function cajasEnVenta(Request $request)
    {
        $filtros = Filtro::where('seccion', 'cajas')->get()->groupBy('tipo');
        $query = Caja::where('disponibilidad', 1);

        if ($request->filled('tipo_caja')) {
            $query->where('tipo_caja', $request->input('tipo_caja'));
        }

        if ($request->filled('marca')) {
            $query->where('marca', $request->input('marca'));
        }

        if ($request->filled('tamano')) {
            $query->where('tamano', $request->input('tamano'));
        }

        if ($request->filled('ano_min') && $request->filled('ano_max')) {
            $query->whereBetween('ano', [$request->input('ano_min'), $request->input('ano_max')]);
        }

        if ($request->filled('condicion')) {
            $query->where('condicion', $request->input('condicion'));
        }

        if ($request->filled('tipo_suspension')) {
            $query->where('tipo_suspension', $request->input('tipo_suspension'));
        }

        $cajas = $query->paginate(4);

        return view('cajas.en_venta', compact('cajas', 'filtros'));
    }

    public function show($id)
    {
        $caja = Caja::findOrFail($id);
        return view('cajas.show', compact('caja'));
    }
}
