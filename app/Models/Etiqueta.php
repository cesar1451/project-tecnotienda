<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Etiqueta extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nombre'];


    //Relación muchos a muchos
    public function productos(){
        return $this->belongsToMany(Producto::class);
    }

    public function nombre(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst($value),
            get: fn ($value) => ucfirst($value),
        );
    }

}
