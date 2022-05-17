<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>
    {{--  Vista del Show de Producto en especifico  --}}       
    <div class="py-12 md:container md:mx-auto">
        <div class="w-3/4 mx-auto bg-white p-24">
            <h3 class="text-center font-sans text-2xl"> {{ $producto->nombre }} </h3> <br>
            <p> Marca: {{ $producto->marca }}</p> <br>
            <p> Modelo: {{ $producto->modelo }}</p> <br>
            <p> Precio: ${{ $producto->precio }}</p> <br>
            <p> Cantidad: {{ $producto->cantidad }}</p> <br>
            <p> Descripción: {{ $producto->descripcion }}</p> <br>
            <p> Etiquetas: </p> <br>
            @foreach ($producto->etiquetas as $etiqueta)
                <p> {{ $etiqueta->nombre }}</p> <br>                
            @endforeach
            <p> Archivos: </p> <br>
            @foreach ($producto->archivos as $archivo)
                <p> {{ $archivo->nombre }}</p> <br>               
            @endforeach
            <a href="/productos" class="bg-gray-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-gray-700 transition duration-300"> Regresar </a>
        </div>
    </div>
</x-app-layout>
