<?php

require 'database.php';

$producto = getProducto($_GET['id']);
$tiendas = getTiendas($_GET['id']);

$pageTitle = 'Tiendas';
?>

<?php require 'header.php'; ?>
<div class="row my-4">
    <div class="col">
        <!-- Enlace para volver -->
        <a class="btn btn-secondary btn-lg" href="listado.php">Volver</a>
    </div>
</div>

<div class="row my-4 text-center">
    <table class="table">
        <thead>
        <tr class="table-primary">
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Unidades disponibles en tienda</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tiendas as $tienda) { ?>
            <tr>
                <!-- Enlace a las tiendas y las unidades de ese producto en cada tienda -->
                <td><?= $tienda['nombre'] ?></td>
                <td><?= $tienda['tlf'] ?></td>
                <td><?= $tienda['unidades'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php require 'footer.php'; ?>
