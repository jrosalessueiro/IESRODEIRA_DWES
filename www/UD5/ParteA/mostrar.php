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

// Verifica si las variables de sesión necesarias están definidas
$idioma = $_SESSION['language'] ?? 'No establecido';
$perfil = $_SESSION['public'] ?? 'No establecido';
$zona = $_SESSION['zone'] ?? 'No establecido';

// Variable para el mensaje
$message = "";

// Procesa los datos del formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null; // Obtenemos la acción del botón enviado

    if ($action === 'delete') {
        if ($idioma === 'No establecido' || $perfil === 'No establecido' || $zona === 'No establecido') {
            $alert = [
                'type' => 'danger', 
                'message' => 'Debes fijar primero las preferencias.',
            ];
        } else {
            // Borra las preferencias (estableciéndolas como "No establecido")
            $_SESSION['language'] = 'No establecido';
            $_SESSION['public'] = 'No establecido';
            $_SESSION['zone'] = 'No establecido';

            // Actualiza las variables locales
            $idioma = $_SESSION['language'];
            $perfil = $_SESSION['public'];
            $zona = $_SESSION['zone'];

            // Establece el mensaje de confirmación
            $alert = [
                'type' => 'success', 
                'message' => 'Preferencias borradas.',
            ];
        }
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
</head>

<body>
    <div class="container mt-3">
        <h1>Preferencias</h1>
        <!-- Mensaje de confirmación -->
         
        <?php include 'alert.php'; ?>


        <!-- Muestra las preferencias -->
        <div class="card shadow mb-3" style="max-width: 400px;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Idioma:</strong> <?php echo htmlspecialchars($idioma); ?></li>
                <li class="list-group-item"><strong>Perfil Público:</strong> <?php echo htmlspecialchars($perfil); ?></li>
                <li class="list-group-item"><strong>Zona Horaria:</strong> <?php echo htmlspecialchars($zona); ?></li>
            </ul>
        </div>

        <!-- Botones para establecer o borrar preferencias -->
        <form method="POST">
            <a href="preferencias.php" class="btn btn-secondary">Establecer</a>
            <button type="submit" name="action" value="delete" class="btn btn-danger">Borrar</button>
        </form>
    </div>
</body>

</html>