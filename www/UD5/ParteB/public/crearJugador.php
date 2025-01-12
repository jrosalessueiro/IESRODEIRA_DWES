<?php

require __DIR__ . '/../src/database.php';

$alert = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recoger los datos enviados desde el formulario
        $data = [
            'nombre' => trim($_POST['nombre'] ?? ''),
            'apellidos' => trim($_POST['apellidos'] ?? ''),
            'dorsal' => $_POST['dorsal'] ?? null,
            'posicion' => $_POST['posicion'] ?? null,
            'barcode' => $_POST['barcode'] ?? null
        ];

        // Crear el jugador en la base de datos
        createPlayer($data);

        // Si se crea correctamente, redirigir o mostrar un mensaje de éxito
        $alert = ['type' => 'success', 'message' => 'Jugador creado correctamente.'];
    } catch (Exception $e) {
        // Capturar errores y mostrar mensaje
        $alert = ['type' => 'danger', 'message' => $e->getMessage()];
    }
}

$pageTitle = 'Crear Jugador';
?>

<?php require __DIR__ . '/../src/header.php'; ?>

<!-- Mostrar alertas -->
<?php if ($alert): ?>
    <div class="alert alert-<?= $alert['type'] ?>" role="alert">
        <?= $alert['message'] ?>
    </div>
<?php endif; ?>

<!-- Botón para volver al formulario -->
<a href="fcrear.php" class="btn btn-secondary">Volver al formulario</a>

<?php require __DIR__ . '/../src/footer.php'; ?>