<!--Se piede desarrollar un sencillo juego "online" que:
• solicita al usuario el número de filas y columnas de un tablero (cada uno un número impar de entre 5 y 30 unidades) y una 
    palabra de 5 letras como mínimo.
◦ se deben validar todas las entradas, sacando un mensaje de error informativo de cúal es el error en caso de que haya error.
• cuando el usuario hace clic en "Enviar", aparece un tablero como el que aparece en la imagen posterior:
◦ consiste en un borde con la letra "o", sobre el que se dibuja un rombo de asteríscos "*".
◦ cada elemento del tablero que es un asterísco, que es un botón que, al hacer clic sobre él:
    ▪ puede "tener escondida" debajo una de las letras de la palabra; en este caso:
        • el jugador suma 5 puntos al "marcador" (que aparecerá tan pronto se haga clic por primera vez en un asterísco)
        • la letra acertada desaparecerá de la caja de texto correspondiente a la etiqueta "Introduzca una palabra:"
        • el asterísco se cambia por la letra acertada
    ▪ puede no tener escondido nada: en este caso el jugador resta 2 puntos al marcador (que aparecerá tan pronto se haga 
        clic por primera vez en un asterísco).
◦ las letras se distribuyen al azar por debajo de los asteriscos.
• el juego termina cuando el jugador acierta todas las letras o cuando el jugador tiene más de 3 fallos <seguidos class="

-->

<?php 

// Inicia la sesión
session_start();

require __DIR__ . '/header.php';

$pageTitle = 'Juego Online';

if (isset($_SESSION['alert'])) {
    require __DIR__ . '/alert.php';  // Esto mostrará la alerta si está presente
    unset($_SESSION['alert']);  // Limpiar la alerta después de mostrarla
}

?>

<div class="row my-4">
    <form method="POST" action="validar.php">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="filas" class="form-label">Introduzca el número de filas y columnas del tablero:</label><br>
                <input class="form-control" type="int" id='filas' name="filas" placeholder="impar min:5 - max:30" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="palabra" class="form-label">Introduzca una palabra:</label><br>
                <input class="form-control" type="text" id='palabra' name="palabra" placeholder="min 5 letras" required><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <button class="btn btn-primary btn-md" type="submit">Enviar</button>
                <button class="btn btn-success btn-md" type="reset">Borrar</button>
        
            </div>
        </div>
    </form>


    <?php require __DIR__ . '/footer.php';
