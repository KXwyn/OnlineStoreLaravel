@extends('layouts.admin')
@section('title', 'Crear Nuevo Proveedor')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Formulario de Nuevo Proveedor</h3></div>
    <div class="card-body">
        <form action="{{ route('admin.providers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contact_person">Persona de Contacto</label>
                <input type="text" name="contact_person" id="contact_person" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.providers.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
