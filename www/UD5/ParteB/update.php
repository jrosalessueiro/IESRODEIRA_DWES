<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        updatePlayer($_POST['id'], $_POST);
        $alert = ['type' => 'success', 'message' => 'Producto actualizado correctamente!'];
    } catch (Exception $e) {
        $alert = ['type' => 'danger', 'message' => 'Error al actualizar el producto: ' . $e->getMessage()];
    }
}

$jugador = getPlayer($_GET['id']);

$pageTitle = 'Modificar Jugador';
?>

<?php require 'header.php'; ?>

<?php require 'alert.php'; ?>

<div class="row my-4">
    <form method="POST">
        <p>
            <label for="nombre">Nombre:</label><br>
            <input class="form-control" type="text" id='nombre' name="nombre" required value='<?= $jugador['nombre'] ?>'>
        </p>
        <div class="mb-3">
            <label class="form-label" for="apellidos">Apellidos:</label><br>
            <input class="form-control" type="text" id='apellidos' name="apellidos" required value='<?= $jugador['apellidos'] ?>'><br>
        </div>
        <div class="mb-3">
            <label class="form-label" for="dorsal">Dorsal:</label><br>
            <input class="form-control" type="dorsal" id='dorsal' name="dorsal" required value='<?= $jugador['dorsal'] ?>'>
        </div>
        <div class="mb-3">
            <label class="form-label" for="posicion">Posición:</label><br>
            <select class="form-select" id="posicion" name="posicion" required>
                <?php foreach ($posiciones as $posicion) { ?>
                    <option value="<?= $posicion['cod'] ?>" <?= $posicion['cod'] === $jugador['posicion'] ? 'selected' : '' ?>><?= $posicion['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
        <label for="codigoBarras" class="form-label">Código de Barras:</label><br>
                <input class="form-control" type="text" id='codigoBarras' name="codigoBarras" placeholder="Código de Barras" readonly>
            </div>
        <input type="hidden" value="<?= $jugador['id'] ?>" name="id"/>
        <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
        <button class="btn btn-success btn-lg" type="reset">Limpiar</button>
        <a class="btn btn-secondary btn-lg" href="listado.php">Volver</a>
    </form>
</div>

<?php require 'footer.php'; ?>
