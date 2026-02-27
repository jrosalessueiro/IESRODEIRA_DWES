<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock por Tienda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Stock del Producto ID: {{ $id }}</h5>
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tienda</th>
                                    <th class="text-center">Unidades</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tiendas as $tienda)
                                    <tr>
                                        <td>
                                            <i class="fas fa-store-alt text-muted mr-2"></i>
                                            {{ $tienda[0] }}
                                        </td>
                                        <td class="text-center">
                                            @if ($tienda[2] > 0)
                                                <span class="badge badge-success px-3 py-2">{{ $tienda[2] }}</span>
                                            @else
                                                <span class="badge badge-danger px-3 py-2">Sin stock</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted">
                                            No se han encontrado datos de stock.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-white text-right">
                        <a href="listado.php" class="btn btn-outline-secondary">
                            <i class="fas fa-undo mr-1"></i> Volver al Listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
