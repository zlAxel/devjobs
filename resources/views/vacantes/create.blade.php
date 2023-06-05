@extends('vacantes.layout_vacantes')

@section('titulo')
    Crear vacante
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
    <h1 class="text-2xl font-bold text-center mt-4 mb-5">Públicar vancante</h1>

    <div class="md:flex md:justify-center p-5">
        <livewire:crear-vacante />
    </div>
@endsection

{{-- ========== --}}

@push('scripts')
    {{-- Insertar los scripts que corresponden a la página --}}
@endpush