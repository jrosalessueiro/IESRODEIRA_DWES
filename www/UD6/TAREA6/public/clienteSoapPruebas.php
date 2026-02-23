<?php
// TAREA6/public/clienteSoapPruebas.php
require_once __DIR__ . '/../ClasesOperacionesTarea06Service.php';

$idProducto = 1; // ID para probar
$service = new ClasesOperacionesTarea06Service();
$resultado = $service->getTiendas($idProducto);

echo "<h2>Listado de Tiendas para el Producto ID: $idProducto</h2>";
echo "<pre>";
if (count($resultado) > 0) {
    foreach ($resultado as $tienda) {
        echo "Tienda: " . $tienda[0] . " | Tel: " . ($tienda[1] ?? 'N/A') . " | Unidades: " . $tienda[2] . "\n";
    }
} else {
    echo "No hay stock para este producto.";
}
echo "</pre>";
