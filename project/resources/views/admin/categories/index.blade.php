@extends('layouts.admin')

@section('title', 'Gestión de Categorías')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Categorías</h3>
            <div class="card-tools">
                {{-- Botón para ir al formulario de creación --}}
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Añadir Nueva</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                {{-- Aquí irán los botones de Editar y Eliminar --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay categorías registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
