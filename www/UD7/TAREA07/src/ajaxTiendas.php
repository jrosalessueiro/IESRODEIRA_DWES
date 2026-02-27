<?php

// Importamos la clase de respuesta de Jaxon
use Jaxon\Response\Response;

// Importamos el cliente SOAP
require_once __DIR__ . '/../env/ClasesOperacionesTarea07Service.php';

class AjaxTiendas
{
    /**
     * Este método será llamado vía AJAX
     * Recibe el ID del producto
     */
    public function listarTiendas($idProducto)
    {
        // Creamos objeto respuesta Jaxon
        $response = new Response();

        // Creamos cliente SOAP
        $servicio = new ClasesOperacionesTarea07Service();

        // Llamamos al servicio SOAP
        $tiendas = $servicio->getTiendas($idProducto);

        // Construimos el HTML dinámicamente
        $html = "<h3>Tiendas disponibles</h3>";
        $html .= "<table border='1'>";
        $html .= "<tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Unidades</th>
                  </tr>";

        foreach ($tiendas as $tienda) {
            $html .= "<tr>";
            $html .= "<td>{$tienda['nombre']}</td>";
            $html .= "<td>{$tienda['telefono']}</td>";
            $html .= "<td>{$tienda['unidades']}</td>";
            $html .= "</tr>";
        }

        $html .= "</table>";

        // Insertamos el HTML dentro de un div popup
        $response->assign("popupContenido", "innerHTML", $html);

        // Mostramos el popup
        $response->script("document.getElementById('popup').style.display='block';");

        return $response;
    }
}
