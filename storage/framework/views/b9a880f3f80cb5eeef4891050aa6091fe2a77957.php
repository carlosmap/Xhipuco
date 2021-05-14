
<?php
	 $ruta=[route("consulta_productos"), "Productos" ];
	 $menu=1;
?>



<?php $__env->startSection('content'); ?>



	<div class="page-header ">
		<h1 class="d-flex justify-content-center">Nuevo Producto</h1>
	</div>


	<form method="POST" action="<?php echo e(route('registrarProducto')); ?>" role="form">
		<?php echo csrf_field(); ?>

		<div class="justify-content-center ">
			<div class=" form-group ">
				<label for="Producto"><b><h3>Producto</h3></b></label>
				<input type="text" class="form-control" name="nombreProducto"  autofocus="" value="<?php echo e(old('nombreProducto')); ?>" >

				<label><?php echo $errors->first('nombreProducto'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Contenido Neto</h3></b></label>
					<input type="number" class="form-control" name="contenidoNeto" value="<?php echo e(old('contenidoNeto')); ?>" >

				<label ><?php echo $errors->first('contenidoNeto'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Unidad de medida</h3></b></label>

					<select name="unidadMedida"  class="form-control" >
							<option value="">Seleccione Unidad de Medida</option>
							<?php $__currentLoopData = $unidadesMedida; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidadesMedidaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<?php echo e($select=''); ?>

							<?php if(old('unidadMedida')==$unidadesMedidaItem->codigo_unidad_medida): ?>
								<?php echo e($select='selected'); ?>


							<?php endif; ?>
								<option <?php echo e($select); ?> value="<?php echo e($unidadesMedidaItem->codigo_unidad_medida); ?>"><?php echo e($unidadesMedidaItem->abreviacion_unidad_medida." - ".$unidadesMedidaItem->unidad_medida); ?></option>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>

				<label ><?php echo $errors->first('unidadMedida'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Marca</h3></b></label>
					<input type="text" class="form-control" name="marca" value="<?php echo e(old('marca')); ?>" >

				<label ><?php echo $errors->first('marca'); ?> </label>
			</div>

			<div class="form-group">
				<label for=""><b><h3>Descripci&oacute;n </h3></b></label>
				<textarea name="descripcionProducto" class="form-control" id="" cols="10" rows="3"><?php echo e(old('descripcionProducto')); ?></textarea>
				<label ><?php echo $errors->first('descripcionProducto'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Valor $</h3></b></label>
					<input type="number" class="form-control" name="valorProducto" value="<?php echo e(old('valorProducto')); ?>" >

				<label ><?php echo $errors->first('valorProducto'); ?> </label>
			</div>

			<div class="form-group">
				<button class="btn btn-secondary">Guardar</button>
			</div>
		</div>
	</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Almacen\resources\views/Productos/crearProducto.blade.php ENDPATH**/ ?>