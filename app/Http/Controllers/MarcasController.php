<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcasController extends Controller
{
    public function index()
    {
        $marcas = DB::table('marca')->get();
        return view('marcas.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        DB::table('marca')->insert([
            'nombre' => $request->nombre,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('marcas.index')
            ->with('success', 'Marca agregada correctamente.');
    }

    public function edit($id)
    {
        $marca = DB::table('marca')->where('id_marca', $id)->first();
        return view('marcas.edit', compact('marca'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        DB::table('marca')
            ->where('id_marca', $id)
            ->update([
                'nombre' => $request->nombre,
                'updated_at' => now(),
            ]);

        return redirect()->route('marcas.index')
            ->with('success', 'Marca actualizada correctamente.');
    }

    public function destroy($id)
    {
        DB::table('marca')->where('id_marca', $id)->delete();
        return redirect()->route('marcas.index')
            ->with('success', 'Marca eliminada correctamente.');
    }
}
