@extends('layouts.admin')
@section('title', 'Gestión de Productos')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Productos</h3>
        <div class="card-tools">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Añadir Nuevo</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        {{-- Aquí usamos la magia de Eloquent para acceder a las relaciones --}}
                        <td>{{ $product->category->name ?? 'Sin Categoría' }}</td>
                        <td>{{ $product->provider->name ?? 'Sin Proveedor' }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }} --}}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }} --}}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $products->links() }}
    </div>
</div>
@endsection
