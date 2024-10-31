<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 flex items-center justify-center min-h-screen p-4">
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 sm:p-8 md:p-12 w-full max-w-md sm:max-w-lg text-center">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-white mb-4 sm:mb-6">Bienvenido a la Administración de Catálogo de Productos</h1>
        <p class="text-gray-300 text-sm sm:text-base mb-3 sm:mb-4">Administra fácilmente tus productos y marcas desde aquí.</p>

        <div class="flex flex-col space-y-4">
            <a href="{{ route('productos.index') }}" class="bg-blue-600 text-white font-semibold py-2 sm:py-3 rounded hover:bg-blue-500 transition duration-200 text-sm sm:text-base">Ver Lista de Productos</a>
            <a href="{{ route('marcas.index') }}" class="bg-green-600 text-white font-semibold py-2 sm:py-3 rounded hover:bg-green-500 transition duration-200 text-sm sm:text-base">Ver Lista de Marcas</a>
        </div>
    </div>
</body>

</html>