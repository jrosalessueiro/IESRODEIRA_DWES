<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ventas"]) && isset($_POST["mes"]) && is_numeric($_POST["ventas"]) && is_string($_POST["mes"])) {
        $ventas = $_POST["ventas"];
        $mes = $_POST["mes"];


        $impuestosAutonomicos = $ventas * 0.04;
        $impuestosEstatales = $ventas * 0.05;
        $impuestosTotales = $impuestosAutonomicos + $impuestosEstatales;

        echo '<h2>Según lo recaudado en el es de ' . $mes . ', tenemmos:</h2><br><br>';
        echo 'Total recaudado: ' . $ventas . '€<br>';
        echo 'Total líquido: ' . $ventas - $impuestosTotales . '€<br>';

        echo 'Impuestos Autonómicos: ' . $impuestosAutonomicos . '€<br>';
        echo 'Impuestos Estatales: ' . $impuestosEstatales . '€<br>';
        echo 'Impuestos Totales: ' . $impuestosTotales . '€<br>';
    } else {
        echo 'Error:introduzca datos válidos, por favor.';
    }
} else {
    echo 'Los datos no se han transmitido correctamente.';
}
