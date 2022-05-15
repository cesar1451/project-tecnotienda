<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'nombre', 'nombre_hash','ruta', 'mime', 'producto_id'];
    
    //Uno a muchos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }




}
