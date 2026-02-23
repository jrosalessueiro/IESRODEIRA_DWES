<?php
// TAREA6/public/servicio.php
require_once __DIR__ . '/../OperacionesTarea06.php';

// Como no existe WSDL todavía, usamos modo No-WSDL
// IMPORTANTE: La URI debe ser la carpeta donde estás trabajando
$uri = "http://localhost/TAREA6/public";
$server = new SoapServer(null, ['uri' => $uri]);
$server->setClass('OperacionesTarea06');
$server->handle();
