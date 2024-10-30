<?php
// Inicializar variable agenda como un array vacío
$agenda = [];

// Recuperar los contactos de los campos hidden si existen
if (isset($_POST['hidden_agenda']) && !empty($_POST['hidden_agenda'])) {
    // Descomprimir el string de la agenda en un array
    $agenda = unserialize(base64_decode($_POST['hidden_agenda']));
}

// Verificar si se ha solicitado vaciar la agenda
if (isset($_GET['vaciar']) && $_GET['vaciar'] === 'true') {
    $agenda = [];
}

// Función para agregar, modificar o eliminar un contacto
function gestionarContacto(&$agenda, $nombre, $telefono) {
    if (!array_key_exists($nombre, $agenda) && !empty($telefono)) {
        // R1: Agregar contacto nuevo
        $agenda[$nombre] = $telefono;
        echo "<p>Contacto agregado: $nombre, $telefono</p>";
    } elseif (array_key_exists($nombre, $agenda) && !empty($telefono)) {
        // R2: Modificar contacto existente
        $agenda[$nombre] = $telefono;
        echo "<p>Contacto modificado: $nombre, nuevo teléfono: $telefono</p>";
    } elseif (array_key_exists($nombre, $agenda) && empty($telefono)) {
        // R3: Eliminar contacto si el teléfono está vacío
        unset($agenda[$nombre]);
        echo "<p>Contacto eliminado: $nombre</p>";
    }
}

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
    $nombre = trim($_POST['nombre']);
    $telefono = trim($_POST['telefono']);

    if (!empty($nombre)) {
        // Llamar a la función para gestionar el contacto
        gestionarContacto($agenda, $nombre, $telefono);
    } else {
        echo "<p>Por favor, introduce un nombre válido.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDA - DWES</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <header>
        <h1>Agenda DWES 2024-2025</h1>
    </header>

    <main>
        <!-- Mostrar contenido de la agenda -->
        <fieldset>
            <legend>Contactos en la Agenda</legend>
            <?php
            if (!empty($agenda)) {
                foreach ($agenda as $nombre => $telefono) {
                    echo "<p>$nombre: $telefono</p>";
                }
            } else {
                echo "<p>No hay contactos en la agenda.</p>";
            }
            ?>
        </fieldset>

        <!-- Formulario para añadir o modificar contactos -->
        <form action="#" method="post">
            <fieldset>
                <legend>Nuevo Contacto</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required><br>
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono"><br>

                <button type="submit">Añadir/Modificar Contacto</button>
            </fieldset>

            <!-- Campo hidden para almacenar el estado de la agenda -->
            <input type="hidden" name="hidden_agenda" value="<?php echo base64_encode(serialize($agenda)); ?>">
        </form>

        <!-- Botón para vaciar la agenda si contiene al menos un contacto -->
        <?php if (!empty($agenda)): ?>
            <form action="#" method="get">
                <button type="submit" name="vaciar" value="true">Vaciar Agenda</button>
            </form>
        <?php endif; ?>
    </main>

    <footer>
        <p>© 2024 Ciclo de DAW. Todos los derechos reservados.</p>
    </footer>
</body>
</html>