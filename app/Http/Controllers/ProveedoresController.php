<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedores = DB::table('proveedor')->get();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        DB::table('proveedor')->insert([
            'nombre' => $request->nombre,
            'mail' => $request->mail,
            'direccion' => $request->direccion,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor agregado correctamente.');
    }

    public function edit($id)
    {
        $proveedor = DB::table('proveedor')->where('id_proveedor', $id)->first();
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        DB::table('proveedor')
            ->where('id_proveedor', $id)
            ->update([
                'nombre' => $request->nombre,
                'mail' => $request->mail,
                'direccion' => $request->direccion,
                'updated_at' => now(),
            ]);

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        DB::table('proveedor')->where('id_proveedor', $id)->delete();
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
}
