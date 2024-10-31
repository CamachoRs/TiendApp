<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('marca')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $unidades_medida = ['Unidad', 'Display', 'Caja'];
        return view('productos.create', compact('marcas', 'unidades_medida'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100',
            'unidad_medida' => 'required|in:Unidad,Display,Caja',
            'observaciones' => 'required|max:255',
            'marca_id' => 'required|exists:marcas,id',
            'cantidad_inventario' => 'required|integer',
            'fecha_embarque' => 'required|date'
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        $marcas = Marca::all();
        $unidades_medida = ['Unidad', 'Display', 'Caja'];
        return view('productos.edit', compact('producto', 'marcas', 'unidades_medida'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100',
            'unidad_medida' => 'required|in:Unidad,Display,Caja',
            'observaciones' => 'required|max:255',
            'marca_id' => 'required|exists:marcas,id',
            'cantidad_inventario' => 'required|integer',
            'fecha_embarque' => 'required|date'
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        DB::table('productos_eliminados')->insert([
            'marca_id' => $producto->marca_id,
            'nombre' => $producto->nombre,
            'unidad_medida' => $producto->unidad_medida,
            'observaciones' => $producto->observaciones,
            'cantidad_inventario' => $producto->cantidad_inventario,
            'fecha_embarque' => $producto->fecha_embarque,
            'created_at' => now(),
        ]);

        $producto->delete();
        return redirect()->route('productos.index');
    }
}
