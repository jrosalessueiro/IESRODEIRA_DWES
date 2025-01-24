

<?php $__env->startSection('pageTitle', 'Listado Jugadores'); ?>

<?php $__env->startSection('titulo', 'Listado Jugadores'); ?>

<?php $__env->startSection('contenido'); ?>

    <!-- Contenido de la pagina -->

    <div class="row my-4">
        <div class="col">
            <!-- Enlace para crear un nuevo producto -->
            <a class="btn btn-success btn-lg" href="fcrear.php">+Nuevo Jugador</a>
        </div>
    </div>

    <div class="row my-4 text-center">
        <div class="col-12 col-md-8 col-lg-8 mx-auto">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>Nombre Completo</th>
                        <th>Posición</th>
                        <th>Dorsal</th>
                        <th>Código de Barras</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $jugadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jugador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <!-- Enlace al detalle del producto, pasando su ID como parámetro -->
                        <td class="text-start"><?php echo e(htmlspecialchars($jugador['apellidos'] . ', ' . $jugador['nombre'])); ?> </td>
                        <td class="text-center"><?php echo e(htmlspecialchars(getPositionByCod($jugador['posicion'])['nombre'])); ?> </td>
                        <td class="text-center"><?php echo e($jugador['dorsal'] ? htmlspecialchars($jugador['dorsal']) : 'Sin Asignar'); ?></td>
                        <td class="d-flex justify-content-center align-items-center"><?php echo $barcodeManager->printCode(code: $jugador['code']); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PEPE\Desktop\FP_INFORMATICA\FP_INFORMATICA\C2_DWES\IESRODEIRA\IESRODEIRA_DWES\www\UD5\ParteB\views/vjugadores.blade.php ENDPATH**/ ?>