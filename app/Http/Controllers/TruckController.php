<?php
namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    // app/Http/Controllers/TruckController.php

public function showPublicList()
{
    $trucks = \App\Models\Truck::paginate(10); 
    
    // Ahora le dice a Laravel que busque directamente en la carpeta /views
    return view('public-list', ['trucks' => $trucks]);
}
    public function index()
    {
        // Obteniendo los camiones (Trucks) con paginación
        $trucks = Truck::paginate(4); // Cambia 4 al número de elementos que deseas mostrar por página

        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre_articulo' => 'required|string|max:255', // Nuevo campo
            'tipo_medida' => 'nullable|string', // Nuevo campo
            'talla' => 'nullable|array', // Si hay tallas seleccionadas
            'capacidad' => 'nullable|string|max:50', // Si hay capacidad
            'colores' => 'nullable|string|max:255', // Si hay colores seleccionados
            'tipo_impresion' => 'nullable|array', // Tipo de impresión
            'stock' => 'nullable|integer|min:0',
            'disponibilidad' => 'required|string',
            'sku' => 'nullable|string|max:255',
            'precio' => 'required|numeric',
            'documentacion.*' => 'nullable|file|mimes:pdf,doc,docx,xlsx,csv|max:1048576',
            'imagenes.*' => 'nullable|image|max:1048576',
        ]);

        // Manejo de la subida de documentos
        $documentacion = [];
        if ($request->hasFile('documentacion')) {
            foreach ($request->file('documentacion') as $file) {
                $documentacion[] = base64_encode(file_get_contents($file->getRealPath()));
            }
        }

        // Manejo de la subida de imágenes
        $imagenes = [];
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $image) {
                $imagenes[] = base64_encode(file_get_contents($image->getRealPath()));
            }
        }

        // Crear el camión con los datos validados
        Truck::create([
            'nombre_articulo' => $request->nombre_articulo,
            'tipo_medida' => $request->tipo_medida,
            'talla' => $request->talla ? implode(',', $request->talla) : null,
            'capacidad' => $request->capacidad,
            'colores' => $request->colores,
            'tipo_impresion' => $request->tipo_impresion ? implode(',', $request->tipo_impresion) : null,
            'stock' => $request->stock,
            'disponibilidad' => $request->disponibilidad,
            'sku' => $request->sku,
            'precio' => $request->precio,
            'documentacion' => $documentacion,
            'imagenes' => $imagenes,
        ]);

        return redirect()->route('trucks.index')->with('success', 'Truck created successfully.');
    }

    public function edit($id)
    {
        $truck = Truck::findOrFail($id);
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request, $id)
    {
        $truck = Truck::findOrFail($id);

        // Validación de los datos
        $request->validate([
            'nombre_articulo' => 'required|string|max:255',
            'tipo_medida' => 'nullable|string',
            'talla' => 'nullable|array',
            'capacidad' => 'nullable|string|max:50',
            'colores' => 'nullable|string|max:255',
            'tipo_impresion' => 'nullable|array',
            'stock' => 'required|integer|min:0',
            'disponibilidad' => 'required|string',
            'sku' => 'nullable|string|max:255',
            'precio' => 'required|numeric',
            'documentacion.*' => 'nullable|file|mimes:pdf,doc,docx,xlsx,csv|max:1048576',
            'imagenes.*' => 'nullable|image|max:1048576',
        ]);

        // Manejo de la subida de documentos
        $documentacion = $truck->documentacion ?? [];
        if ($request->hasFile('documentacion')) {
            foreach ($request->file('documentacion') as $file) {
                $documentacion[] = base64_encode(file_get_contents($file->getRealPath()));
            }
        }

        // Manejo de la subida de imágenes
        $imagenes = $truck->imagenes ?? [];
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $image) {
                $imagenes[] = base64_encode(file_get_contents($image->getRealPath()));
            }
        }

        // Actualizar el camión con los datos validados
        $truck->update([
            'nombre_articulo' => $request->nombre_articulo,
            'tipo_medida' => $request->tipo_medida,
            'talla' => $request->talla ? implode(',', $request->talla) : null,
            'capacidad' => $request->capacidad,
            'colores' => $request->colores,
            'tipo_impresion' => $request->tipo_impresion ? implode(',', $request->tipo_impresion) : null,
            'stock' => $request->stock,
            'disponibilidad' => $request->disponibilidad,
            'sku' => $request->sku,
            'precio' => $request->precio,
            'documentacion' => $documentacion,
            'imagenes' => $imagenes,
        ]);

        return redirect()->route('trucks.index')->with('success', 'Truck updated successfully.');
    }

    public function destroy($id)
    {
        $truck = Truck::findOrFail($id);
        $truck->delete();

        return redirect()->route('trucks.index')->with('success', 'Truck deleted successfully.');
    }
}