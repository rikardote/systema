<table class="table table-striped">
		<tr>
			<td><b>Codigo</b></td>
			<td><b>Descripcion</b></td>
			<td align='center'><b>Total de Incidencias</b></td>
			<td align='center'><b>Pendientes</b></td>
			<td><b>Acciones</b></td>
		
		</tr>
		
<?php	foreach ($get_incidencias as $incidencia): ?>
		<tr>
				<?php 
					$atributo_boton_modificar = array('class' => 'btn btn-success glyphicon glyphicon-pencil');
					$atributo_boton_eliminar = array('class' => 'btn btn-danger glyphicon glyphicon-remove', 'onclick' => "javascript:return confirm('Seguro que desea eliminar este dato?')");				
				 ?>
				<td><?php echo $incidencia->adscripcion;?></td>
				<td><?php echo $incidencia->descripcion;?></td>
				
				<td align='center'><span class="badge"><?php echo get_total($incidencia->qna_id,$incidencia->adscripcion_id);?></span></td>
				<td align='center'><span class="badge"><?php echo get_total_pendientes($incidencia->qna_id,$incidencia->adscripcion_id);?></span></td>
				<td>
					<?php echo anchor('admin/capturar_all_centro/'.$incidencia->qna_id.'/'.$incidencia->adscripcion_id,' ',$atributo_boton_modificar);?> 
					
				</td>
			

			</tr>
	<?php 	endforeach;?>

</table>	
