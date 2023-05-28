<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>

    <!-- titulo -->
    <div>
        <x-input-label for="titulo" :value="__('Título de la vacante')" />

        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Ej: Programador" />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />

    </div>

    <!-- salario -->
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select id="salario" wire:model="salario"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
            <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>

    <!-- categoría -->
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />

        <select id="categoria" wire:model="categoria"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="">-- Seleccione --</option>

            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>

    <!-- empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Ej: Youtube" />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>

    <!-- Fecha límite -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Fecha límite')" />

        <x-text-input id="ultimo_dia" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"
            class="block mt-1 w-full" />
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>


    <!-- Descrición -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Descripción del puesto')" />
        <textarea wire:model="descripcion" placeholder="Descripción del puesto de trabajo, experiencia"
            class="h-72 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>

        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <!-- imagen -->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*"/>
        <div class="my-5 w-80" >
            @if($imagen)
                Imagen:
                <img src="{{$imagen->temporaryUrl()}}">
            @endif
        </div>
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    <!-- Botón -->
    <div>
        <x-primary-button>Crear vacante</x-primary-button>
    </div>
</form>