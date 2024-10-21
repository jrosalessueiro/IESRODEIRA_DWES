<?php
// Inicializar variable agenda como un array vacío
$agenda = [];

// Recuperar los contactos de los campos hidden si existen
if (isset($_POST['hidden_agenda']) && !empty($_POST['hidden_agenda'])) {
    // Descomprimir el string de la agenda en un array
    $agenda = unserialize(base64_decode($_POST['hidden_agenda']));
}

// Función para agregar un contacto
function agregarContacto(&$agenda, $nombre, $telefono)
{
    // Comprobar si el nombre ya existe en la agenda
    if (!array_key_exists($nombre, $agenda) && !empty($telefono)) {
        $agenda[$nombre] = $telefono;
        echo "<p>Se ha introducido el contacto " . $nombre . ", " . $telefono . "</p>";
    } else if (array_key_exists($nombre, $agenda) && !empty($telefono)) {
        $agenda[$nombre] = $telefono;
        echo "<p>Se ha modificado el contacto " . $nombre . ", con el nuevo teléfono: " . $telefono . "</p>";
    } else if (array_key_exists($nombre, $agenda) && empty($telefono)) {
        unset($agenda[$nombre]);
        echo "<p>Se ha borrado el elemento " . $nombre . "</p>";
    }
}

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre']) && isset($_POST['telefono'])) {
    $nombre = trim($_POST['nombre']);
    $telefono = trim($_POST['telefono']);

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($telefono)) {
        agregarContacto($agenda, $nombre, $telefono);
    } else {
        echo "<p>Por favor, completa ambos campos.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AGENDA - DWES</title>
    <link rel="stylesheet" href="styles2.css">
</head>

<body>
    <header>
        <h1>Agenda</h1>

    </header>

    <main>
        <form action="#" method="post">
            <fieldset>
                <legend>Datos Agenda</legend>
                <?php
                function imprimirContactos($agenda)
                {
                    if (!empty($agenda)) {
                        foreach ($agenda as $nombre => $telefono) {
                            echo "<p>" . $nombre . "      " . $telefono . "</p>";
                        }
                    }
                }
                ?>
            </fieldset>

            <fieldset>
                <legend>Nuevo Contacto</legend>
                <label for="name">Nombre:</label>
                <input type="name" id="name" name="name" required><br>
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono"><br>

                <button type="submit">Añadir Contacto</button>
                <button type="submit">Limpiar Campos</button>
            </fieldset>

            <fieldset>
                <legend>Vaciar Agenda</legend>
                <button type="submit">Vaciar</button>
            </fieldset>

        </form>
    </main>

    <footer>
        <p>© 2024 Ciclo de DAW. Todos los derechos reservados.</p>
    </footer>
</body>

</html>