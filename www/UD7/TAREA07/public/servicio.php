<?php
// TAREA6/public/servicio.php
require_once __DIR__ . '/../OperacionesTarea07.php';

// Como no existe WSDL todavía, usamos modo No-WSDL
// IMPORTANTE: La URI debe ser la carpeta donde estamos trabajando
$uri = "http://localhost/TAREA07/public";
$server = new SoapServer(null, ['uri' => $uri]);
$server->setClass('OperacionesTarea07');
$server->handle();
