<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'nombre_hash', 'mime', 'producto_id'];
    
    //Uno a muchos
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
