@extends('vacantes.layout_vacantes')

@section('titulo')
    {{ $vacante->titulo }}
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
    <div class="p-10">
        <livewire:mostrar-vacante :vacante="$vacante" />
    </div>
@endsection

{{-- ========== --}}

@push('scripts')
    {{-- Insertar los scripts que corresponden a la página --}}
@endpush