@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Usuarios</h3>
        <div class="card-tools">
            {{-- En el futuro, aquí irá un botón para crear usuarios --}}
            {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Añadir Usuario</a> --}}
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th style="width: 150px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Usamos @forelse para manejar el caso en que no haya usuarios --}}
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{--
                                Esta es la forma segura de mostrar los roles.
                                pluck('name') crea una colección solo con los nombres de los roles.
                                implode(', ') une esos nombres en un string separado por comas.
                            --}}
                            @if($user->roles->isNotEmpty())
                                {{ $user->roles->pluck('name')->implode(', ') }}
                            @else
                                <span class="badge badge-secondary">Sin Rol</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar Roles</a>
                            {{-- En el futuro, aquí irá un botón para eliminar --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{-- Mostramos los links de paginación --}}
        {{ $users->links() }}
    </div>
</div>
@endsection
