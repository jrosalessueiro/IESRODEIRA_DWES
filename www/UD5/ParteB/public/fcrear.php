<?php

require __DIR__ . '/../src/database.php';

$posiciones = [
    ['cod' => '1', 'nombre' => 'Portero'],
    ['cod' => '2', 'nombre' => 'Lateral Derecho'],
    ['cod' => '3', 'nombre' => 'Lateral Izquierdo'],
    ['cod' => '4', 'nombre' => 'Central'],
    ['cod' => '5', 'nombre' => 'Extremo Derecho'],
    ['cod' => '6', 'nombre' => 'Extremo Izquierdo'],
    ['cod' => '7', 'nombre' => 'Medio Centro'],
    ['cod' => '8', 'nombre' => 'MediaPunta'],
    ['cod' => '9', 'nombre' => 'Delantero Centro'],
    ['cod' => '10', 'nombre' => 'Carrilero Derecha'],
    ['cod' => '11', 'nombre' => 'Carrilero Izquierda'],
    ['cod' => '12', 'nombre' => 'Interior Izquierda'],
    ['cod' => '13', 'nombre' => 'Interior Derecha']
];

$pageTitle = 'Crear Jugador';
?>

<?php require __DIR__ . '/../src/header.php'; ?>

<?php require __DIR__ . '/../src/alert.php'; ?>

<!-- Contenido de la pagina -->
<div class="row my-4">
    <form method="POST" action="crearJugador.php">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre:</label><br>
                <input class="form-control" type="text" id='nombre' name="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label><br>
                <input class="form-control" type="text" id='apellidos' name="apellidos" placeholder="Apellidos" required><br>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 mb-3">
                <label for="dorsal" class="form-label">Dorsal:</label><br>
                <select class="form-select" id="dorsal" name="dorsal" required>
                    <option value="" disabled selected>Dorsal</option>
                    <?php for ($i = 1; $i <= 99; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="posicion" class="form-label">Posición:</label><br>
                <select class="form-select" id="posicion" name="posicion" required>
                    <?php foreach ($posiciones as $posicion) { ?>
                        <option value="<?= $posicion['cod'] ?>"><?= $posicion['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="barcode" class="form-label">Código de Barras:</label><br>
                <input class="form-control" type="text" id="barcode" name="barcode" placeholder="Código de Barras" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <button class="btn btn-primary btn-md" type="submit">Crear</button>
                <button class="btn btn-success btn-md" type="reset">Limpiar</button>
                <a class="btn btn-secondary btn-md" href="index.php">Volver</a>
                <button type="button" class="btn btn-danger btn-md" onclick="generateCode()">Generar Barcode</button>
            </div>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../src/footer.php'; ?>