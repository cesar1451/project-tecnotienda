<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Producto;
use App\Models\Archivo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;


class ProductoController extends Controller
{
    private $rules = [
        'nombre' => 'required|min:1', 
        'marca' => 'required|min:1', 
        'modelo' => 'required|min:1', 
        'precio' => 'required', 
        'cantidad' => 'required',                      
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

        $productos = Producto::all();
        return view('producto.producto-index', compact('productos'));
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
        foreach($request->archivos as $archivo){ 
            if($archivo->isValid()){
                $nombre_hash = $archivo->store('productos');
                $registroArchivo = new Archivo();
                $registroArchivo->nombre = $archivo->getClientOriginalName();
                $registroArchivo->nombre_hash = $nombre_hash;
                $registroArchivo->mime = $archivo->getClientMimeType();
                $registroArchivo->producto_id = $producto->id;
                $registroArchivo->save();     
            }                                                 
        } 
        return redirect('/productos')
        ->with(['mensaje'=>'Archivos cargados con éxito']);     
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('producto.producto-show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('producto.producto-form', compact('producto'))
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
        $producto->delete();
        return redirect('/productos');
    }
}
