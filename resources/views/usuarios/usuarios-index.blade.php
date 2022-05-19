<x-main>
    <x-slot:title>
        TecnoTienda - Usuarios
    </x-slot:title>
    <x-nav></x-nav>
    {{--  Cuerpo   --}}       
    <!-- ====== Cards Section Start -->
    <section class="pt-20 lg:pt-[40px] pb-10 lg:pb-20 bg-white">        
        <div class="container">            
            <div class="flex flex-wrap mx-4">            
                @foreach ($productos as $producto)
                    <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                        <div class="bg-white rounded-lg overflow-hidden mb-10">
                            @foreach ($producto->archivos as $archivo)
                                <img
                                src="data:image/jpeg;base64,{{ base64_encode(\Storage::get($archivo->nombre_hash))}}"
                                alt="{{ $archivo->nombre }}"
                                class="w-full"
                                />
                            @endforeach                            
                            <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                                <h3 class="
                                        font-semibold
                                        text-dark text-xl
                                        sm:text-[22px]
                                        md:text-xl
                                        lg:text-[22px]
                                        xl:text-xl
                                        2xl:text-[22px]
                                        mb-4
                                        block
                                        hover:text-primary
                                        "
                                        >
                                    {{ $producto->nombre }}                              
                                </h3>
                                <p class="text-left text-body-color leading-relaxed mb-7">
                                    Marca: {{ $producto->marca }} <br> 
                                    Modelo: {{ $producto->modelo }} <br>
                                    Precio: ${{ $producto->precio }} <br> 
                                    Cantidad: {{ $producto->cantidad }} <br>
                                    Descripción: {{ $producto->descripcion }}  
                                </p>  
                                <div class="flex flex-wrap justify-starts items-center mt-6">
                                    @foreach ($producto->etiquetas as $etiquetas)
                                        <div class="text-xs mb-2 mr-2 py-1.5 px-4 text-gray-600 bg-purple-200 rounded-2xl">
                                            # {{ $etiquetas->nombre }}
                                        </div>
                                    @endforeach                                        
                                </div>                            
                            </div>                           
                        </div>                       
                    </div>                    
                @endforeach                                                      
            </div>
        </div>
    </section>
    <!-- ====== Cards Section End -->       
    {{--  Script  --}}   
    <script>       
    </script>         
    <x-footer></x-footer>
</x-main>