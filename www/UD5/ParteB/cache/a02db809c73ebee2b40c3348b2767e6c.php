<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definimos la codificación de caracteres como UTF-8 -->
    <meta charset="UTF-8">
    <!-- Establecemos la vista de la página para que sea responsive en dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página que puede ser sobreescrito por cada vista -->
    <title><?php echo $__env->yieldContent('pageTitle', 'Juego Online'); ?></title>

    <!-- Importamos la hoja de estilo de Bootstrap desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Importamos los iconos de Bootstrap desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<!-- Cuerpo del documento, contiene el layout principal -->

<body class="p-3 text-info-emphasis bg-light border border-primary-subtle rounded-3">
    <!-- Contenedor principal de la página con la clase Bootstrap "container" -->
    <div class="container">
        <!-- Fila que contiene el título de la página -->
        <div class="row my-4 text-center">
            <div class="col">
                <!-- El título se puede sobrescribir mediante <?php echo $__env->yieldContent; ?> -->
                <h2><?php echo $__env->yieldContent('titulo', 'Título por Defecto'); ?></h2>
            </div>
        </div>

        <!-- Si existe una alerta en la sesión, la mostramos -->
        <?php if(isset($_SESSION['alert'])): ?>
            <div class="alert alert-<?php echo e($_SESSION['alert']['type']); ?>" role="alert">
                <!-- Mostramos el mensaje de la alerta -->
                <?php echo e($_SESSION['alert']['message']); ?>

            </div>
        <?php endif; ?>

        <!-- Fila donde se insertará el contenido específico de cada vista -->
        <div class="row my-4">
            <!-- La directiva <?php echo $__env->yieldContent; ?> se utiliza para insertar el contenido de las vistas -->
            <?php echo $__env->yieldContent('contenido'); ?>
        </div>

    </div>
</body>

</html>
<?php /**PATH H:\Mi unidad\XX-CACHE\04-MP0613-DWCS\TAREA-05B\José Rosales Sueiro_1272732_assignsubmission_file\GITHUB\IESRODEIRA_DWES\www\UD5\ParteB\views/base.blade.php ENDPATH**/ ?>