<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:2|max:50',
            'referencia' => 'required|unique:marcas'
        ]);

        Marca::create($request->all());
        return redirect()->route('marcas.index');
    }

    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required|min:2|max:50',
            'referencia' => 'required|unique:marcas,referencia,' . $marca->id
        ]);

        $marca->update($request->all());
        return redirect()->route('marcas.index');
    }

    public function destroy(Marca $marca)
    {
        DB::table('marcas_eliminadas')->insert([
            'nombre' => $marca->nombre,
            'referencia' => $marca->referencia,
            'created_at' => now()
        ]);

        $marca->delete();
        return redirect()->route('marcas.index');
    }
}
