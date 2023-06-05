<div>
    @forelse ($vacantes as $vacante)
        <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center" style="border-bottom: 1px solid #80808030;">
            <div class="space-y-3">
                <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p>
                    {{ $vacante->empresa }}
                </p>
                <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch text-center gap-3 mt-4 md:mt-0">
                <a href="{{ route('candidatos.index', $vacante) }}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase flex gap-1">
                    {{ $vacante->candidatos->count() }} <span>@choice("Candidato|Candidatos", $vacante->candidatos->count())</span>
                </a>
                <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                    Editar
                </a>
                <button wire:click="$emit('btn_eliminarVacante', { id: {{ $vacante->id }}, vacante: '{{ $vacante->titulo }}' } )" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                    Eliminar
                </button>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes registradas aún</p>
    @endforelse

    @if ($vacantes->hasPages())
        <div class="flex justify-center my-6">
            {{ $vacantes->links() }}
        </div>
    @endif
</div>