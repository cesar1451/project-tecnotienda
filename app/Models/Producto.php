<?php

namespace App\Models;

use App\Models\Etiqueta;
use App\Models\Archivo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'marca', 'modelo', 'precio', 'cantidad', 'descripcion'];

    //Relación muchos a muchos
    public function etiqeutas(){
        return $this->belongsToMany(Etiqueta::class, 'etiqueta_productos');
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
