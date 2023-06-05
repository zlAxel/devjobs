@extends('vacantes.layout_vacantes')

@section('titulo')
    Notificaciones
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
    <livewire:mostrar-notificaciones :notificaciones="$notificaciones" />
@endsection

{{-- ========== --}}

@push('scripts')
    {{-- Insertar los scripts que corresponden a la página --}}
@endpush