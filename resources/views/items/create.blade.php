<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class=" text-black ">Add new item</h1>
                    <br><hr><br>
                    <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                        <!--El token Cross-Site Request Forgery es una medida de seguridad utilizada para rpoteger las aplicaciones web de ataques maliciosos
ell Token es un valor unico y secreto que se genera para cada formulario en la aplicacion. Se envia al enviar el formulario
y laravel debe verificar si coincide.-->
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                        <label for="make">Description</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                        <label for="make">Price</label>
                        <input type="text" class="form-control" name="price" id="price" required>
                        <br><br><hr>
                        <label for="box_id">Box ID</label>
                        <br>
                        <select name="box_id" id="box" class="bg-gray-100 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-full">
                            <option value="">Select a box</option>
                            @foreach ($boxes as $box)
                            <option value="{{ $box->id }}">{{ $box->label }}</option>
                            @endforeach
                        </select>
                        <br><br><hr>
                        <label for="picture">Picture</label>
                        <br>
                        <input type="file" class="form-control-file" name="picture" id="picture">
                        <br><br>
                        <button type="submit" class="bg-blue-200 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add</button>
                    </form>
                    <br>
                    <a href="{{ route('items.index') }}" class="bg-blue-100 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Volver a la página principal sin crear nada.</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>