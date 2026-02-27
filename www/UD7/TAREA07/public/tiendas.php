<?php
// 1. Errores visibles para depurar si algo falla
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Carga del motor BladeOne (Ruta manual)
require_once __DIR__ . '/../lib/BladeOne.php';

use eftec\bladeone\BladeOne;

// 3. Configuración de carpetas
$views = __DIR__ . '/../views';
$cache = __DIR__ . '/../cache';

try {
    // 4. Inicializar Blade
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

    // 5. Carga de las clases del Servicio SOAP (Asegúrate de que el nombre del archivo sea correcto)
    // Normalmente el WSDL genera un archivo con este nombre:
    require_once __DIR__ . '/../ClasesOperacionesTarea06Service.php';

    // Instanciar el servicio
    $service = new ClasesOperacionesTarea06Service();

    // 6. Recoger el ID del producto que viene de listado.php
    $idProducto = $_GET['id'] ?? null;

    if (!$idProducto) {
        die("Error: No se ha recibido el ID del producto. Vuelve al <a href='listado.php'>listado</a>.");
    }

    // 7. Llamar al método del servidor SOAP para obtener las tiendas y el stock
    // El método suele llamarse getTiendas o getStock (revisa tu WSDL)
    $tiendas = $service->getTiendas($idProducto);


    //echo "<pre>";
    //var_dump($tiendas);
    //echo "</pre>";
    // die();


    // 8. Renderizar la vista pasándole los datos
    // 'listadoTiendas' corresponde a 'views/listadoTiendas.blade.php'
    echo $blade->run("listadoTiendas", [
        "id" => $idProducto,
        "tiendas" => $tiendas
    ]);
} catch (Exception $e) {
    // Si algo falla, lo capturamos aquí
    echo "<h3>Error en el proceso:</h3>";
    echo "<p style='color:red'>" . $e->getMessage() . "</p>";
    echo "<a href='listado.php'>Volver al listado</a>";
}
