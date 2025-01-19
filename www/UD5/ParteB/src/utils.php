<?php

use Picqer\Barcode\BarcodeGeneratorPNG;

function generateCode(string $codigo)
{
    // Crear un generador de código de barras
    $generator = new BarcodeGeneratorPNG();

    // Generar y devolver el código de barras como imagen PNG
    header('Content-Type: image/png');
    echo $generator->getBarcode($codigo, $generator::TYPE_CODE_128);
}