@extends('layouts.admin')
@section('title', 'Editar Categoría')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editando la categoría: {{ $category->name }}</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- ¡Importante para la actualización! --}}

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
