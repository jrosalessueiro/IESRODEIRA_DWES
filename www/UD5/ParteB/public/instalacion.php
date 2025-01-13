<?php

require __DIR__ . '/../src/database.php';

$pageTitle = 'Instalación';
require __DIR__ . '/../src/header.php';

?>
    <div class="d-flex justify-content-center align-items-center custom-box">
    <div class="bg-success text-white p-5 rounded text-center shadow w-45">
        <div class="col-md-12">
            <a class="btn btn-primary btn-md p-3" href="crearDatos.php"><i class="bi bi-database"></i> Instalar Datos de Ejemplo</a>
        </div>
    </div>
</div>
<?php

require __DIR__ . '/../src/alert.php';
require __DIR__ . '/../src/footer.php';

?>