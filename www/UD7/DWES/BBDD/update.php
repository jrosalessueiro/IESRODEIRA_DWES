<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        updateProducto($_POST['id'], $_POST);
        $alert = ['type' => 'success', 'message' => 'Producto actualizado correctamente!'];
    } catch (Exception $e) {
        $alert = ['type' => 'danger', 'message' => 'Error al actualizar el producto: ' . $e->getMessage()];
    }
}

$producto = getProducto($_GET['id']);

$familias = getFamilias();

$pageTitle = 'Modificar Producto';
?>

<?php require 'header.php'; ?>

<?php require 'alert.php'; ?>

<div class="row my-4">
    <form method="POST">
        <p>
            <label for="nombre">Nombre:</label><br>
            <input class="form-control" type="text" id='nombre' name="nombre" required value='<?= $producto['nombre'] ?>'>
        </p>
        <div class="mb-3">
            <label class="form-label" for="nombreCorto">Nombre corto:</label><br>
            <input class="form-control" type="text" id='nombreCorto' name="nombreCorto" required value='<?= $producto['nombre_corto'] ?>'><br>
        </div>
        <div class="mb-3">
            <label class="form-label" for="precio">Precio (€):</label><br>
            <input class="form-control" type="number" id='precio' name="precio" step="0.01" required value='<?= $producto['pvp'] ?>'>
        </div>
        <div class="mb-3">
            <label class="form-label" for="familia">Familia:</label><br>
            <select class="form-select" id="familia" name="familia" required>
                <?php foreach ($familias as $familia) { ?>
                    <option value="<?= $familia['cod'] ?>" <?= $familia['cod'] === $producto['familia'] ? 'selected' : '' ?>><?= $familia['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="descripcion">Descripción:</label><br>
            <textarea class="form-control" name="descripcion" id="descripcion" required><?= $producto['descripcion'] ?></textarea>
        </div>
        <input type="hidden" value="<?= $producto['id'] ?>" name="id"/>
        <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
        <button class="btn btn-success btn-lg" type="reset">Limpiar</button>
        <a class="btn btn-secondary btn-lg" href="listado.php">Volver</a>
    </form>
</div>

<?php require 'footer.php'; ?>
