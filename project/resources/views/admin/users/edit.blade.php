@extends('layouts.admin')
@section('title', 'Editar Usuario')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulario de Edición de Usuario</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT') {{-- Importante para que la ruta de resource sepa que es una actualización --}}

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <hr>
            <h5>Asignar Roles</h5>
            <div class="form-group">
                @foreach ($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" id="role_{{ $role->id }}"
                            {{-- Marcamos el checkbox si el usuario ya tiene ese rol --}}
                            @if($user->roles->contains($role)) checked @endif
                        >
                        <label class="form-check-label" for="role_{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
