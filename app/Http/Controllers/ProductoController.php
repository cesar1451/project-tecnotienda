<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


class ProductoController extends Controller
{
    protected $rules = [
        'nombre' => 'required|min:5', 
        'marca' => 'required|in:Razer, Hyperx, asus, Zotag |min:6', 
        'modelo' => 'required', 
        'precio' => 'required', 
        'cantidad' => 'required', 
        'descripcion' => 'required',        
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $rol = Auth::user()->rol;
        if ($rol == 'Proveedor'){
            $id = Auth::id();
            $productos = Producto::with($id, 'user_id')->get();
            //Nos falta que concatene los archivos y etiquetas
        }
        else{
            $productos = Producto::all();   
            //Nos falta que concatene los archivos y etiquetas
        } */

        return view('producto.producto-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $this->authorize('create'); */
        return view('producto.producto-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        /* $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $request->descripcion;
        $producto->user_id = Auth::id(); */
        $producto->save();

        return url('/productos');
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
