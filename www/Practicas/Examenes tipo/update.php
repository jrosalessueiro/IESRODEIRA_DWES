<?php
// Incluye el archivo de conexión a la base de datos
require 'conexion.php';

// Verifica si el formulario ha sido enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Comprueba que todos los campos necesarios estén presentes en el formulario
    if (
        isset($_POST["nombre"]) && isset($_POST['nombreCorto']) && isset($_POST['precio']) && isset($_POST['familia'])
        && isset($_POST['descripcion'])
    ) {
        // Asignación de valores recibidos del formulario a variables locales
        $nombre = $_POST['nombre'];
        $nombreCorto = $_POST['nombreCorto'];
        $precio = $_POST['precio'];
        $familia = $_POST['familia'];
        $descripcion = $_POST['descripcion'];

        try {
            // Consulta SQL para actualizar los datos de un producto en la base de datos
            $sqlUpdate = "UPDATE productos 
            SET nombre = :nombre, nombre_corto = :nombreCorto, pvp = :precio, familia = :familia, descripcion = :descripcion
            WHERE id = :id";

            // Preparar la consulta SQL para evitar inyecciones de SQL
            $stmtUpdate = $pdo->prepare($sqlUpdate);

            // Vincula los parámetros con los valores de las variables
            $stmtUpdate->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':nombreCorto', $nombreCorto, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':familia', $familia, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmtUpdate->execute();

            echo "Producto modificado correctamente.";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    } else {
        echo 'Error: introduce los datos válidos. Por favor.';
    }
}

// Intenta obtener los datos del producto a modificar mediante una consulta SELECT
try {
    // Consulta SQL para obtener el producto por su ID
    $sqlSelect = "SELECT * FROM productos WHERE id = :id";
    $stmtSelect = $pdo->prepare($sqlSelect);

    // Vincula el ID del producto (pasado por URL) a la consulta
    $stmtSelect->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    // Ejecutamos la consulta
    $stmtSelect->execute();

    // Obtiene el resultado como un array asociativo
    $producto = $stmtSelect->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        // Si el producto existe, asigna los valores a las variables correspondientes
        $nombre = $producto['nombre'];
        $nombreCorto = $producto['nombre_corto'];
        $familia = $producto['familia'];
        $precio = $producto['pvp'];
        $descripcion = $producto['descripcion'];
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

// Intenta obtener todas las familias de productos para mostrarlas en un selector
try {
    // Consulta SQL para obtener todas las familias de productos de manera única
    $getFamiliasSql = "SELECT DISTINCT familia FROM productos";
    $getFamiliasStmt = $pdo->query($getFamiliasSql);
    $familias = $getFamiliasStmt->fetchAll(PDO::FETCH_ASSOC);

    // Extrae solo los valores de 'familia' y los guarda en un array
    $familias = array_column($familias, 'familia');
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-3 text-info-emphasis bg-info-subtle border border-primary-subtle rounded-3">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2>Modificar Producto</h2>
            </div>
        </div>
        <div class="row">

            <!-- Formulario para modificar el producto -->
            <form method="POST">
                <p>
                    <label for="nombre">Nombre:</label><br>
                    <input class="form-control" type="text" id='nombre' name="nombre" required value='<?= $nombre ?>'>
                </p>
                <div class="mb-3">
                    <label class="form-label" for="nombreCorto">Nombre corto:</label><br>
                    <input class="form-control" type="text" id='nombreCorto' name="nombreCorto" required value='<?= $nombreCorto ?>'><br>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="precio">Precio (€):</label><br>
                    <input class="form-control" type="number" id='precio' name="precio" step="0.01" required value='<?= $precio ?>'>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="familia">Familia:</label><br>
                    <select class="form-select" id="familia" name="familia" required value='<?= $familia ?>'>
                        <?php foreach ($familias as $fam) { ?>
                            <option value="<?= $fam ?>" <?= $fam === $familia ? 'selected' : '' ?>><?= $fam ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="descripcion">Descripción:</label><br>
                    <textarea class="form-control" name="descripcion" id="descripcion" required><?= $descripcion ?></textarea>
                </div>
                <input type="hidden" value="<?= $_GET['id'] ?>" name="id" />
                <button class="btn btn-primary btn-lg" type="submit">Aceptar</button>
                <button class="btn btn-success btn-lg" type="reset">Limpiar</button>
                <a class="btn btn-secondary btn-lg" href="listado.php">Volver</a>
            </form>
        </div>
    </div>
</body>

</html>