<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Préstamos') }}
            </h2>
        </div>
    </x-slot>
    <!--Los comentarios son como en html, aqui empieza el div de Tailwind para el margen-->
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Verificar si hay un mensaje de éxito -->
                    @if (Session::has('success'))
                    <div class="alert alert-success mt-2 text-white bg-green-300 text-center">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                    @endif
                    
                    <!-- Tabla de préstamos -->
                    <table class="table auto">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Ítem</th>
                                <th>Fecha de préstamo</th>
                                <th>Fecha de devolución</th>
                                <th>Fecha de retorno</th>
                            </tr>
                        </thead>
                        @foreach ($loans as $loan)
                        <tr>
                            <td>{{ $users->find($loan->user_id)->name }}</td>
                            <td>{{ $items->find($loan->item_id)->name }}</td>
                            <td>{{ $loan->checkout_date }}</td>
                            <td>{{ $loan->due_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap bg-white">
                                <div class="text-center text-sm font-medium text-gray-900">
                                    @if ($loan->returned_date === null)
                                    @if ($loan->user_id === Auth::id())
                                    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-blue-600 hover:underline focus:outline-none">
                                           Marcar como devuelto
                                        </button>
                                    </form>
                                    @else
                                    <span class="text-red-600">No devuelto</span>
                                    @endif
                                    @else
                                    {{ $loan->returned_date }}
                                    @endif
                                </div>
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