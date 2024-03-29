<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Préstamos') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Nuevo Préstamo</h1>
                    <br>
                    <hr><br>
                    <form action="{{ route('loans.store') }}" method="post" enctype="multipart/form-data">
                        <!--El token Cross-Site Request Forgery es una medida de seguridad utilizada para rpoteger las aplicaciones web de ataques maliciosos
ell Token es un valor unico y secreto que se genera para cada formulario en la aplicacion. Se envia al enviar el formulario
y laravel debe verificar si coincide.-->
                        @csrf
                        <label for="Item">Item</label>
                        <select class="form-control" name="item_id" id="item_id" required>
                            <option value="">Selecciona un ítem</option>
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ old('item_id', isset($selectedItem) ? $selectedItem : '') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="due_date">Fecha de devolucion esperada</label>
                        <input type="date" class="form-control" name="due_date" id="due_date" required>
                        <br><br>
                        <hr><br>
                        <button type="submit" class="bg-blue-200 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Crear préstamo</button>
                    </form>
                    <br>
                    <a href="{{ route('items.index') }}" class="bg-blue-100 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Volver a la página principal sin crear nada.</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>