


<?php $__env->startSection('content'); ?>

	<div class="page-header ">
		<h1 class="d-flex justify-content-center">Inventario</h1>

		<?php if(session('status')): ?>
			<label for="" style="" ><?php echo e(session('status')); ?></label>
		<?php endif; ?>
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Almacen\resources\views/inventario/consultaInventario.blade.php ENDPATH**/ ?>