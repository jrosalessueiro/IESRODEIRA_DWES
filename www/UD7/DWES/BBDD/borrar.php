<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        deleteProducto($_POST['id']);
        $alert = ['type' => 'success', 'message' => 'Producto eliminado correctamente!'];
        // Redirigir a la lista de productos después de borrar uno.
        header('Location: listado.php');
    } catch (Exception $e) {
        $alert = ['type' => 'danger', 'message' => 'Error al eliminar el producto: ' . $e->getMessage()];
    }
}

$producto = getProducto($_GET['id']);

$pageTitle = 'Borrar Producto';
?>

<?php require 'header.php'; ?>

<?php require 'alert.php'; ?>

<div class="row my-4">
    <div class="card shadow-sm p-4" style="max-width: 400px;">
        <h5 class="card-title">Está seguro de borrar el artículo con código: <?= $producto['id'] ?></h5>
        <form method="POST">
            <!-- Campo oculto que envía el ID del producto al servidor cuando se envíe el formulario -->
            <input type="hidden" value="<?= $producto['id'] ?>" name="id" />
            <button class="btn btn-danger btn-lg" type="submit">Borrar</button>
            <!-- Enlace para cancelar la acción y volver a la lista de productos -->
            <a class="btn active btn-lg" aria-current="page" href="listado.php">Cancelar</a>
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>
