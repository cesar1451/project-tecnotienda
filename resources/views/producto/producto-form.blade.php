<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/2 mx-auto bg-white p-24">
            @isset($producto)
                <form action="{{ route('productos.update', $producto->id ) }}" method="POST" enctype="multipart/form-data"> {{-- Update --}}
                    @method('PATCH')
            @else
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data"> {{-- Crear --}}
            @endisset            
            @csrf
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre: </label>
                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="nombre"
                            name="nombre"
                            minlength="1"
                            placeholder="Nombre Producto"
                            
                            value="{{ old('nombre') }}{{ isset($producto) ? $producto->nombre : '' }}"
                            required
                        />
                        @error('nombre')
                            <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="marca" class="form-label inline-block mb-2 text-gray-700">Marca: </label>
                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="marca"
                            name="marca"
                            minlength="1"
                            placeholder="Marca"
                            value="{{ old('marca') }}{{ isset($producto) ? $producto->marca : '' }}"
                            required
                        />
                        @error('marca')
                            <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="modelo" class="form-label inline-block mb-2 text-gray-700"
                            >Modelo: </label
                        >
                        <input
                            type="text"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="modelo"
                            id="Modelo"
                            minlength="1"
                            placeholder="Modelo"
                            value="{{ old('modelo') }}{{ isset($producto) ? $producto->modelo : '' }}"
                            required
                        />
                        @error('modelo')
                            <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="precio" class="form-label inline-block mb-2 text-gray-700"
                            >Precio: </label
                        >
                        <input
                            type="number" step="any" min="0.0"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="precio"
                            id="Precio"
                            placeholder="Precio"
                            value="{{ old('precio') }}{{ isset($producto) ? $producto->precio : '' }}"
                            required
                        />
                        @error('precio')
                            <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="cantidad" class="form-label inline-block mb-2 text-gray-700"
                            >Cantidad: </label
                        >
                        <input
                            type="number" min="0"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            name="cantidad"
                            id="Cantidad"
                            placeholder="Cantidad"
                            value="{{ old('cantidad') }}{{ isset($producto) ? $producto->cantidad : '' }}"
                            required
                        />
                        @error('cantidad')
                            <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="descripcion" class="form-label inline-block mb-2  text-gray-700"
                            >Descripción: </label
                        >
                        <textarea
                                class="form-control block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none text-left"
                                id="descripcion"
                                rows="3"                            
                                name="descripcion">
                                {{ old('descripcion') }}{{ isset($producto) ? $producto->descripcion : '' }}
                        </textarea>                     
                    </div>
                </div>
                {{--  Etiquetas  --}}                       
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="etiquetas" class="form-label inline-block mb-2 text-gray-700"
                            >Etiquetas: </label>
                        <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="Etiquetas" 
                        name="etiquetas_id[]"  multiple>                      
                            @foreach ($etiquetas as $etiqueta)
                                    {{-- <option value="{{ $etiqueta->id }} {{ isset($producto) ? ($producto->etiquetas->nombre == $etiqueta->nombre ? 'selected' : '') : '' }}"> {{ $etiqueta->nombre }} </option> --}}
                                    <option value="{{ $etiqueta->id }}" {{ isset($producto) && array_search($etiqueta->id, $producto->etiquetas->pluck('id')->toArray()) !== false ? ' selected' : '' }}>{{ $etiqueta->nombre }}</option>
                            @endforeach 
                        </select>
                        @error('etiqueta')
                            <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>  
                {{--  Archivos  --}}     
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">               
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label for="archivos" class="form-label inline-block mb-2 text-gray-700"> Subir Fotos: </label>                        
                            <input type='file' name="archivos[]" multiple accept="image/*"></input>                               
                        </div> 
                    </div>
                </div>  
                <button type="submit" class=" mt-4 w-1/3 float-right bg-blue-500 mx-4 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">Guardar</button>                            
            </form>
            <a href=" {{ url('/productos') }}" class="text-center mt-4 w-1/3 float-right bg-red-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-red-700 transition duration-300"
                          type="submit">
            Cancelar</a>         
        </div>
        {{--  Script  --}}                      
</x-app-layout>
