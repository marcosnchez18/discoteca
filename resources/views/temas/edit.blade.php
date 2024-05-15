<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST"
            action="{{ route('temas.update', ['tema' => $tema]) }}">
            @csrf
            @method('PUT')

            <!-- Titulo -->
            <div>
                <x-input-label for="titulo" :value="'Titulo del tema'" />
                <x-text-input id="titulo" class="block mt-1 w-full"
                    type="text" name="titulo" :value="old('titulo', $tema->titulo)" required
                    autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="anyo" :value="'anyo del tema'" />
                <x-text-input id="anyo" class="block mt-1 w-full"
                    type="text" name="anyo" :value="old('anyo', $tema->anyo)" required
                    autofocus autocomplete="anyo" />
                <x-input-error :messages="$errors->get('anyo')" class="mt-2" />
            </div>


            <div>
                <x-input-label for="duracion" :value="'duracion del tema'" />
                <x-text-input id="duracion" class="block mt-1 w-full"
                    type="text" name="duracion" :value="old('duracion', $tema->duracion)" required
                    autofocus autocomplete="duracion" />
                <x-input-error :messages="$errors->get('duracion')" class="mt-2" />
            </div>




            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('temas.index') }}">
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
