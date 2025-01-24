
 
<?php $__env->startSection('pageTitle', 'Crear Jugador'); ?>

<?php $__env->startSection('titulo', 'Crear Jugador'); ?>
 
<?php $__env->startSection('contenido'); ?>
<!-- Contenido de la pagina -->
<div class="row my-4">
    <form method="POST" action="crearJugador.php">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre:</label><br>
                <input class="form-control" type="text" id='nombre' name="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label><br>
                <input class="form-control" type="text" id='apellidos' name="apellidos" placeholder="Apellidos" required><br>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4 mb-3">
                <label for="dorsal" class="form-label">Dorsal:</label><br>
                <select class="form-select" id="dorsal" name="dorsal">
                    <option value="" disabled selected>Dorsal</option>
                    <?php for($i = 1; $i <= 99; $i++): ?>
                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="posicion" class="form-label">Posición:</label><br>
                <select class="form-select" id="posicion" name="posicion" required>
                    <?php $__currentLoopData = $posiciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($posicion['cod']); ?>"><?php echo e($posicion['nombre']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="code" class="form-label">Código de Barras:</label><br>
                <input class="form-control" type="text" id="code" name="code" placeholder="Código de Barras" readonly
                value="<?php echo e(isset($_SESSION['codigo']) ? $_SESSION['codigo'] : '-'); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <button class="btn btn-primary btn-md" type="submit">Crear</button>
                <button class="btn btn-success btn-md" type="reset">Limpiar</button>
                <a class="btn btn-danger btn-md" href="index.php">Volver</a>
                <a class="btn btn-warning btn-md" href="generarCode.php">Generar codigo</a>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PEPE\Desktop\FP_INFORMATICA\FP_INFORMATICA\C2_DWES\IESRODEIRA\IESRODEIRA_DWES\www\UD5\ParteB\views/vcrear.blade.php ENDPATH**/ ?>