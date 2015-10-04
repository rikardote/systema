<?php  //echo validation_errors(); ?>
		
<div class="col-xs-6">
	<p><button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		</button>
	</p>
</div>

	<div align="" class="col-xs-6">
		<?=form_open('empleados/search');?>
		<?php 	$search = array('name' => 'search','id' => 'search','value'=>'' );?>
		<?=	form_input($search);?> <input type=submit value='Buscar' /></p>
		<?=form_close();?>
	</div>


<table class="table table-striped">
		<tr>
			<td>Numero de Empleado</td>
			<td>Nombre</td>
			<td>Adscripcion</td>
			<td>Acciones</td>

		</tr>
		<tr>
<?php if (isset($empleado)): ?>
			
			
<?php	foreach ($empleado as $empleado): ?>
			<?php 
				$atributo_boton_modificar = array('data-toggle' => 'modal', 'data-target' => '.bs-example-modal-sm', 'class' => 'btn btn-warning glyphicon glyphicon-pencil');
				
			 ?>
				<?php
					if($empleado->activo) {
						$atributo_boton_activate = array('class' => 'btn btn-success glyphicon glyphicon-off'); 
					} else {
						$atributo_boton_activate = array('class' => 'btn btn-default glyphicon glyphicon-off'); 
					}
				?>
				<td><?php echo anchor('empleados/'.$empleado->id, $empleado->num_empleado);?></td>
				<td><?php echo anchor('empleados/'.$empleado->id, nombre_completo($empleado->nombres,$empleado->apellido_pat,$empleado->apellido_mat)) ?></td>
				<td><?php echo $empleado->adscripcion;?></td>
				<td>
					
					<?php echo anchor('empleados/delete/'.$empleado->id,' ',$atributo_boton_activate);?>
					<?php echo anchor('empleados/edit/'.$empleado->id,' ',$atributo_boton_modificar);?> 
				</td>


		</tr>
<?php 	endforeach;?>
<?php endif ?>
</table>	
</div>	
	

<!-- Small modal -->


<div id="mymodal"class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content col-xs-12" >
      <?php $this->load->view('empleados/form'); ?>

    </div>
  </div>
</div>
<script>
	$('#mymodal').on('hidden.bs.modal', function () {
    window.location.reload(true);
})
</script>


