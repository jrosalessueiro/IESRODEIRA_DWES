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
</head>

<body>
    <h2>Crear Producto</h2>
    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id='nombre' name="nombre" required>
        <label for="nombreCorto">Nombre corto:</label><br>
        <input type="text" id='nombreCorto' name="nombreCorto" required><br>
        <label for="precio">Precio (€):</label><br>
        <input type="number" id='precio' name="precio" step="0.01" required>
        <label for="familia">Familia:</label><br>
        <select id="familia" name="familia" required>
            <?php while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $row['familia'] ?>"><?= $row['familia'] ?></option>
            <?php } ?>
        </select>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" required></textarea>

        <button type="submit">Aceptar</button>
        <button type="reset">Limpiar</button>
        <a href="listado.php">Volver</a>
    </form>
</body>

</html>