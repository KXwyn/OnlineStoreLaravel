@extends('layouts.admin')
@section('title', 'Gestión de Proveedores')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Proveedores</h3>
        <div class="card-tools">
            <a href="{{ route('admin.providers.create') }}" class="btn btn-primary">Añadir Nuevo</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Persona de Contacto</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($providers as $provider)
                    <tr>
                        <td>{{ $provider->id }}</td>
                        <td>{{ $provider->name }}</td>
                        <td>{{ $provider->contact_person }}</td>
                        <td>{{ $provider->phone }}</td>
                        <td>{{ $provider->email }}</td>
                        <td>
                            <a href="{{ route('admin.providers.edit', $provider->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.providers.destroy', $provider->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar a este proveedor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No hay proveedores registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $providers->links() }}
    </div>
</div>
@endsection
