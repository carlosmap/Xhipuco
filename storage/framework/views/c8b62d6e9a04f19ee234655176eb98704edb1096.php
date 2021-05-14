<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header "><h3>Menú</h3>
                </div>
                <div class="card-header"><a href="<?php echo e(route('consulta_productos')); ?> "><b><h3>Productos</h3></b></a></div>

                <div class="card-header"><a href="<?php echo e(route('consulta_inventario')); ?> "><b><h3>Inventario</h3></b></a></div>

                <div class="card-header"><a href="<?php echo e(route('consulta_productos')); ?> "><b><h3>Facturas</h3></b></a></div>

                <div class="card-header"><a href="<?php echo e(route('consulta_productos')); ?> "><b><h3>Reportes</h3></b></a></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Almacen\resources\views/home.blade.php ENDPATH**/ ?>