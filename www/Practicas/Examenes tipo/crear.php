<?php
// Incluye el archivo de conexión a la base de datos
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["nombre"]) && isset($_POST['nombreCorto']) && isset($_POST['precio']) && isset($_POST['familia'])
        && isset($_POST['descripcion'])
    ) {
        $nombre = $_POST['nombre'];
        $nombreCorto = $_POST['nombreCorto'];
        $precio = $_POST['precio'];
        $familia = $_POST['familia'];
        $descripcion = $_POST['descripcion'];

        try {
            $sql2 = "INSERT INTO productos (nombre, nombre_corto, pvp, familia, descripcion)
                    VALUES (:nombre, :nombreCorto, :precio, :familia, :descripcion)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindParam(':nombre', $nombre);
            $stmt2->bindParam(':nombreCorto', $nombreCorto);
            $stmt2->bindParam(':precio', $precio);
            $stmt2->bindParam(':familia', $familia);
            $stmt2->bindParam(':descripcion', $descripcion);

            $stmt2->execute();

            echo "Producto creado correctamente.";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }
    } else {
        echo 'Error: introduce los datos válidos. Por favor.';
    }
}

try {
    $sql1 = "SELECT DISTINCT familia FROM productos";
    $stmt1 = $pdo->query($sql1);
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
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="p-3 text-info-emphasis bg-info-subtle border border-primary-subtle rounded-3">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2>Crear Producto</h2>
            </div>
        </div>
        <div class="row">
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
                        <?php while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?= $row['familia'] ?>"><?= $row['familia'] ?></option>
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
    </div>
</body>

</html>