<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
         {{--  Crear Tabla  --}}
    <div class="w-10/12 mx-auto">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <div class="p-4">
              <label for="table-search" class="sr-only">Search</label>
              <div class="relative mt-1">
                  <a class="bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300 float-right" 
                  href="{{ url('/productos/create')}}">
                  Agregar
                    </a>
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                      </svg>
                  </div>
                  <input type="text" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">                                        
              </div>                            
          </div>            
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                    ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Marca
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Modelo
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>                  
                    {{--  <th scope="col" class="px-6 py-3">
                        Etiquetas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripción
                    </th>    --}}                  
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($productos as $producto)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $producto->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $producto->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $producto->marca }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->modelo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->precio }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->cantidad }}
                        </td>
                       {{--   <td class="px-6 py-4">
                            @foreach ($producto->etiquetas as $etiqueta)
                            {{ $etiqueta->nombre }} <br>
                            @endforeach                            
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->descripcion }}
                        </td>  --}}
                        <td class="px-6 py-4 text-center flex space-x-2">
                            <a href="{{ route('productos.show', $producto->id) }}" class="font-bold text-white py-2 px-2 rounded cursor-pointer
                            bg-purple-600 hover:bg-purple-700">
                                <i class="fas fa-search fa-solid fa-eye-dropper-half"></i>
                            </a>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="font-bold text-white py-2 px-2 rounded cursor-pointer
                            bg-green-600 hover:bg-green-700" >
                                <i class="fas fa-edit fa-solid fa-eye-dropper-half"></i>
                            </a>
                            <form action="{{ route('productos.destroy', $producto->id ) }}" method="POST">
                                @csrf
                                @method('DELETE')                                        
                                <button type="submit" class="font-bold text-white py-2 px-2 rounded cursor-pointer
                                bg-red-600 hover:bg-red-700">                                      
                                    <i class="fas fa-trash fa-solid fa-eye-dropper-half"></i>                                    
                                </button>  
                            </form> 
                        </td>
                    </tr>                   
                  @endforeach                  
              </tbody>
          </table>         
          <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
      </div>
    </div>
</x-app-layout>
