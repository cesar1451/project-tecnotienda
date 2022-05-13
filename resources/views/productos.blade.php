<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('producto.create') }}">
                        Agregar producto
                    </a>
                </h4>
                
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                      >
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Dependencia</th>
                        <th class="px-4 py-3">Calendario</th>
                        <th class="px-4 py-3">Titular</th>
                        <th class="px-4 py-3">Folio</th>
                        <th class="px-4 py-3">Usuario</th>
                        <th class="px-4 py-3">Acciones</th>
                      </tr>
                    </thead>
                    <tbody
                      class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
