<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Stock del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary text-white">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Unidades del Producto: {{ $idProducto }}</h2>
        
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Tienda</th>
                    <th>Teléfono</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tiendas as $tienda)
                <tr>
                    <td>{{ $tienda[0] }}</td> <td>{{ $tienda[1] }}</td> <td class="text-center">{{ $tienda[2] }}</td> </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="text-center">
            <a href="listado.php" class="btn btn-primary">Volver al Listado</a>
        </div>
    </div>
</body>
</html>