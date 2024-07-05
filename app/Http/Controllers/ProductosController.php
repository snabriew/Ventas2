<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = DB::table('producto')
            ->join('proveedor', 'producto.id_proveedor', '=', 'proveedor.id_proveedor')
            ->join('marca', 'producto.id_marca', '=', 'marca.id_marca')
            ->select('producto.*', 'proveedor.nombre as proveedor_nombre', 'marca.nombre as marca_nombre')
            ->get();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $proveedores = DB::table('proveedor')->get();
        $marcas = DB::table('marca')->get();
        return view('productos.create', compact('proveedores', 'marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer',
            'id_proveedor' => 'required|exists:proveedor,id_proveedor',
            'id_marca' => 'required|exists:marca,id_marca',
        ]);

        DB::table('producto')->insert([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'id_proveedor' => $request->id_proveedor,
            'id_marca' => $request->id_marca,
        ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto agregado correctamente.');
    }

    public function edit($id)
    {
        $producto = DB::table('producto')->where('id_producto', $id)->first();
        $proveedores = DB::table('proveedor')->get();
        $marcas = DB::table('marca')->get();
        return view('productos.edit', compact('producto', 'proveedores', 'marcas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer',
            'id_proveedor' => 'required|exists:proveedor,id_proveedor',
            'id_marca' => 'required|exists:marca,id_marca',
        ]);

        DB::table('producto')
            ->where('id_producto', $id)
            ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'cantidad' => $request->cantidad,
                'id_proveedor' => $request->id_proveedor,
                'id_marca' => $request->id_marca
            ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        DB::table('producto')->where('id_producto', $id)->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}

