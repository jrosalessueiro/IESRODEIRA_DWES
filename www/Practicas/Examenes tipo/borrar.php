<?php
/* Tarea 04 DWES curso 2024/2025 IES RODEIRA
    Autor: José Rosales Sueiro
    Proyecto para acceso a una base de datos con PDO
*/

// Incluye el archivo de conexión a la base de datos
require 'conexion.php';

// Verifica si el formulario ha sido enviado con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si el ID del producto ha sido enviado
    if (isset($_POST["id"])) {
        try {
            // Prepara la consulta SQL para eliminar el producto basado en el ID
            $sql = "DELETE FROM productos WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Vincula el parámetro :id con el valor del ID recibido del formulario
            $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

            // Ejecutamos la consulta
            $stmt->execute();

            echo 'Registo con código: ' . $_GET['id'] . ' ha sido borrado correctamente. <br>';
            echo '<a href="listado.php">Volver</a>';
            exit();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-3 text-info-emphasis bg-info-subtle border border-primary-subtle rounded-3">
    <!-- Formulario de confirmación de eliminación -->
    <form method="POST">
        <!-- Mensaje de confirmación mostrando el ID del producto a eliminar -->
        <p id="confirmar">Está seguro de borrar el artículo con código: <?= $_GET['id'] ?></p>
        <!-- Campo oculto que envía el ID del producto al servidor cuando se envíe el formulario -->
        <input type="hidden" value="<?= $_GET['id'] ?>" name="id" />
        <div class="btn-group">
            <button class="btn btn-primary" type="submit" value="SI">Sí</button>
            <!-- Enlace para cancelar la acción y volver a la lista de productos -->
            <a class="btn btn-primary active btn-lg" aria-current="page" href="listado.php">NO</a>
        </div>
    </form>
    <div>
        <a class="btn btn-secondary btn-lg" href="listado.php">Volver</a>
    </div>
</body>

</html>