<div class="bg-gray-100 p-5 mt-10 flex flex-col items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Postularme a esta vacante
    </h3>
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
            {{ session('mensaje') }}
        </div>
    @else
        <form wire:submit.prevent="postularme" enctype="multipart/form-data" class="w-96">
            <div class="my-4">
                <x-input-label for="cv" :value="__('Curriculum / Hoja de Vida')" />
                <x-text-input wire:model="cv" id="cv" class="block mt-1 w-full" type="file" accept=".pdf" />
                <x-input-error :messages="$errors->get('cv')" />
            </div>
            {{-- ===================================== --}}
            <x-primary-button class="mt-4">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif
</div>
