<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Listado de Productos</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Crear Nuevo Producto</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->nombre }}</td>
                        <td>{{ $product->precio }}</td>
                        <td>{{ $product->descripcion }}</td>
                        <td>
                            @if ($product->imagen)
                                <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" width="50">
                            @else
                                Sin imagen
                            @endif
                        </td>
                        <td>
                            {{-- <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Ver</a> --}}
                              <a href="{{ route('welcome') }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No hay productos registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
