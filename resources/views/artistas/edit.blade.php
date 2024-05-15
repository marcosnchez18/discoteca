<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST"
            action="{{ route('artistas.update', ['artista' => $artista]) }}">
            @csrf
            @method('PUT')


            <!-- nombre -->
            <div>
                <x-input-label for="nombre" :value="'nombre del album'" />
                <x-text-input id="nombre" class="block mt-1 w-full"
                    type="text" name="nombre" :value="old('nombre', $album->nombre)" required
                    autofocus autocomplete="nombre" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

         

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('albumes.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
