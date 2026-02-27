<?php
// TAREA6/ClasesOperacionesTarea07Service.php
class ClasesOperacionesTarea06Service
{
    private $cliente;

    public function __construct()
    {
        $url = "http://localhost/TAREA07/public/servicio.php";
        $this->cliente = new SoapClient(null, [
            'uri'      => "http://localhost/TAREA07",
            'location' => $url
        ]);
    }

    public function getTiendas($idProducto)
    {
        return $this->cliente->getTiendas($idProducto);
    }
}
