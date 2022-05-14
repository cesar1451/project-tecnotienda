<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-10/12 mx-auto bg-white p-16">
            <form action="/producto" method="POST">
            @csrf
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre: </label>
                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="nombre"
                            name="nombre"
                            placeholder="Nombre Producto"
                        />
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="marca" class="form-label inline-block mb-2 text-gray-700">Marca: </label>
                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="marca"
                            name="marca"
                            placeholder="Marca"
                        />
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
                            placeholder="Modelo"
                        />
                    </div>
                </div>
                <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>            
            </form>
            

            {{-- @include('partials.form-errors') 

            @if (isset($programa))
          Edición de programa 
              <form action="{{ route('programa.update', $programa) }}" method="POST">
                  @method('PATCH')
          @else 
           Creación de programa 
             <form action="/producto"  method="POST">
                @endif 

                @csrf
                <!-- This example requires Tailwind CSS v2.0+ 
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Nuevo Producto</h3>                      
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                                <div class="mb-3 xl:w-96">
                                    <input
                                      type="text" name="nombre"
                                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                      id="nombre"
                                      placeholder="Ej: Teclado Hyperx "
                                      value="{{ old('nombre') ?? $producto->nombre ?? '' }}"
                                    />
                                    @error('nombre')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Marca</dt>
                                <div class="mb-3 xl:w-96">
                                    <input
                                      type="text" name="marca"
                                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                      id="marca"
                                      placeholder="Ej: Hyperx "
                                      value="{{ old('marca') ?? $producto->marca ?? '' }}"
                                    />
                                    @error('marca')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Modelo</dt>
                                <div class="mb-3 xl:w-96">
                                    <input
                                      type="text" name="modelo"
                                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                      id="modelo"
                                      placeholder="Ej: Alloy Origins "
                                      value="{{ old('modelo') ?? $producto->modelo ?? '' }}"
                                    />
                                    @error('modelo')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Precio</dt>
                                <div class="mb-3 xl:w-96">
                                    <input
                                      type="number" name="precio"
                                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                      id="precio"
                                      placeholder="Ej: 2300 "
                                      value="{{ old('precio') ?? $producto->precio ?? '' }}"
                                    />
                                    @error('precio')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Cantidad</dt>
                                <div class="mb-3 xl:w-96">
                                    <input
                                      type="number" name="cantidad"
                                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                      id="cantidad"
                                      placeholder="Ej: 15 "
                                      value="{{ old('cantidad') ?? $producto->cantidad?? '' }}"
                                    />
                                    @error('cantidad')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                                <div class="mb-3 xl:w-96">                                
                                    <textarea
                                      class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                      id="exampleFormControlTextarea1"
                                      rows="3"
                                      placeholder="Descripción"
                                      name="descripcion"
                                      value="{{ old('descripcion') ?? $producto->descripcion ?? '' }}"
                                    ></textarea>
                                    @error('descripcion')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                  </div>
                                    
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Cantidad</dt>
                                <div class="mb-3 xl:w-96">
                                    <div class="flex justify-center">
                                        <div class="mb-3 w-96">
                                          <label for="formFileMultiple" class="form-label inline-block mb-2 text-gray-700">Multiple files input example</label>
                                          <input name="formFileMultiple" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                                          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFileMultiple" multiple>
                                        </div>
                                    </div>
                                      
                                    <!-- Custom scripts 
                                    <script type="text/javascript">
                                    const checkbox = document.getElementById("flexCheckIndeterminate");
                                    checkbox.indeterminate = true;
                                    </script>  -
                                    @error('formFileMultiple')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex space-x-2 justify-center">
                        <div>
                          <button  type="button" class="inline-block px-6 py-2.5 bg-blue-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                          type="submit">
                          Guardar</button>
                          <button type="button" class="inline-block px-6 py-2.5 bg-purple-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-lg hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                          type="submit">
                          Cancelar</button>
                        </div>
                      </div>
                </div>
            </form> --}}
        </div>
</x-app-layout>
