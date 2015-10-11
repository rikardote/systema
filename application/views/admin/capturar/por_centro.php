
<table class="table table-striped">
		<tr>
			<td><b>Codigo</b></td>
			<td><b>Descripcion</b></td>
			<td align='center'><b>Total de Incidencias</b></td>
			<td><b>Acciones</b></td>
		
		</tr>
		
<?php	foreach ($get_incidencias as $incidencia): ?>
		<tr>
				<?php 
					$atributo_boton_modificar = array('data-toggle' => 'modal', 'data-target' => '.bs-example-modal-sm', 'class' => 'btn btn-success glyphicon glyphicon-pencil');
					$atributo_boton_eliminar = array('class' => 'btn btn-danger glyphicon glyphicon-remove', 'onclick' => "javascript:return confirm('Seguro que desea eliminar este dato?')");				
				 ?>
				<td><?php echo $incidencia->adscripcion;?></td>
				<td><?php echo $incidencia->descripcion;?></td>
				<td align='center'><span class="badge"><?php echo get_total($incidencia->qna_id,$incidencia->adscripcion_id);?></span></td>
				<td>
					<?php echo anchor('adscripciones/edit/'.$incidencia->id,' ',$atributo_boton_modificar);?> 
					<?php echo anchor('adscripciones/delete/'.$incidencia->id,' ',$atributo_boton_eliminar);?>
				</td>
			

			</tr>
	<?php 	endforeach;?>

</table>	
	
