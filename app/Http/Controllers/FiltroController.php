<?php

namespace App\Http\Controllers;

use App\Models\Filtro;
use Illuminate\Http\Request;

class FiltroController extends Controller
{
    // Muestra la lista de filtros con posibilidad de filtrar por sección, tipo y valor
    public function index(Request $request)
    {
        // Obtener los tipos y valores únicos filtrados por sección
        $tipos = Filtro::select('tipo')
            ->distinct()
            ->when($request->filled('seccion'), function ($query) use ($request) {
                return $query->where('seccion', $request->input('seccion'));
            })
            ->pluck('tipo');

        $valores = Filtro::select('valor')
            ->distinct()
            ->when($request->filled('seccion'), function ($query) use ($request) {
                return $query->where('seccion', $request->input('seccion'));
            })
            ->pluck('valor');

        // Iniciar la consulta del modelo Filtro
        $query = Filtro::query();

        // Aplicar filtro por sección primero
        if ($request->filled('seccion')) {
            $query->where('seccion', $request->input('seccion'));
        }

        // Filtrar por tipo si se ha seleccionado
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->input('tipo'));
        }

        // Filtrar por valor si se ha seleccionado
        if ($request->filled('valor')) {
            $query->where('valor', $request->input('valor'));
        }

        // Obtener los filtros aplicados con paginación
        $filtros = $query->paginate(10); // Paginación de 10 registros

        // Devolver la vista con los datos
        return view('filtros.index', compact('filtros', 'tipos', 'valores'));
    }

    // Muestra el formulario para crear un nuevo filtro
    public function create()
    {
        // Obtener todos los tipos de filtros existentes
        $tipos_filtros = Filtro::select('tipo')->distinct()->pluck('tipo');
        return view('filtros.create', compact('tipos_filtros'));
    }

    // Almacena un nuevo filtro en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'seccion' => 'required|string|max:255',  // Asegúrate de validar la sección
            'tipo' => 'required|string|max:255',
            'valor' => 'required|string|max:255',
        ]);

        // Comprobar si el tipo ya existe en la misma sección
        $tipoExistente = Filtro::where('seccion', $validatedData['seccion'])
                               ->where('tipo', $validatedData['tipo'])
                               ->exists();

        if (!$tipoExistente) {
            // Guardar el nuevo tipo si no existe
            Filtro::create([
                'seccion' => $validatedData['seccion'],
                'tipo' => $validatedData['tipo'],
                'valor' => $validatedData['valor'],
            ]);
        } else {
            // Solo crear el filtro si el tipo ya existe pero con un nuevo valor
            Filtro::create($validatedData);
        }

        return redirect()->route('filtros.index')->with('success', 'Filtro creado exitosamente.');
    }

    // Muestra el formulario para editar un filtro existente
    public function edit($id)
    {
        $filtro = Filtro::findOrFail($id);
        return view('filtros.edit', compact('filtro'));
    }

    // Actualiza un filtro existente en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos actualizados
        $validatedData = $request->validate([
            'seccion' => 'required|string|max:255',  // Asegúrate de validar la sección
            'tipo' => 'required|string|max:255',
            'valor' => 'required|string|max:255',
        ]);

        $filtro = Filtro::findOrFail($id);
        $filtro->update($validatedData);

        return redirect()->route('filtros.index')->with('success', 'Filtro actualizado correctamente.');
    }

    // Elimina un filtro de la base de datos
    public function destroy($id)
    {
        $filtro = Filtro::findOrFail($id);
        $filtro->delete();

        return redirect()->route('filtros.index')->with('success', 'Filtro eliminado correctamente.');
    }

    // Obtener tipos de filtros basados en la sección seleccionada vía AJAX
    public function getTiposBySeccion(Request $request)
    {
        // Obtener los tipos de filtro según la sección seleccionada
        $tipos_filtros = Filtro::where('seccion', $request->seccion)
            ->select('tipo')
            ->distinct()
            ->pluck('tipo');

        return response()->json($tipos_filtros);
    }
}
