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
</head>

<body>
    <h2>Detalle del Producto</h2>
    <p>Producto <?= $_GET['id'] ?></p>
    <table border="1">
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
    <a href="listado.php">Volver</a>
</body>

</html>