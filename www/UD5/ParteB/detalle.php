<?php

require 'database.php';

$producto = getPlayer($_GET['id']);

$pageTitle = 'Detalle Producto';
?>

<?php require 'header.php'; ?>

<div class="row my-4">
    <table class="table">
        <tbody>
        <tr>
            <th colspan="2" class="text-center"><?= $producto['nombre'] ?></th>
        </tr>
        <tr>
            <td>Codigo:</td>
            <td><?= $producto['id'] ?></td>
        </tr>
        <tr>
            <td>Nombre:</td>
            <td><?= $producto['nombre'] ?></td>
        </tr>
        <tr>
            <td>Nombre corto:</td>
            <td><?= $producto['nombre_corto'] ?></td>
        </tr>
        <tr>
            <td>Código familia:</td>
            <td><?= $producto['familia'] ?></td>
        </tr>
        <tr>
            <td>Precio (€):</td>
            <td><?= $producto['pvp'] ?></td>
        </tr>
        <tr>
            <td>Descripción:</td>
            <td><?= $producto['descripcion'] ?></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="row my-4">
    <a class="btn btn-secondary btn-lg" href="listado.php">Volver</a>
</div>

<?php require 'footer.php'; ?>
