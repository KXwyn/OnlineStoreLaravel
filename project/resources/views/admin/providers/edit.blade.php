@extends('layouts.admin')

@section('title', 'Editar Proveedor')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editando al proveedor: {{ $provider->name }}</h3>
    </div>
    <div class="card-body">
        {{-- Muestra errores de validación si los hay --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- La acción del formulario apunta a la ruta de 'update' --}}
        <form action="{{ route('admin.providers.update', $provider->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- ¡Importante para la actualización! --}}

            {{-- Campo Nombre --}}
            <div class="form-group">
                <label for="name">Nombre</label>
                {{-- Rellenamos el valor con el dato actual del proveedor --}}
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $provider->name) }}" required>
            </div>

            {{-- Campo Persona de Contacto --}}
            <div class="form-group">
                <label for="contact_person">Persona de Contacto</label>
                {{-- Rellenamos el valor con el dato actual del proveedor --}}
                <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ old('contact_person', $provider->contact_person) }}">
            </div>

            {{-- Campo Teléfono --}}
            <div class="form-group">
                <label for="phone">Teléfono</label>
                {{-- Rellenamos el valor con el dato actual del proveedor --}}
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $provider->phone) }}">
            </div>

            {{-- Campo Email --}}
            <div class="form-group">
                <label for="email">Email</label>
                {{-- Rellenamos el valor con el dato actual del proveedor --}}
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $provider->email) }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.providers.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
