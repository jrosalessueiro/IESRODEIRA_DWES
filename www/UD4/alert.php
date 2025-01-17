<!-- Muestra una alerta si la pagina define la variable $alert -->
<?php if (isset($alert)) { ?>
    <div class="alert alert-<?= $alert['type'] ?>" style="max-width: 400px;" role="alert">
        <?= $alert['message'] ?>
    </div>
<?php } ?>
