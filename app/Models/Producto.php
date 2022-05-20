<?php

namespace App\Models;

use App\Models\Etiqueta;
use App\Models\Archivo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'marca', 'modelo', 'precio', 'cantidad', 'descripcion', 'user_id'];

    //Relación muchos a muchos
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }

    //Uno a muchos
    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }

    //Accessor
    public function precio(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "$". number_format($value, 2),
        );
    }
}
