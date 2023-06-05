<div>

    <livewire:filtrar-vacantes />
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12">
                Nuestras vacantes disponibles
            </h3>

            <div class="bg-white shadow-sm rounded-lg p-6 border border-gray-200 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5 border border-gray-200 p-5">
                        <div class="md:flex-1">
                            <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-2xl font-extrabold text-gray-600">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-base text-gray-600 mt-2 ">
                                {{ $vacante->empresa }}
                            </p>
                            <p class="text-base text-gray-600">
                                {{ $vacante->categoria->categoria }}
                            </p>
                            <p class="text-base text-gray-600 mb-3">
                                {{ $vacante->salario->salario }}
                            </p>
                            <p class="text-sm text-gray-600 mb-3">
                                Último día para postularse:
                                <span class="font-bold">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span>
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('vacantes.show', $vacante->id) }}" class="block bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center w-full">
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-sm text-gray-600 p-3">No hay vacantes aún</p>
                @endforelse
            </div>
        </div>
    </div>
</div>