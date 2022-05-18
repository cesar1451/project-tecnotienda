<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use App\Events\EventosEtiquetas;

class EtiquetaController extends Controller
{
    protected $rules = [
        'nombre' => 'required|min:1'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $etiquetas = Etiqueta::select('id', 'nombre')->get();
        return view('etiqueta.etiqueta-index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etiqueta.etiqueta-form');
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
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = $request->nombre;
        $etiqueta->created_at = now();
        $etiqueta->updated_at = now();
        $etiqueta->save();    
        
        return redirect('etiquetas'); 
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function show(Etiqueta $etiqueta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function edit(Etiqueta $etiqueta)
    {        
        return view('etiqueta.etiqueta-form', compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        $request->validate($this->rules);  
        $etiqueta->nombre = $request->nombre;
        $etiqueta->created_at = $etiqueta->created_at;          
        $etiqueta->updated_at = now();      
        $etiqueta->update();        

        return redirect('etiquetas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();
        return redirect('etiquetas')->with('eliminar','ok');
    }
}
