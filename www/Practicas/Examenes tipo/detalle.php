<?php
// Incluye el archivo de conexión a la base de datos
require 'conexion.php';

try {
    $sql = "SELECT * FROM productos WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Vinculamos el valor del parámetro :id
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    // Ejecutamos la consulta
    $stmt->execute();

    // Obtenemos el resultado
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        // Ahora $producto es un array asociativo con los datos
        $nombre = $producto['nombre'];
        $nombreCorto = $producto['nombre_corto'];
        $familia = $producto['familia'];
        $precio = $producto['pvp'];
        $descripcion = $producto['descripcion'];
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="p-3 text-info-emphasis bg-info-subtle border border-primary-subtle rounded-3">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2>Detalle del Producto</h2>
            </div>
        </div>
        <div class="row">

            <table>
                <tr>
                    <th><?= $nombre ?></th>
                </tr>
                <tr>
                    <th>Codigo: <?= $_GET['id'] ?></th>
                </tr>
                <tr>
                    <th>Nombre: <?= $nombre ?></th>
                </tr>
                <tr>
                    <th>Nombre corto: <?= $nombreCorto ?></th>
                </tr>
                <tr>
                    <th>Código familia: <?= $familia ?></th>
                </tr>
                <tr>
                    <th>Precio (€): <?= $precio ?></th>
                </tr>
                <tr>
                    <th>Descripción: <?= $descripcion ?></th>
                </tr>
            </table>
        </div>
        <a class="btn btn-secondary btn-lg" href="listado.php">Volver</a>
    </div>
</body>

</html>