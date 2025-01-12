<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        createPlayer($_POST);
        $alert = ['type' => 'success', 'message' => 'Producto creado correctamente!'];
    } catch (Exception $e) {
        $alert = ['type' => 'danger', 'message' => 'Error al crear el producto: ' . $e->getMessage()];
    }
}

$familias = getFamilias();

$pageTitle = 'Crear producto';
?>

<?php require 'header.php'; ?>

<?php require 'alert.php'; ?>

<!-- Contenido de la pagina -->
<div class="row my-4">
    <form method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label><br>
            <input class="form-control" type="text" id='nombre' name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="nombreCorto" class="form-label">Nombre corto:</label><br>
            <input class="form-control" type="text" id='nombreCorto' name="nombreCorto" required><br>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio (€):</label><br>
            <input class="form-control" type="number" id='precio' name="precio" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="familia" class="form-label">Familia:</label><br>
            <select class="form-select" id="familia" name="familia" required>
                <?php foreach ($familias as $familia) { ?>
                    <option value="<?= $familia['cod'] ?>"><?= $familia['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label><br>
            <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
        </div>
        <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
        <button class="btn btn-success btn-lg" type="reset">Limpiar</button>
        <a class="btn btn-secondary btn-lg" href="listado.php">Volver</a>
    </form>
</div>

<?php require 'footer.php'; ?>
