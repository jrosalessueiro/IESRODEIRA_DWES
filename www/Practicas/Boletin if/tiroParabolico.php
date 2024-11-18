<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$speed0 = floatval($_POST["speed0"]);
$aceleration = floatval($_POST["aceleration"]);
$time = floatval($_POST["time"]);

$speed = $speed0 + $aceleration * $time;
$space = $speed0 * $time + 1/2 * ($aceleration * ($time**2));


echo "<h2>La velocidad es : $speed m/s</h2>";
echo "<h2>El espacio recorrido es : $space metros</h2>";

} else {
    echo "<p>Error: No se enviaron datos correctamente.</p>";
}
