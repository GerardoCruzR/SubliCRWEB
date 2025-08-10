<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\VarianteProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Public product catalog.
     */
    public function showPublicList()
    {
        // Order by existing column (id) instead of created_at
        $productos = Producto::with('variantes')
            ->orderByDesc('id')
            ->paginate(10);

        return view('public-list', compact('productos'));
    }

    /**
     * Admin index of products.
     */
    public function index()
    {
        $productos = Producto::with('variantes')
            ->orderByDesc('id')
            ->paginate(10);

        return view('productos.index', compact('productos'));
    }

    /**
     * Show create form (admin).
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store new product + variants (admin).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'required|string|max:100',
            'imagen_url_principal' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',

            'variantes' => 'required|array|min:1',
            'variantes.*.sku' => 'nullable|string|max:100',
            'variantes.*.precio' => 'required|numeric|min:0',
            'variantes.*.stock' => 'required|integer|min:0',
            'variantes.*.atributos' => 'nullable|array',
            'variantes.*.imagen_url' => 'nullable|url|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Imagen principal
            $path_principal = null;
            if ($request->hasFile('imagen_url_principal')) {
                $path_principal = $request->file('imagen_url_principal')->store('productos', 'public');
            }

            $producto = Producto::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'imagen_url_principal' => $path_principal,
            ]);

            foreach ($request->variantes as $varianteData) {
                $atributos = $varianteData['atributos'] ?? [];

                $imagenVariante = null;
                if (!empty($varianteData['imagen_url'])) {
                    $imagenVariante = $varianteData['imagen_url'];
                }

                VarianteProducto::create([
                    'producto_id' => $producto->id,
                    'sku' => $varianteData['sku'] ?? null,
                    'precio' => $varianteData['precio'],
                    'stock' => $varianteData['stock'],
                    'atributos' => $atributos,
                    'imagen_url' => $imagenVariante,
                ]);
            }

            DB::commit();
            return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el producto: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $producto = Producto::with('variantes')->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::with('variantes')->findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'required|string|max:100',
            'imagen_url_principal' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',

            'variantes' => 'required|array|min:1',
            'variantes.*.sku' => 'nullable|string|max:100',
            'variantes.*.precio' => 'required|numeric|min:0',
            'variantes.*.stock' => 'required|integer|min:0',
            'variantes.*.atributos' => 'nullable|array',
            'variantes.*.imagen_url' => 'nullable|url|max:2048',
        ]);

        $producto = Producto::with('variantes')->findOrFail($id);

        DB::beginTransaction();

        try {
            $path_principal = $producto->imagen_url_principal;
            if ($request->hasFile('imagen_url_principal')) {
                if ($path_principal && Storage::disk('public')->exists($path_principal)) {
                    Storage::disk('public')->delete($path_principal);
                }
                $path_principal = $request->file('imagen_url_principal')->store('productos', 'public');
            }

            $producto->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'imagen_url_principal' => $path_principal,
            ]);

            $producto->variantes()->delete();
            foreach ($request->variantes as $varianteData) {
                $atributos = $varianteData['atributos'] ?? [];

                $imagenVariante = null;
                if (!empty($varianteData['imagen_url'])) {
                    $imagenVariante = $varianteData['imagen_url'];
                }

                VarianteProducto::create([
                    'producto_id' => $producto->id,
                    'sku' => $varianteData['sku'] ?? null,
                    'precio' => $varianteData['precio'],
                    'stock' => $varianteData['stock'],
                    'atributos' => $atributos,
                    'imagen_url' => $imagenVariante,
                ]);
            }

            DB::commit();
            return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar el producto: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->imagen_url_principal && Storage::disk('public')->exists($producto->imagen_url_principal)) {
            Storage::disk('public')->delete($producto->imagen_url_principal);
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
