<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


class ProductoController extends Controller
{
    private $rules = [
        'nombre' => 'required|min:5', 
        'marca' => 'required|min:6', 
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
        $etiquetas = Etiqueta::all();
        return view('producto.producto-form', compact('etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate($this->rules);
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        $producto = Producto::create($request->all());
        $producto->etiquetas()->attach($request->etiquetas_id);

       /*  $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $request->descripcion;
        $producto->user_id = Auth::id();
        $producto->created_at = now();
        $producto->updated_at = now();
        $producto->etiqeutas()->attach($request->etiqueta_id);
        $producto->save();  */
       

        return redirect('/productos');
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
