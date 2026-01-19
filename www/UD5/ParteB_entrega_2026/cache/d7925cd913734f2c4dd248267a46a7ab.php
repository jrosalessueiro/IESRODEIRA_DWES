<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('pageTitle', 'Juego Online'); ?></title>
    <!-- Importamos Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<!-- Creamos el layout general para que en cada pagina solo haya que definir el contenido -->

<body class="p-3 text-info-emphasis bg-light border border-primary-subtle rounded-3">
    <div class="container">
        <div class="row my-4 text-center">
            <div class="col">
                <h2><?php echo $__env->yieldContent('titulo', 'Título por Defecto'); ?></h2>
            </div>
        </div>

        <?php if(isset($_SESSION['alert'])): ?>
            <div class="alert alert-<?php echo e($_SESSION['alert']['type']); ?>" role="alert">
                <?php echo e($_SESSION['alert']['message']); ?>

            </div>
        <?php endif; ?>
        <div class="row my-4">
            <?php echo $__env->yieldContent('contenido'); ?>
        </div>

    </div>
</body>

</html>
<?php /**PATH C:\Users\PEPE\Desktop\FP_INFORMATICA\FP_INFORMATICA\C2_DWES\IESRODEIRA\IESRODEIRA_DWES\www\UD5\ParteB\views/base.blade.php ENDPATH**/ ?>