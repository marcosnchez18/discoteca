<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">
                        Titulo
                    </th>

                    <th class="px-6 py-3">
                        Duración
                    </th>
                    <th class="px-6 py-3">
                        Año
                    </th>
                    <th class="px-6 py-3">
                        Número de artistas
                    </th>
                    <th class="px-6 py-3">
                        Número de albumes
                    </th>


                    <th class="px-6 py-3">
                        Editar
                    </th>
                    <th class="px-6 py-3">
                        Borrar
                    </th>
                </tr>
            </thead>
            <br><br><br>
            <tbody>
                @foreach ($temas as $tema)
                    <tr class="bg-white border-b">


                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a href="{{ route('temas.show', ['tema' => $tema]) }}" class="text-blue-500">
                                {{ $tema->titulo }}
                            </a>
                        </th>

                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $tema->duracion }}
                        </th>

                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $tema->anyo }}
                        </th>
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {!! $tema->cant_artistas() !!}
                        </th>
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {!! $tema->cant_albumes() !!}
                        </th>

                        <td class="px-6 py-4">
                            <a href="{{ route('temas.edit', ['tema' => $tema]) }}"
                                class="font-medium text-blue-600 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('temas.destroy', ['tema' => $tema]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('temas.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar un nuevo tema</x-primary-button>
        </form>

    </div>
</x-app-layout>
