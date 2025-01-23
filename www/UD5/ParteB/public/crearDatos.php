<?php

require __DIR__ . '/../src/database.php';

createData();

header('Location: jugadores.php');
exit();
