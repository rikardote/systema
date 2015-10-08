<?php if ($is_admin): ?>
	<div class="col-md-6">
		<p><button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

		</button></p>
	</div>
<?php endif ?>

	<table class="table table-striped">
			<tr>
				<td><b>Quincena</b></td>
				<td><b>Ano</b></td>
				<td><b>Descripcion</b></td>
				<?php if ($is_admin): ?>
					<td><b>Acciones</b></td>
				<?php endif ?>
			</tr>
			
	<?php $atributo_boton_modificar = array('data-toggle' => 'modal', 'data-target' => '.bs-example-modal-sm', 'class' => 'btn btn-warning glyphicon glyphicon-pencil');?>
					
	<?php	foreach ($qnas as $qna): ?>
			<tr>
				<td><?php echo $qna->qna_mes;?></td>
				<td><?php echo $qna->qna_year;?></td>
				<td><?php echo $qna->qna_descripcion;?></td>
				<?php
					if($qna->activa) {
						$atributo_boton_activate = array('class' => 'btn btn-success glyphicon glyphicon-off'); 
					} else {
						$atributo_boton_activate = array('class' => 'btn btn-default glyphicon glyphicon-off'); 
					}
				?>
				<?php if ($is_admin): ?>
					<td>
						<?php echo anchor('qnas/activate/'.$qna->id,' ',$atributo_boton_activate);?>
						<?php echo anchor('qnas/edit/'.$qna->id,' ',$atributo_boton_modificar);?> 
						
					</td>
				<?php endif ?>
			</tr>

	<?php 	endforeach;?>
		
	</table>	
		<div align="center"><ul class="pagination"> <?php echo $this->pagination->create_links(); ?> </ul></div>
	
	


<!-- Small modal -->


<div id="mymodal"class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content col-xs-12" >
      <?php $this->load->view('qnas/form'); ?>

    </div>
  </div>
</div>
<script>
	$('#mymodal').on('hidden.bs.modal', function () {
    window.location.reload(true);
})
</script>

