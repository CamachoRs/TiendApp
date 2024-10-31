<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900">
    <div class="container mx-auto p-4 sm:p-8">
        <h2 class="text-2xl sm:text-3xl font-extrabold mb-4 sm:mb-6 text-center text-white">Lista de Productos</h2>

        @if (session('success'))
        <div class="bg-green-100 text-green-600 p-3 sm:p-4 rounded mb-4 text-center">
            <strong>{{ session('success') }}</strong>
        </div>
        @endif

        <div class="mb-4 text-center space-y-2 sm:space-y-0 sm:space-x-2">
            <a href="{{ route('productos.create') }}" class="bg-green-600 text-white px-3 sm:px-4 py-2 rounded hover:bg-green-500 transition duration-200 text-sm sm:text-base">Crear Nuevo Producto</a>
            <a href="{{ route('marcas.index') }}" class="bg-blue-600 text-white px-3 sm:px-4 py-2 rounded hover:bg-blue-500 transition duration-200 text-sm sm:text-base">Ver Lista de Marcas</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 border border-gray-600 rounded-lg shadow-md text-white">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-2 px-4 border-b">Posición</th>
                        <th class="py-2 px-4 border-b">Nombre</th>
                        <th class="py-2 px-4 border-b">Unidad de Medida</th>
                        <th class="py-2 px-4 border-b">Observaciones</th>
                        <th class="py-2 px-4 border-b">Marca</th>
                        <th class="py-2 px-4 border-b">Cantidad</th>
                        <th class="py-2 px-4 border-b">Fecha de Embarque</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $index => $producto)
                    <tr class="hover:bg-gray-700">
                        <td class="py-2 px-2 sm:px-4 border-b border-gray-600 text-center">{{ $index + 1 }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b border-gray-600 text-center">{{ $producto->nombre }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b border-gray-600 text-center">{{ $producto->unidad_medida }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b border-gray-600 text-center">{{ $producto->observaciones }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b border-gray-600 text-center">{{ $producto->marca->nombre }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b border-gray-600 text-center">{{ $producto->cantidad_inventario }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b border-gray-600 text-center">{{ $producto->fecha_embarque }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b border-gray-600 text-center">
                            <a href="{{ route('productos.edit', $producto->id) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline ml-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>