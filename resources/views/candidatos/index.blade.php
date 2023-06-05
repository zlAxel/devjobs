@extends('vacantes.layout_vacantes')

@section('titulo')
    Candidatos de la vacante
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
    <h1 class="text-2xl font-bold text-center mt-8 mb-5">Vacante: {{ $vacante->titulo }}</h1>

    <div class="md:flex md:justify-center p-5">
        <ul class="border border-gray-200 divide-y divide-gray-200 w-full">
            @forelse ($vacante->candidatos as $candidato)
                <li class="p-5 flex items-center">
                    <div class="flex-1">
                        <p class="text-xl font-medium text-gray-800">
                            {{ $candidato->user->name }}
                        </p>
                        <p class="text-sm text-gray-600">
                            {{ $candidato->user->email }}
                        </p>
                        <p class="text-sm text-gray-500 font-bold mt-5">
                            Postulado {{ $candidato->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div>
                        <a href="{{ asset('storage/cv/' . $candidato->cv) }}" target="_blank" rel="noreferrer noopener" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-800 bg-white hover:bg-gray-50">Ver CV</a>
                    </div>
                </li>
            @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay candidatos aún</p>
            @endforelse
        </ul>
    </div>
@endsection

{{-- ========== --}}

@push('scripts')
    {{-- Insertar los scripts que corresponden a la página --}}
@endpush