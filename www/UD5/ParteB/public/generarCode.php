<?php

use Milon\Barcode\DNS1D;

require __DIR__ . '/../vendor/autoload.php';
//require __DIR__ . '/../src/database.php';
//require __DIR__ . '/../src/header.php';
//require __DIR__ . '/../src/alert.php';

$codigoBarras = null;
$jugador = null;


function generateCode(): string {
    $d = new DNS1D();
    $d->setStorPath(__DIR__.'/../cache/');
    $codigoBarras = $d->getBarcodeHTML('9780691147727', 'EAN13');

    return $codigoBarras;
}

// Generar y verificar el código de barras
//while (!$jugador) {



    //$pdo = getConnection();
    //$stmt = $pdo->prepare('SELECT * FROM jugadores WHERE code = :code');
    //$stmt->bindParam(':code', $codigoBarras);
    //$stmt->execute();

    //$jugador = $stmt->fetch(); // Si no encuentra, $jugador será false
//}

//header('Location: fcrear.php');

// En este punto, $codigoBarras es único y válido
//require __DIR__ . '/../src/footer.php';