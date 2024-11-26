<?php

require 'database.php';

$productos = getProductos();

$pageTitle = 'Gestión de Productos';
?>

<?php require 'header.php'; ?>

<!-- Contenido de la pagina -->
<div class="row my-4">
    <div class="col">
        <!-- Enlace para crear un nuevo producto -->
        <a class="btn btn-success btn-lg" href="crear.php">Crear</a>
    </div>
</div>

<div class="row my-4 text-center">
    <table class="table">
        <thead>
        <tr class="table-primary">
            <th>Detalle</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto) { ?>
            <tr>
                <!-- Enlace al detalle del producto, pasando su ID como parámetro -->
                <td><a class="btn btn-primary" href="detalle.php?id=<?= $producto['id'] ?>">Detalle</a></td>
                <td><?= $producto['id'] ?></td>
                <td><?= $producto['nombre'] ?></td>
                <td>
                    <!-- Enlaces para actualizar o borrar el producto -->
                    <a class="btn btn-warning" href="update.php?id=<?= $producto['id'] ?>">Actualizar</a>
                    <a class="btn btn-success" href="tiendas.php?id=<?= $producto['id'] ?>">Tiendas</a>
                    <a class="btn btn-danger" href="borrar.php?id=<?= $producto['id'] ?>">Borrar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php require 'footer.php'; ?>
