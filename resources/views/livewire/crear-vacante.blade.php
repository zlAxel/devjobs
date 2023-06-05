<form wire:submit.prevent="crearVacante" class="md:w-1/2 space-y-5 p-12 text-gray-900" enctype="multipart/form-data">
    <div>
        <x-input-label for="titulo" :value="__('Título de la vacante')" />
        <x-text-input wire:model="titulo" id="titulo" :value="old('titulo')" type="text" class="block mt-1 w-full" autofocus placeholder="Escriba el título de la vacante" />
        <x-input-error :messages="$errors->get('titulo')" />
    </div>
    {{-- ===================================== --}}
    <div>
        <x-input-label for="salario" :value="__('Salario')" />
        <select wire:model="salario" id="salario" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
            <option value="">Selecciona un salario</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')" />
    </div>
    {{-- ===================================== --}}
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select wire:model="categoria" id="categoria" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
            <option value="">Selecciona un categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('categoria')" />
    </div>
    {{-- ===================================== --}}
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input wire:model="empresa" id="empresa" class="block mt-1 w-full" type="text" :value="old('empresa')" placeholder="Escriba el nombre de la empresa" />
        <x-input-error :messages="$errors->get('empresa')" />
    </div>
    {{-- ===================================== --}}
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input wire:model="ultimo_dia" id="ultimo_dia" class="block mt-1 w-full" type="date" :value="old('ultimo_dia')" />
        <x-input-error :messages="$errors->get('ultimo_dia')" />
    </div>
    {{-- ===================================== --}}
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del puesto')" />
        <textarea wire:model="descripcion" id="descripcion" placeholder="Escriba la descripción completa de la vacante" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 h-36"
        >{{ old('descripcion') }}</textarea>
        <x-input-error :messages="$errors->get('descripcion')" />
    </div>
    {{-- ===================================== --}}
    <div>
        <div class="flex">
            <x-input-label for="imagen" :value="__('Imágen')">
                <x-slot name="sup">
                    <sup class="sup">(MAXIMO 1MB)</sup>
                </x-slot>
            </x-input-label>
        </div>
        <x-text-input wire:model="imagen" id="imagen" type="file" accept="image/*" class="block mt-1 w-full" />

        <div class="w-80 my-5">
            @if ($imagen)
                <p class="block font-medium text-lg text-gray-700 pl-2">Imagen cargada:</p>
                <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen cargada del usuario">
            @endif
        </div>

        <x-input-error :messages="$errors->get('imagen')" />
    </div>
    {{-- ===================================== --}}
    <x-primary-button>
        {{ __('Crear vacante') }}
    </x-primary-button>
    {{-- ===================================== --}}
</form>