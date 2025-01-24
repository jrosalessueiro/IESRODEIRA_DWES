<?php 

require __DIR__ . '/../src/database.php';
$pageTitle = 'Listado Jugadores';

require __DIR__ . '/../src/header.php';
require __DIR__ . '/../src/alert.php';

$jugadores = getAllPlayers();

function printCode(string $code): string {
    $d = new \Milon\Barcode\DNS1D();
    $d->setStorPath(__DIR__.'/../cache/');

    return $d->getBarcodeHTML($code, 'EAN13');
}
?>

<!-- Contenido de la pagina -->
<div class="row my-4">
    <div class="col">
        <!-- Enlace para crear un nuevo producto -->
        <a class="btn btn-success btn-lg" href="fcrear.php">+Nuevo Jugador</a>
    </div>
</div>

<div class="row my-4 text-center">
    <table class="table">
        <thead>
        <tr class="table-primary">
            <th>Nombre Completo</th>
            <th>Posición</th>
            <th>Dorsal</th>
            <th>Código de Barras</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jugadores as $jugador) { ?>
            <tr>
                <!-- Enlace al detalle del producto, pasando su ID como parámetro -->
                <td><?= htmlspecialchars($jugador['apellidos'] . ', ' . $jugador['nombre']) ?></td>
                <td><?= htmlspecialchars(getPositionByCod($jugador['posicion'])['nombre']) ?></td>
                <td><?= $jugador['dorsal'] ? htmlspecialchars($jugador['dorsal']) : 'Sin Asignar' ?></td>
                <td><?= printCode($jugador['code']) ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php require __DIR__ . '/../src/footer.php';?>