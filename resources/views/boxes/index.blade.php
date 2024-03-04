<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cajas') }}
            </h2>
        </div>
    </x-slot>
    <!--Los comentarios son como en html, aqui empieza el div de Tailwind para el margen-->
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Session::get('success'))
                    <div class="alert alert-success mt-2 text-white bg-green-300 text-center">
                        <strong>{{Session::get('success')}}</strong>
                    </div>
                    @endif

                    <!--Aqui pongo un anchor para crear un nuevo item. basicamente te lleva a la pagina create.blade.php-->
                    <div class="flex justify-center mb-4"><a href="{{ route('boxes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Nueva Caja</a></div>
                    <!--Aqui traigo una tabla de la pagina de tailwind.-->
                    <table class="table auto">
                        <thead>
                            <tr>
                                <th>Etiqueta</th>
                                <th>Ubicación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($boxes as $box)
                              
                                <td class="px-6 py-4">
                                    <div >{{$box->label}}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div >
                                      {{$box->location}}
                                    </div>
                                </td>
                                <td class="flex py-3 space-x-10 sm:-my-px sm:ms-10">
                                    <a href="{{ route('boxes.show', $box->id) }}" class=" text-blue-800 font-bold">Ver</a>
                                    <a href="{{ route('boxes.edit', $box->id) }}" class=" text-blue-800 font-bold">Editar</a>
                                    <form action="{{ route('boxes.destroy', $box->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" text-red-800 font-bold">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>