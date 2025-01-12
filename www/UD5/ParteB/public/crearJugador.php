<?php

require __DIR__ . '/../src/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        createPlayer($_POST);
        $alert = ['type' => 'success', 'message' => 'Jugador creado correctamente!'];
    } catch (Exception $e) {
        $alert = ['type' => 'danger', 'message' => 'Error al crear el jugador: ' . $e->getMessage()];
    }
}

$pageTitle = 'Crear Jugador';
?>

<?php require __DIR__ . '/../src/header.php'; ?>
<?php require __DIR__ . '/../src/alert.php'; ?>

<?php require 'footer.php'; ?>
