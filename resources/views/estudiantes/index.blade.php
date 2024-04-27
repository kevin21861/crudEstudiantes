<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Estudiantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <a href="{{ route('estudiantes.create') }}" class="bg-cyan-500 border-b dark:bg-cyan-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                   
                    Crear Estudiante
                </a>
                

                <table class="table-auto w-full"
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-agray-900 dark:text-white text-center">id</th>
                            <th class="px-4 py-3 text-agray-900 dark:text-white text-center">nombre</th>
                            <th class="px-4 py-3 text-agray-900 dark:text-white text-center">curso</th>
                            <th class="px-4 py-3 text-agray-900 dark:text-white text-center">botones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante )
                        <tr>
                            <th class="px-4 py-3 text-agray-900 dark:text-white text-center">{{ $estudiante->id}}</th>
                            <th class="px-4 py-3 text-agray-900 dark:text-white text-center">{{ $estudiante->nombre}}</th>
                            <th class="px-4 py-3 text-agray-900 dark:text-white text-center">{{ $estudiante->curso}}</th>
                            <td class="px-4 py-3 text-center">
                              
                                <form action="{{route('estudiantes.destroy', $estudiante->id)}}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit"class="bg-cyan-500 border-b dark:bg-cyan-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">  
                                        Eliminar
                                    </button>
                                    
                                    <a href="{{route('estudiantes.edit', $estudiante->id)}}" class="bg-cyan-500 border-b dark:bg-cyan-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">Editar</a>
                                
                                </form>
                               
                                
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>


                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>