<?php
// Incluye el archivo de conexión a la base de datos
require 'conexion.php';

try {
    // Consulta SQL para seleccionar el ID y nombre de los productos
    $sql = "SELECT id, nombre FROM productos";
    // Ejecuta la consulta en la base de datos
    $stmt = $pdo->query($sql);
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
    <title>Listado Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-3 text-info-emphasis bg-info-subtle border border-primary-subtle rounded-3">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2>Gestión de Productos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Enlace para crear un nuevo producto -->
                <a class="btn btn-success btn-lg" href="crear.php">Crear</a>
            </div>
        </div>

        <div class="row text-center">
            <table class="table">
                <tr>
                    <th>Detalle</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <!-- Genera las filas de la tabla dinámicamente a partir de los resultados de la consulta -->
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <!-- Enlace al detalle del producto, pasando su ID como parámetro -->
                        <td><a class="btn btn-primary btn-lg" href="detalle.php?id=<?= $row['id'] ?>">Detalle</a></td>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <!-- Enlaces para actualizar o borrar el producto -->
                        <td><a class="btn btn-warning btn-lg" href="update.php?id=<?= $row['id'] ?>">Actualizar</a> <a class="btn btn-danger btn-lg" href="borrar.php?id=<?= $row['id'] ?>">Borrar</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>