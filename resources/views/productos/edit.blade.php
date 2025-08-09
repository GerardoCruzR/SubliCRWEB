<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Editar producto') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                        <textarea name="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                        <input type="text" name="categoria" value="{{ old('categoria', $producto->categoria) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen principal (archivo)</label>
                        <input type="file" name="imagen_url_principal_file" class="mt-1 block w-full" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen principal (URL)</label>
                        <input type="text" name="imagen_url_principal" value="{{ old('imagen_url_principal', $producto->imagen_url_principal) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                    </div>

                    <h3 class="text-lg font-semibold mb-2">Variantes</h3>
                    <div id="variants">
                        @foreach ($producto->variantes as $i => $v)
                            <div class="variant border rounded p-4 mb-4">
                                <div class="mb-2">
                                    <label class="block text-sm">SKU</label>
                                    <input type="text" name="variantes[{{ $i }}][sku]" value="{{ old('variantes.' . $i . '.sku', $v->sku) }}" class="mt-1 w-full border-gray-300 rounded-md" />
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm">Precio</label>
                                    <input type="number" step="0.01" name="variantes[{{ $i }}][precio]" value="{{ old('variantes.' . $i . '.precio', $v->precio) }}" class="mt-1 w-full border-gray-300 rounded-md" />
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm">Stock</label>
                                    <input type="number" name="variantes[{{ $i }}][stock]" value="{{ old('variantes.' . $i . '.stock', $v->stock) }}" class="mt-1 w-full border-gray-300 rounded-md" />
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm">Color</label>
                                    <input type="text" name="variantes[{{ $i }}][atributos][color]" value="{{ old('variantes.' . $i . '.atributos.color', data_get($v->atributos, 'color')) }}" class="mt-1 w-full border-gray-300 rounded-md" />
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm">Talla</label>
                                    <input type="text" name="variantes[{{ $i }}][atributos][talla]" value="{{ old('variantes.' . $i . '.atributos.talla', data_get($v->atributos, 'talla')) }}" class="mt-1 w-full border-gray-300 rounded-md" />
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm">Capacidad</label>
                                    <input type="text" name="variantes[{{ $i }}][atributos][capacidad]" value="{{ old('variantes.' . $i . '.atributos.capacidad', data_get($v->atributos, 'capacidad')) }}" class="mt-1 w-full border-gray-300 rounded-md" />
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm">Imagen (archivo)</label>
                                    <input type="file" name="variantes[{{ $i }}][imagen_file]" class="mt-1 w-full" />
                                </div>
                                <div class="mb-2">
                                    <label class="block text-sm">Imagen (URL)</label>
                                    <input type="text" name="variantes[{{ $i }}][imagen_url]" value="{{ old('variantes.' . $i . '.imagen_url', $v->imagen_url) }}" class="mt-1 w-full border-gray-300 rounded-md" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" onclick="addVariant()" class="mb-4 px-4 py-2 bg-gray-600 text-white rounded">Agregar variante</button>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let variantIndex = {{ $producto->variantes->count() }};
        function addVariant() {
            const template = document.querySelector('.variant').cloneNode(true);
            template.querySelectorAll('input').forEach(input => {
                const name = input.getAttribute('name');
                input.setAttribute('name', name.replace(/\d+/, variantIndex));
                if (input.type !== 'file') {
                    input.value = '';
                } else {
                    input.value = null;
                }
            });
            document.getElementById('variants').appendChild(template);
            variantIndex++;
        }
    </script>
</x-app-layout>
