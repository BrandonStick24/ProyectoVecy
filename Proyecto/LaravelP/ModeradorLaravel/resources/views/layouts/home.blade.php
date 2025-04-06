@extends('layouts.app')

@section('content')
    {{-- Categorías --}}
    <div class="contenedorca swiper"> 
        {{-- Aquí podrías convertirlo también en <x-categorias /> si quieres --}}
        {{-- contenido de categorías --}}
    </div>

    {{-- Tiendas disponibles --}}
    <main class="main">
        <div class="contenedor swiper"> 
            <p style="color: white;">Tiendas Disponibles</p>
            @include('components.tiendas-disponibles')
        </div>

        <div class="contenedor swiper"> 
            <p style="color: white;">Tiendas NO Disponibles</p>
            @include('components.tiendas-no-disponibles')
        </div>
    </main>
@endsection
