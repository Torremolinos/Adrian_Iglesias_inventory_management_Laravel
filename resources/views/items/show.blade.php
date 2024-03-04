<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>
    <!--Los comentarios son como en html, aqui empieza el div de Tailwind para el margen-->
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="text-2xl font-bold mb-4">{{$item->name}}</h1>
                        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <div class="">{{$item->name}}</div>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripcion</label>
                                <div class="">{{$item->description}}</div>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                <div class="">{{$item->price}}€</div>
                            </div>
                            <div class="mb-4">
                                <label for="box_id" class="block text-gray-700 text-sm font-bold mb-2">Box</label>
                                <div class="">{{$item->box->label}}</div>
                            </div>
                            <div class="mb-4">
                                <label for="picture" class="block text-gray-700 text-sm font-bold mb-2">Photo</label>
                                @if ($item->picture)
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                        @endif
                            </div>
                            <a href="{{ route('items.edit', $item->id) }}" class=" text-blue-800 font-bold">Editar</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" text-red-800 font-bold">Delete</button>
                                    </form>
                            <div class="flex justify-between">
                                <a href="{{ route('items.index') }}" class="text-blue-500 hover:underline">Volver a la lista</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>