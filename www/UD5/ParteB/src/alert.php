<!-- Muestra una alerta si la pagina define la variable $alert -->
<?php
if (isset($_SESSION['alert'])) { ?>
    <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
        <?= $_SESSION['alert']['message'] ?>
    </div>
<?php 
} 
unset($_SESSION['alert']);
?>
