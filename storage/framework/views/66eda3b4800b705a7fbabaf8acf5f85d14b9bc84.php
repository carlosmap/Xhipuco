
<?php
	 $ruta=[route("consulta_productos"), "Productos" ];
	 $menu=1;
?>



<?php $__env->startSection('content'); ?>

	<div class="page-header ">
		<h1 class="d-flex justify-content-center">Información del Producto</h1>

		<?php if(session('status')): ?>
			<label for="" style="" ><?php echo e(session('status')); ?></label>
		<?php endif; ?>
	</div>

	<div>
		<div class=" row justify-content-end"  >


				<button type="button" class="btn btn-secondary" title="Editar Producto" onclick="habilitar(['nombreProducto', 'contenidoNeto','unidadMedida','marca','descripcionProducto', 'valorProducto','estadoProducto'])" >
	                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
	  					<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
					</svg>
	          	</button>

	        &nbsp;&nbsp;&nbsp;
	        <?php
				if(trim($errors)=="[]")
				{
			?>
	        <form action="<?php echo e(route('eliminar_producto',$producto->codigo_producto)); ?>" method="POST" onsubmit="return confirm('Desea eliminar el producto?')" >
		        <?php echo csrf_field(); ?>
		        <?php echo method_field('DELETE'); ?>
		        <div id="del" >
		        	<button type="submit"  class="btn btn-secondary" title="Eliminar Producto" >
		        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
						  	<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
						</svg>
		        	</button>
		        </div>
			</form>
			<?php
	    		}
	        ?>
          	&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
         </div>
     </div>



	<form method="POST" action="<?php echo e(route('actualizarProducto', $producto->codigo_producto)); ?>" role="form">
		<?php echo csrf_field(); ?>

<?php
	if(trim($errors)=="[]")
	{
		$desabilita="disabled";
	}
	else
	{
		$desabilita="";
	}
?>

		<div class="justify-content-center ">
			<div class=" form-group ">
				<label for="Producto"><b><h3>Producto</h3></b></label>

				<?php if($errors=="[]"): ?>
						<?php ($P=$producto->nombre_producto); ?>
				<?php else: ?>
						<?php ( $P=old('nombreProducto') ); ?>
				<?php endif; ?>

				<input type="text" class="form-control" name="nombreProducto" id="nombreProducto"  autofocus="" value="<?php echo e($P); ?>" <?php echo e($desabilita); ?>  >

				<label><?php echo $errors->first('nombreProducto'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Contenido Neto</h3></b></label>
					<?php if($errors=="[]"): ?>
						<?php ( $Con=$producto->cantidad_neta_producto ); ?>
					<?php else: ?>
						<?php ( $Con=old('contenidoNeto') ); ?>
					<?php endif; ?>

					<input type="number" class="form-control" name="contenidoNeto" id="contenidoNeto" value="<?php echo e($Con); ?>" <?php echo e($desabilita); ?> >
				<label ><?php echo $errors->first('contenidoNeto'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Unidad de medida</h3></b></label>

					<select name="unidadMedida" id="unidadMedida"  class="form-control" <?php echo e($desabilita); ?>  >
							<option value="">Seleccione Unidad de Medida</option>
							<?php $__currentLoopData = $unidadesMedida; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidadesMedidaItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


								<?php if(old('unidadMedida')==$unidadesMedidaItem->codigo_unidad_medida): ?>
									<?php ( $select='selected' ); ?>

								<?php elseif($unidadesMedidaItem->codigo_unidad_medida == $producto->unidad_medida_producto ): ?>
									<?php ( $select='selected' ); ?>
								<?php else: ?>
									<?php ( $select=''); ?>
								<?php endif; ?>

								<option <?php echo e($select); ?> value="<?php echo e($unidadesMedidaItem->codigo_unidad_medida); ?>"><?php echo e($unidadesMedidaItem->abreviacion_unidad_medida." - ".$unidadesMedidaItem->unidad_medida); ?></option>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>

				<label ><?php echo $errors->first('unidadMedida'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Marca</h3></b></label>

					<?php if($errors=="[]"): ?>
						<?php ( $M=$producto->marca_producto ); ?>
					<?php else: ?>
						<?php ( $M=old('marca') ); ?>
					<?php endif; ?>


					<input type="text" class="form-control" name="marca" id="marca" value="<?php echo e($M); ?>" <?php echo e($desabilita); ?> >

				<label ><?php echo $errors->first('marca'); ?> </label>
			</div>

			<div class="form-group">
				<label for=""><b><h3>Descripci&oacute;n </h3></b></label>

				<?php if($errors=="[]"): ?>
					<?php ( $D= $producto->descripcion_producto ); ?>
				<?php else: ?>
					<?php ( $D= old('descripcionProducto') ); ?>
				<?php endif; ?>

				<textarea name="descripcionProducto" id="descripcionProducto" class="form-control" id="" cols="10" rows="3" <?php echo e($desabilita); ?> > <?php echo e($D); ?> </textarea>
				<label ><?php echo $errors->first('descripcionProducto'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Valor $</h3></b></label>

					<?php if($errors=="[]"): ?>
						<?php ( $V= $producto->valor_producto ); ?>
					<?php else: ?>
						<?php ( $V= old('valorProducto') ); ?>
					<?php endif; ?>

					<input type="number" class="form-control" name="valorProducto" id="valorProducto" value="<?php echo e($V); ?>" <?php echo e($desabilita); ?> >

				<label ><?php echo $errors->first('valorProducto'); ?> </label>
			</div>

			<div class=" form-group ">
					<label for=""><b><h3>Estado</h3></b></label>

					<select name="estadoProducto" id="estadoProducto"  class="form-control" <?php echo e($desabilita); ?>  >

						<?php ( $select=''); ?>
						<?php if(old('estadoProducto')==1): ?>
							<?php ( $select='selected' ); ?>
						<?php endif; ?>

						<?php if($producto->estado_producto==1 ): ?>
							<?php ( $select='selected' ); ?>
						<?php endif; ?>

						<option value="1" <?php echo e($select); ?> >Activo</option>

						<?php ( $select=''); ?>
						<?php if(old('estadoProducto')==0): ?>
							<?php ( $select='selected' ); ?>
						<?php endif; ?>

						<?php if($producto->estado_producto==0 ): ?>
							<?php ( $select='selected' ); ?>
						<?php endif; ?>

						<option value="0" <?php echo e($select); ?> >Inactivo</option>
					</select>
			</div>


					<div class="form-group" id="up" style="
					<?php if(trim($errors)=="[]"): ?>
						<?php echo e("display: none;"); ?>

					<?php else: ?>
						<?php echo e("display: block;"); ?>

					<?php endif; ?>
					" >
						<input type="hidden" id="edit" value="0" >
						<button class="btn btn-secondary">Actualizar</button>
					</div>


		</div>
	</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Almacen\resources\views/Productos/detalleProducto.blade.php ENDPATH**/ ?>