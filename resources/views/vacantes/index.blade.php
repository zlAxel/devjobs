@extends('vacantes.layout_vacantes')

@section('titulo')
    Mis vacantes
@endsection

{{-- ========== --}}

@push('styles')
    {{-- Insertar los estilos que corresponden a esta página --}}
@endpush

{{-- ========== --}}

@section('mensajes')
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
            {{ session('mensaje') }}
        </div>
    @endif
@endsection

{{-- ========== --}}

@section('contenido')
    <livewire:mostrar-vacantes />
@endsection

{{-- ========== --}}

@push('scripts')
    {{-- Insertar los scripts que corresponden a esta página --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script>
        Livewire.on('btn_eliminarVacante', ({ id, vacante }) => {
            Swal.fire({
                title: '¿Eliminar vacante?',
                text: "Si eliminas la vacante, no la podrás recuperar.",
                footer: vacante,
                icon: 'warning',
                showCancelButton: true,
                // confirmButtonColor: '#1e293b',
                // cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emit('eliminarVacante', id);

                    Livewire.on('vacanteEliminada', (response) => {
                        if(response){
                            Swal.fire(
                                '¡Listo!',
                                'Se eliminó la vacante correctamente.',
                                'success'
                            )
                        }
                    });
                    
                    
                }
            })
        })
    </script>
@endpush