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
                        <h1 class="text-2xl font-bold mb-4">Edit Item</h1>
                        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripcion</label>
                                <input type="text" class="form-control" name="description" id="description" value="{{ $item->description }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{ $item->price }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="box_id" class="block text-gray-700 text-sm font-bold mb-2">Box</label>
                                <select name="box_id" id="box" class="bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                                    <option value="">Select a box</option>
                                    @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="picture" class="block text-gray-700 text-sm font-bold mb-2">Photo</label>
                                <input type="file" class="form-control-file" name="picture" id="picture">
                                <img src="{{ Storage::url($item->picture) }}" alt="picture" width="100" height="100">
                            </div>
                            <div class="flex justify-between">
                                <a href="{{ route('items.index') }}" class="text-blue-500 hover:underline">Back</a>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>