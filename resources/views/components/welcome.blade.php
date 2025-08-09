<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <!-- Logo con animación -->
    <a href="{{ url('/') }}" class="block mx-auto w-fit transform transition duration-300 hover:scale-110">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-24 w-auto" />
    </a>

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        ¡Bienvenido al Panel de Administración!
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        Este es el panel de administración de tu aplicación. Desde aquí, podrás gestionar todas las funcionalidades clave de tu sistema de forma eficiente. Utiliza el menú de navegación para acceder a las diferentes secciones y herramientas disponibles.
    </p>

    <!-- Advertencia para usuarios no autorizados -->
    <div class="mt-6 p-4 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded-lg">
        <strong>Advertencia:</strong> Si no eres un usuario autorizado para acceder a esta administración, por favor, desalojar el sitio web de inmediato. Cualquier acceso no autorizado puede derivar en acciones legales.
    </div>

    <!-- Advertencia para el administrador sobre la edición de información -->
    <div class="mt-6 p-4 bg-red-100 text-red-800 border border-red-300 rounded-lg">
        <strong>Importante:</strong> Como administrador, debes asegurarte de que toda la información que edites o publiques sea correcta y esté actualizada. Los datos que gestiones desde este panel pueden ser visibles para el público, lo que significa que cualquier error o información incorrecta podría afectar la confianza y la transparencia de tu sistema.
        <ul class="mt-4 list-disc list-inside">
            <li>Verifica que los datos clave sean precisos.</li>
            <li>Revisa el contenido varias veces antes de publicarlo, especialmente si es información sensible o que pueda generar repercusiones.</li>
            <li>Considera las implicaciones legales de publicar información incorrecta, ya que podrías incurrir en problemas con usuarios o entidades externas.</li>
            <li>Ten en cuenta que la responsabilidad de mantener la integridad de los datos recae sobre ti como administrador.</li>
        </ul>
        <p class="mt-4">
            Si tienes dudas, consulta con el equipo de soporte o con el departamento correspondiente antes de realizar cambios importantes.
        </p>
    </div>

    <!-- Botón Administrar Unidades (rojo con animación) -->
    <div class="mt-6">
        <a href="{{ route('productos.index') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold text-sm rounded-lg hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:scale-105">
            Administrar Productos
        </a>
    </div>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <!-- Autenticación -->
    <div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
                Autenticación
            </h2>
        </div>

        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Controla y administra la autenticación de usuarios de forma fácil con las funcionalidades incluidas en la plataforma.
        </p>
    </div>
</div>
