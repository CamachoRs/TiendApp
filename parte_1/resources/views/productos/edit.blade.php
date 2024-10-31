<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900 px-4">
    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl">
        <h1 class="text-2xl md:text-3xl font-extrabold mb-6 text-center text-white">Editar Producto</h1>

        @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
            <h4 class="font-bold">Errores:</h4>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block font-semibold text-white">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" required class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white">
            </div>

            <div class="mb-4">
                <label for="unidad_medida" class="block font-semibold text-white">Unidad de medida:</label>
                <select id="unidad_medida" name="unidad_medida" required class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white">
                    @foreach ($unidades_medida as $unidad)
                    <option value="{{ $unidad }}" {{ $producto->unidad_medida == $unidad ? 'selected' : '' }}>{{ $unidad }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="observaciones" class="block font-semibold text-white">Observaciones:</label>
                <textarea id="observaciones" name="observaciones" required class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white">{{ $producto->observaciones }}</textarea>
            </div>

            <div class="mb-4">
                <label for="marca_id" class="block font-semibold text-white">Marca:</label>
                <select id="marca_id" name="marca_id" required class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white">
                    @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ $producto->marca_id == $marca->id ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="cantidad_inventario" class="block font-semibold text-white">Cantidad en inventario:</label>
                <input type="number" id="cantidad_inventario" name="cantidad_inventario" value="{{ $producto->cantidad_inventario }}" required class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white">
            </div>

            <div class="mb-4">
                <label for="fecha_embarque" class="block font-semibold text-white">Fecha de embarque:</label>
                <input type="date" id="fecha_embarque" name="fecha_embarque" value="{{ $producto->fecha_embarque }}" required class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-500 transition duration-200">Actualizar Producto</button>
        </form>

        <a href="{{ route('productos.index') }}" class="block text-center mt-4 text-blue-400 hover:underline">Volver a la lista de productos</a>
    </div>
</body>

</html>