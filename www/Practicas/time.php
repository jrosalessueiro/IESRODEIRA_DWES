<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["time"])) {

        $timeSeconds = floatval($_POST["time"]);

        $hours = floor($timeSeconds / 3600);
        $secondsRemaining = round($timeSeconds - $hours * 3600, 0);
        $minutes = floor($secondsRemaining / 60);
        $seconds = round($secondsRemaining - $minutes * 60, 0);

        echo '<h2>El tiempo introducido equivale a: ' . $hours . ' horas, ' . $minutes . ' minutos y ' . $seconds . ' segundos.</h2>';
    } else {
        echo '<p>Error: No se enviaron datos correctamente. Por favor, introduzca un valor en segundos válido.</p>';
    }
} else {
    echo '<p>Error: No se enviaron datos correctamente. Por favor, introduzca un valor en segundos válido.</p>';
}
