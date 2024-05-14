<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('albumes.inserta') }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="album_id" :value="'Albumes'" />
                <select id="album_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="album_id">
                    @foreach ($albumes as $album)
                        <option value="{{ $album->id }}"
                            {{ old('album_id') == $album->id ? 'selected' : '' }}
                            >
                            {{ $album->titulo }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('album_id')" class="mt-2" />
            </div>




            <div class="mt-4">
                <x-input-label for="tema_id" :value="'temas'" />
                <select id="tema_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="tema_id">
                    @foreach ($temas as $tema)
                        <option value="{{ $tema->id }}"
                            {{ old('tema_id') == $tema->id ? 'selected' : '' }}
                            >
                            {{ $tema->titulo }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('tema_id')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('albumes.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>


