<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Etiquetas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-1/3 mx-auto bg-white p-24">
            <form action="/etiqueta" method="POST">
                @csrf
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre: </label>
                        <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="nombre"
                            name="nombre"
                            placeholder="Nombre Etiqueta"
                        />
                    </div>
                </div>                
                <button type="submit" class=" mt-4 w-1/3 float-right bg-blue-500 mx-4 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300">Guardar</button>                            
            </form>
            <a href=" {{ url('/etiquetas') }}" class="text-center mt-4 w-1/3 float-right bg-red-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-red-700 transition duration-300"
                          type="submit">
            Cancelar</a>           
        </div>
</x-app-layout>
