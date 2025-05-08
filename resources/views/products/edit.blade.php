<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Producto</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $product->nombre }}" required>
                @error('nombre')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" step="0.00000001" class="form-control" id="precio" name="precio" value="{{ $product->precio }}">
                @error('precio')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $product->descripcion }}</textarea>
                @error('descripcion')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                @if ($product->imagen)
                    <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" width="100" class="mt-2">
                @endif
                @error('imagen')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">cantidad:</label>
                <input type="number" step="0.00000001" class="form-control" id="cantidad" name="cantidad" value="{{ $product->cantidad }}">
                @error('cantidad')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
