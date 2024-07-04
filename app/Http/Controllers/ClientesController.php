<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = DB::table('cliente')->get();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'dni' => 'required|string|max:10',
            'cuit' => 'required|string|max:13',
            'telefono' => 'required|string|max:15',
        ]);

        DB::table('cliente')->insert([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'dni' => $request->dni,
            'cuit' => $request->cuit,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente agregado correctamente.');
    }

    public function edit($id)
    {
        $cliente = DB::table('cliente')->where('id_cliente', $id)->first();
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'dni' => 'required|string|max:10',
            'cuit' => 'required|string|max:13',
            'telefono' => 'required|string|max:15',
        ]);

        DB::table('cliente')
            ->where('id_cliente', $id)
            ->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'direccion' => $request->direccion,
                'dni' => $request->dni,
                'cuit' => $request->cuit,
                'telefono' => $request->telefono,
            ]);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        DB::table('cliente')->where('id_cliente', $id)->delete();
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}
