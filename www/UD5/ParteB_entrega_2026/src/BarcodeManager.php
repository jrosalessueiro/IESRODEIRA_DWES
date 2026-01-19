<?php

namespace Dwes5B;

// Clase BarcodeManager para gestionar la generación de códigos de barras
class BarcodeManager 
{
    /**
     * Genera el código HTML de un código de barras a partir de un string.
     * 
     * @param string $code El código que se convertirá en código de barras.
     * @return string El HTML del código de barras generado.
     */
    public function printCode(string $code): string
    {
        // Crea una instancia de la clase DNS1D para trabajar con códigos de barras de tipo 1D
        $d = new \Milon\Barcode\DNS1D();
        
        // Establece la ruta de almacenamiento de caché para los códigos de barras
        $d->setStorPath(__DIR__ . '/../cache/');
    
        // Genera el código de barras en formato HTML, especificando el formato EAN13
        return $d->getBarcodeHTML($code, 'EAN13');
    }
}