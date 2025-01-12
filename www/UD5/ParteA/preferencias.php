<?php
/*Parte A de la Tarea de la Unidad 5 DWES 2024-2025
Tienes que programar una aplicación web sencilla que permita gestionar una serie de preferencias del usuario.
La aplicación se dividirá en 2 páginas:
    *preferencias.php. Permitirá al usuario escoger sus preferencias y las almacenará en la sesión del usuario.
        Mostrará un cuadro desplegable por cada una de las preferencias. Estas serán:
            Idioma. El usuario podrá escoger un idioma entre "inglés" y "español" y otros.
            Perfil público. Sus posibles opciones será "sí" y "no".
            Zona horaria. Los valores en este caso estarán limitados a "GMT-2", "GMT-1", "GMT", "GMT+1" y "GMT+2".
        Además en la parte inferior tendrá un botón con el texto "Establecer preferencias" y un enlace que ponga 
        "Mostrar preferencias".
        El botón almacenará las preferencias en la sesión del usuario y volverá a cargar esta misma página, en la que se 
        mostrará el texto "Preferencia de usuario guardadas". Una vez establecidas esas preferencias, deben estar seleccionadas 
        como valores por defecto en los 3 cuadros desplegables.
        El botón "Establecer preferencias" llevará a la página "mostrar.php".

    *mostrar.php. Debe mostrar un texto con las preferencias que se encuentran almacenadas en la sesión del usuario. 
    Además, en la parte inferior tendrá un botón con el texto "Borrar" y un otro que ponga "Establecer".
    El botón borrará las preferencias de la sesión del usuario y volverá a cargar esta misma página, en la que se mostrará el 
    texto "Preferencias Borradas.". 
    Una vez borradas esas preferencias, se debe comprobar que sus valores no se muestran en el texto de la página.
    Si pulsamos el botón Borrar y no tenemos establecidas la preferencias se nos mostrará el mensaje "Debes fijar primero 
    las preferencias."
    El botón establecer llevará a la página "preferencias.php".
    Se valorará el uso de Bootstrap y Font Awesome para los estilos.
    */

// Inicia la sesión
session_start();

// Define los arrays originales de opciones
$idiomas = ['Español', 'Inglés', 'Gallego', 'Alemán', 'No Establecido'];
$perfiles = ['Público', 'Privado', 'No Establecido'];
$zonas = ['GMT-2', 'GMT-1', 'GMT', 'GMT+1', 'GMT+2', 'No Establecido'];

// Variable para el mensaje
$message = "";

// Procesa los datos del formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null; // Obtén la acción del botón enviado

    if ($action === 'save') {
        // Obtenemos los valores del formulario
        $idioma = $_POST['language'] ?? null;   //Equivalente a $idioma = isset($_POST['language']) ? $_POST['language'] : null;
        $perfil = $_POST['public'] ?? null;
        $zona = $_POST['zone'] ?? null;

        // Guarda los valores en la sesión
        $_SESSION['language'] = $idioma;
        $_SESSION['public'] = $perfil;
        $_SESSION['zone'] = $zona;

        // Establece el mensaje de confirmación
        $message = "Preferencias guardadas correctamente.";
    } elseif ($action === 'show') {
        // Redirige al archivo preferencias.php
        header('Location: mostrar.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte A UD5 DWES</title>
    <!--Bootstrap via CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
        rel="stylesheet">
    <!--Fontawesome via CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-XXXXX+y+XXXXX/XXXX=="
        crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-4">Preferencias Usuario</h3>
            <?php if (!empty($message)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="language" class="form-label">Idioma</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-globe"></i> <!-- Icono de Bootstrap Icons -->
                        </span>
                        <select class="form-select" id="language" name="language">
                            <?php foreach ($idiomas as $idioma): ?>
                                <option value="<?php echo strtolower($idioma); ?>"
                                    <?php echo isset($_SESSION['language']) && $_SESSION['language'] === strtolower($idioma) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($idioma); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="public" class="form-label">Perfil Público</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-people"></i> <!-- Icono de Bootstrap Icons -->
                        </span>
                        <select class="form-select" id="public" name="public">
                            <?php foreach ($perfiles as $perfil): ?>
                                <option value="<?php echo strtolower($perfil); ?>"
                                    <?php echo isset($_SESSION['public']) && $_SESSION['public'] === strtolower($perfil) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($perfil); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="zone" class="form-label">Zona Horaria</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-clock"></i> <!-- Icono de Bootstrap Icons -->
                        </span>
                        <select class="form-select" id="zone" name="zone">
                            <?php foreach ($zonas as $zona): ?>
                                <option value="<?php echo $zona; ?>"
                                    <?php echo isset($_SESSION['zone']) && $_SESSION['zone'] === $zona ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($zona); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" name="action" value="show" class="btn btn-primary">Mostrar Preferencias</button>
                    <button type="submit" name="action" value="save" class="btn btn-secondary">Establecer Preferencias</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>