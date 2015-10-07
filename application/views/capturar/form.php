<?php $qna_completas = $qna->qna_mes.'/'.$qna->qna_year.' - '.$qna->qna_descripcion; ?>
<?php $empleado_completo = nombre_completo($empleado->nombres,$empleado->apellido_pat,$empleado->apellido_mat);?>


<?php $atributos = array('id' => 'miFormulario', 'name' => 'miFormulario'); ?>
<?php $atribs_fechainicial = array('id' => 'fecha_inicial', 'class' => 'form-control'); ?>
	
	<?php 	echo form_open('captura/add',$atributos); ?>
	<div class="form-group">
		<?php 
			$data = array(
		        'type'  => 'hidden',
		        'name'  => 'qna_id',
		        'id'    => 'qna_id',
		        'value' => $qna->id,
		        
			);
		?>
		<?php	echo form_label('Qna: '.$qna_completas, 'qna_id');?>
		<?php	echo form_input($data);?>
	</div>
	<div class="form-group">
		<?php 
			$data = array(
		        'type'  => 'hidden',
		        'name'  => 'empleado_id',
		        'id'    => 'empleado_id',
		        'value' => $empleado->id,
		        
			);
		?>
		<?php	echo form_label($empleado->num_empleado.' - '.$empleado_completo, 'empleado_id');?>
		<?php	echo form_input($data); ?> 
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
		<?php	echo form_label('Periodo', 'periodo');?>
		<?php	echo form_dropdown('periodo_id',$periodos,'' ,'class="form-control"');  ?>
	</div>
	<div class="form-group">	
		
		<?php $this->load->view('errors/display'); ?>
		<?php	echo form_submit('Submit', 'Enviar',"class='btn btn-primary'");?>
		<?php	echo form_close();?>
	</div>
		

<script>
  $('#sandbox-container input').datepicker({
      
      language: "es",
      orientation: "top right",
      autoclose: true
  });
</script>


