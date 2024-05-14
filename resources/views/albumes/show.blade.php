<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>



                    <th class="px-6 py-3">
                        Título
                    </th>


                    <th class="px-6 py-3">
                        Año
                    </th>

                    <th class="px-6 py-3">
                        Temas
                    </th>
                    <th class="px-6 py-3">
                        Duración
                    </th>



                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">


                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $album->titulo }}
                    </td>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$album->anyo}}
                    </th>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $album->nombres_canciones() !!}
                    </th>

                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $album->duracion_album() !!}
                    </th>




                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
