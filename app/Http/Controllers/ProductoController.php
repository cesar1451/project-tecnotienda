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
use Illuminate\Auth\Access\Response;
use RealRashid\SweetAlert\Facades\Alert;
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
        $rol = Auth::user()->rol;  
        if($rol == 'Proveedor'){
            $id = Auth::id();            
            $productos = Producto::where('user_id', $id)->select('id', 'nombre', 'marca', 'modelo', 'precio', 'cantidad')
            ->with('etiquetas')->get();
        } 
        else{
            $productos = Producto::select('id', 'nombre','marca', 'modelo', 'precio', 'cantidad')
            ->with('etiquetas')->get();
        }                   
        return view('producto.producto-index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiquetas = Etiqueta::select('id', 'nombre')->get();
        return view('producto.producto-form', ['etiquetas' => $etiquetas]);
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
        if(!is_null($request->archivos)){
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
        }           
       /*  Alert::success('Listo', 'Producto registado satisfactoriamente'); */
        return redirect('productos');     
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {             
        return view('producto.producto-show', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {     
        //dd($producto->etiquetas()->sync($producto->id));                
        $etiquetas = Etiqueta::select('id', 'nombre')->get();
        return view('producto.producto-form', ['producto' => $producto, 'etiquetas' => $etiquetas]);
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
        $request->validate($this->rules);  
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $request->descripcion;
        $producto->user_id = $request->user_id;                   
        $producto->updated_at = now();                      
        $producto->update();    
        $producto->etiquetas()->sync($request->etiquetas_id);       
        /* if(!is_null($request->archivos)){
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
        }  */

        return redirect('productos');          
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
