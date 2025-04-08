@extends('layouts.app')

@section('title', 'Página Principal')

@section('content')
    <!-- Aquí va el contenido desde el <main> -->
    @include('components.categorias')
    @include('components.tiendas_disponibles')
    @include('components.tiendas_no_disponibles')
    @include('components.login-form')
    @include('components.registro-form')
@endsection