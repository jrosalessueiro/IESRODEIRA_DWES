
<?php 

require __DIR__ . '/../src/database.php';
require __DIR__ . '/../src/header.php';
require __DIR__ . '/../src/alert.php';

header('Location: ' . (getAllPlayers() != null ? 'jugadores.php' : 'instalacion.php'));
exit();

?>