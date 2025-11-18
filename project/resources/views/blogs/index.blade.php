@extends('layouts.admin')

{{-- Título de la página que se mostrará en la pestaña del navegador y en el encabezado --}}
@section('title', 'Gestión de Blogs')

@section('content')
    {{-- Aquí empieza el contenido específico de tu página --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Blogs</h3>
        </div>
        <div class="card-body">
            <p>¡Aquí se mostrará la tabla de blogs!</p>
            <p>Esta página está protegida y solo tú puedes verla.</p>
            <p>Has implementado con éxito todo el sistema de roles y permisos.</p>
        </div>
    </div>
@endsection
