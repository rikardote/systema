<?php validation_errors();  ?> 
<?php if (isset($capturas)): ?>
	
	<table class="table table-striped table-condensed table-bordered">
		<tr>
			
			<td align="center"><b>Codigo</b></td>
			<td align="center"><b>Fecha Inicial</b></td>
			<td align="center"><b>Fecha Final</b></td>
			<td align="center"><b>Total Dias</b></td>
			<td align="center"><b>Periodo</b></td>
		</tr>

	<?php $atributo_boton_eliminar = array('class' => 'btn btn-danger fa fa-trash-o', 'onclick' => "javascript:return confirm('Seguro que desea eliminar este dato?')");				 ?>
	<?php 	foreach ($capturas as $row): ?> 
		<tr>
			<td align="center"><?php echo $row->incidencia_cod;?></td>
			<td align="center"><?php echo fecha_dma($row->fecha_inicial);?></td>
			<td align="center"><?php echo fecha_dma($row->fecha_final);?></td>
			<td align="center"></td>
			<td align="center"><?php if ($row->perio_id!=10) {echo $row->period.'/'.$row->year; }?></td>
			<td align="center"><?php echo anchor('captura/delete/'.$row->id.'/'.$row->empleado_id.'/'.$row->qna_id,' ',$atributo_boton_eliminar);?></td>

		
		</tr>
	<?php 	endforeach; ?>
	</table>
<?php endif; ?>