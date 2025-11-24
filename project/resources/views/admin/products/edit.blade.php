@extends('layouts.admin')
@section('title', 'Editar Producto')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Editando el producto: {{ $product->name }}</h3>
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

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- ¡Importante para la actualización! --}}

            <div class="form-group">
                <label for="name">Nombre del Producto</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ old('price', $product->price) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" min="0" value="{{ old('stock', $product->stock) }}" required>
                    </div>
                </div>
            </div>

            {{-- BLOQUE PARA LAS CATEGORÍAS --}}
            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        {{-- Lógica para seleccionar la categoría actual del producto --}}
                        <option value="{{ $category->id }}"
                            @if(old('category_id', $product->category_id) == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- BLOQUE PARA LOS PROVEEDORES --}}
            <div class="form-group">
                <label for="provider_id">Proveedor</label>
                <select name="provider_id" id="provider_id" class="form-control" required>
                    <option value="">Seleccione un proveedor</option>
                    @foreach ($providers as $provider)
                        {{-- Lógica para seleccionar el proveedor actual del producto --}}
                        <option value="{{ $provider->id }}"
                            @if(old('provider_id', $product->provider_id) == $provider->id) selected @endif>
                            {{ $provider->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- BOTONES --}}
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
