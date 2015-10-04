<?php $this->load->view('errors/display'); ?>
<?php $atribs_fechainicial = array('id' => 'fecha_inicial', 'class' => 'form-control'); ?>
	<?php 	echo form_open('captura/add'); ?>
	<div class="form-group">
		<?php	echo form_label('Qna', 'qna_id');?>
		<?php	echo form_input('qna_id','' ,'class="form-control"');?>
	</div>
	<div class="form-group">
		<?php	echo form_label('Empleado', 'empleado_id');?>
		<?php	echo form_input('empleado_id','' ,'class="form-control"'); ?> 
	</div>
	<div class="form-group">
		<?php	echo form_label('Codigo de incidencia', 'incidencia_cod'); ?> 
		<?php	echo form_dropdown('incidencia_id',$options,'' ,'class="form-control"');  ?>
	</div>
	<div class="form-group" id='sandbox-container'>
		<?php	echo form_label('Fecha inicial', 'fecha_inicial'); ?>
		<?php	echo form_input('fecha_inicial','' ,'class="form-control"'); 	?> 
	</div>
	<div class="form-group" id='sandbox-container'>
		<?php	echo form_label('Fecha final', 'fecha_final');?>
		<?php	echo form_input('fecha_final','' ,'class="form-control"'); ?>
	</div>
	<div class="form-group">	
		<?php	echo form_hidden('token', $token);	   ?>
		<?php	echo form_submit('Submit', 'Enviar',"class='btn btn-primary'");?>
		<?php	echo form_close();?>
	</div>
		

<script>
  $('#sandbox-container input').datepicker({
      format: "dd/mm/yyyy",
      language: "es",
      orientation: "top right",
      autoclose: true
  });
</script>




