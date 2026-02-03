<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Fibonacci 2.0</title>
</head>

<body>

    <form method="post">
        <label>
            Introduce un número:
            <input type="number" name="numero">
        </label>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];
        echo "El número que has puesto es, $numero<br>";
        if ($numero > 0) {
            if ($numero == 1) {
                echo "*";
            } elseif ($numero == 2) {
                echo "**<br>";
                echo "**<br>";
            } else {
                for ($i = 0; $i < $numero; $i++) {
                    echo "*";
                }
                echo "<br>";
                for ($j = 1; $j < $numero - 1; $j++) {
                    echo "*";
                    for ($k = 0; $k < $numero - 1; $k++) {
                        echo " ";
                    }
                    echo "*<br>";
                }
                for ($i = 0; $i < $numero; $i++) {
                    echo "*";
                }
            }
        }
    }

    ?>

</body>

</html>