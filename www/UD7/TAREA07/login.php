<?php
session_start();
require_once 'conexion.php';
require_once __DIR__ . '/vendor/autoload.php'; // incluye Composer

use Ajax\php\ubiquity\JsUtils; // parte de JQuery4PHP
$js = new JsUtils();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php echo $js->run(); ?> <!-- esto genera las librerías necesarias -->
</head>

<body>
    <div class="container mt-5">
        <div class="card" id="loginCard">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form id="loginForm" method="POST" action="">
                    <input type="text" name="usuario" placeholder="Usuario" required><br>
                    <input type="password" name="pass" placeholder="Contraseña" required><br>
                    <button type="submit" id="btnLogin" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    // Usando JQuery4PHP para generar el efecto
    $js->click('#btnLogin', 'event.preventDefault();
$("#loginCard").fadeOut(1000).fadeIn(1000).fadeOut(500).fadeIn(500, function(){
    $("#loginForm").submit();
});');
    echo $js->compile();
    ?>
</body>

</html>