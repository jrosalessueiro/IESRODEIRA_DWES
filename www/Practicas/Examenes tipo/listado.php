<?php
require 'conexion.php';

try {
    $sql = "SELECT id, nombre FROM productos";
    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>

<html>

<body>
    <h2>Gestión de Productos</h2>
    <a href="crear.php">Crear</a>

    <table border='1'>
        <tr>
            <th>Detalle</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><a href="detalle.php?id=<?= $row['id'] ?>">Detalle</a></td>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><a href="actualizar.php">Actualizar</a> <a href="borrar.php">Borrar</a></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>