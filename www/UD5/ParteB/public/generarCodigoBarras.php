<?php

require __DIR__ . '/../src/utils.php';

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    generateCode($codigo);
} else {
    header('Content-Type: application/json');
    echo json_encode([
        "error" => "No se ha proporcionado ningún código.",
    ]);
}