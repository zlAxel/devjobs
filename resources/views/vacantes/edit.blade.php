@extends('vacantes.layout_vacantes')

@section('titulo')
    Editar vacante
@endsection

{{-- ========== --}}

@push('styles')
    {{-- Insertar los estilos que corresponden a esta página --}}
@endpush

{{-- ========== --}}

@section('mensajes')
    {{-- Insertar mensajes al usuario --}}
@endsection

{{-- ========== --}}

@section('contenido')
    <h1 class="text-2xl font-bold text-center mt-8 flex flex-col">Editar vancante <sup class="sup text-lg pl-1">({{ $vacante->titulo }})</sup></h1>

    <div class="md:flex md:justify-center">
        <livewire:editar-vacante :vacante="$vacante" />
    </div>
@endsection

{{-- ========== --}}

@push('scripts')
    {{-- Insertar los scripts que corresponden a la página --}}
@endpush