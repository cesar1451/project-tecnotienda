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
        Etiqueta::create(['nombre'=> 'Memoria RAM']);
        Etiqueta::create(['nombre' => 'Tarjeta Madre']);
        Etiqueta::create(['nombre' => 'Tarjeta de video']);
        Etiqueta::create(['nombre' => 'Procesador']);
    }
}
