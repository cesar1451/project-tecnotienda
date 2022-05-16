<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etiqueta;


class EtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etiqueta::create(['nombre'=> 'Nuevo']);
        Etiqueta::create(['nombre' => 'Garantia']);
        Etiqueta::create(['nombre' => 'Usado']);
        Etiqueta::create(['nombre' => 'Descuento']);
    }
}
