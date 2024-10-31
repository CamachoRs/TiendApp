<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marca</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900 p-4">
    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-lg mx-4 sm:mx-auto">
        <h1 class="text-2xl sm:text-3xl font-extrabold mb-4 sm:mb-6 text-center text-white">Editar Marca</h1>

        @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 sm:p-4 rounded mb-4">
            <h4 class="font-bold">Errores:</h4>
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('marcas.update', $marca->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block font-semibold text-white">Nombre del marca:</label>
                <input type="text" id="nombre" name="nombre" value="{{ $marca->nombre }}" required class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white text-sm sm:text-base">
            </div>

            <div class="mb-4">
                <label for="referencia" class="block font-semibold text-white">Referencia:</label>
                <input type="text" id="referencia" name="referencia" value="{{ $marca->referencia }}" required class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white text-sm sm:text-base">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-500 transition duration-200 text-sm sm:text-base">Actualizar marca</button>
        </form>

        <a href="{{ route('marcas.index') }}" class="block text-center mt-4 text-blue-400 hover:underline text-sm sm:text-base">Volver a la lista de marcas</a>
    </div>
</body>

</html>