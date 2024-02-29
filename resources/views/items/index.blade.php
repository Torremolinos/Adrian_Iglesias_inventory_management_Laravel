<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>
    <!--Los comentarios son como en html, aqui empieza el div de Tailwind para el margen-->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!--Aqui traigo una tabla de la pagina de tailwind.-->
                    <table class="table auto">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Caja</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($items as $item)
                                <td>{{$item->name}}</td>
                                <td>{{$item->box->label}}</td>
                                <td class="flex space-x-10 sm:-my-px sm:ms-10">
                                    <a href="{{ route('items.show', $item->id) }}">Ver</a>
                                    <a href="{{ route('items.edit', $item->id) }}">Editar</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                    <button>Prestar</button>
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