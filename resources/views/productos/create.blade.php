<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Crear producto') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                        <textarea name="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                        <input type="text" name="categoria" value="{{ old('categoria') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen principal</label>
                        <input type="file" name="imagen_url_principal" class="mt-1 block w-full" />
                    </div>

                    <h3 class="text-lg font-semibold mb-2">Variantes</h3>
                    <div id="variants">
                        <div class="variant border rounded p-4 mb-4">
                            <div class="mb-2">
                                <label class="block text-sm">SKU</label>
                                <input type="text" name="variantes[0][sku]" class="mt-1 w-full border-gray-300 rounded-md" />
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm">Precio</label>
                                <input type="number" step="0.01" name="variantes[0][precio]" class="mt-1 w-full border-gray-300 rounded-md" />
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm">Stock</label>
                                <input type="number" name="variantes[0][stock]" class="mt-1 w-full border-gray-300 rounded-md" />
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm">Color</label>
                                <input type="text" name="variantes[0][atributos][color]" class="mt-1 w-full border-gray-300 rounded-md" />
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm">Talla</label>
                                <input type="text" name="variantes[0][atributos][talla]" class="mt-1 w-full border-gray-300 rounded-md" />
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm">Capacidad</label>
                                <input type="text" name="variantes[0][atributos][capacidad]" class="mt-1 w-full border-gray-300 rounded-md" />
                            </div>
                            <div class="mb-2">
                                <label class="block text-sm">Imagen (URL)</label>
                                <input type="text" name="variantes[0][imagen_url]" class="mt-1 w-full border-gray-300 rounded-md" />
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="addVariant()" class="mb-4 px-4 py-2 bg-gray-600 text-white rounded">Agregar variante</button>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('productos.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Cancelar</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let variantIndex = 1;
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
