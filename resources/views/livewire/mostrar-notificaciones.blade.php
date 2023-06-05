<div class="p-5">
    <h1 class="text-2xl font-bold text-center mt-4 mb-5">Mis notificaciones</h1>

    @forelse ($notificaciones as $notificacion)
        <div class="p-5 border border-gray-200 md:flex justify-between items-center">
            <div>
                <p>
                    Tienes un nuevo candidato en:
                    <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                </p>
                <p class="mt-3">
                    <span class="font-bold text-gray-600 text-sm">{{ ucfirst($notificacion->created_at->diffForHumans()) }}</span>
                </p>
            </div>
            <div class="mt-4 md:mt-0 flex flex-col">
                <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Ver candidatos
                </a>
                <a wire:click="markNotificationAsRead('{{ $notificacion->id }}')" class="p-2 px-4 rounded-lg text-xs font-bold uppercase cursor-pointer" style="position: relative; top: 8px;">
                    Marcar como leído
                </a>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-600">No hay notificaciones nuevas</p>
    @endforelse
</div>