<?php $atributo_boton_capturar = array('class' => 'btn btn-success glyphicon glyphicon-pencil'); ?>
<p>Para iniciar la captura seleccione como desea realizarla: </p>
<table class="table table-striped">
	<tr>
		<td align='center'>Opcion</td>
		<td align='center'>Qnas</td>
	</tr>		
		<tr>
			<td><?php echo "Capturar por centro de trabajo";?></td>
			<td align='center'>
			<?php foreach ($qnas as $qna): ?>
				<?php echo anchor('admin/capturar_por_centro/'.$qna->id,$qna->qna_mes.'/'.$qna->qna_year,$atributo_boton_capturar );?>
			<?php endforeach ?>
			</td>
		<tr>
			<td><?php echo "Capturar por grupos de incidencia";?></td>
			<td align='center'>
				<?php foreach ($qnas as $qna): ?>
				<?php echo anchor('admin/capturar_por_incidencia/'.$qna->id,$qna->qna_mes.'/'.$qna->qna_year,$atributo_boton_capturar );?>
			<?php endforeach ?>
			</td>
			
		</tr>
		
</table>

