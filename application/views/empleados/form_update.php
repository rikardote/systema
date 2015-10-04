
<?php 
$id = '<p><input type="hidden" name="id" value="'.$this->uri->segment(3).'"</p>';

$num_empleado = $actualizar->num_empleado;
$nombres = $actualizar->nombres;
$apellido_pat = $actualizar->apellido_pat;
$apellido_mat = $actualizar->apellido_mat;
$adscripcion = $actualizar->adscripcion_id;


?>

<div class="form-group">
<?php $atributos = array('id' => 'miFormulario', 'name' => 'miFormulario'); ?>	
<?php $atribs_num = array('id' => 'numero_empleado','name' => 'num_empleado','class' => 'form-control'); ?>	
<?php $atribs_nombres = array('id' => 'nombres','name' => 'nombres','class' => 'form-control'); ?>	
<?php $atribs_pat = array('id' => 'apellido_pat','name' => 'apellido_pat','class' => 'form-control'); ?>	
<?php $atribs_mat = array('id' => 'apellido_mat','name' => 'apellido_mat','class' => 'form-control'); ?>	
<?php $atribs_ads = array('id' => 'adscripcion_id','name' => 'adscripcion','class' => 'form-control'); ?>	

<?php $atribbs = array('id' => 'submit', 'class' => 'btn btn-primary'); ?>		
<?php 	echo form_open('empleados/update', $atributos);?>
<?php 	echo $id; ?>
<?php	echo form_label('Numero de Empleado', 'num_empleado');?>
<?php	echo form_input('num_empleado',$num_empleado, $atribs_num);?>
<?php	echo form_label('Nombre(s)', 'nombres');?>
<?php	echo form_input('nombres',$nombres,$atribs_nombres);   ?>  
<?php	echo form_label('Apellido Paterno', 'apellido_pat');?>
<?php	echo form_input('apellido_pat',$apellido_pat,$atribs_pat); ?>
<?php	echo form_label('Apellido Materno', 'apellido_pat');?>
<?php	echo form_input('apellido_mat',$apellido_mat,$atribs_mat); ?>
<?php	echo form_label('Adscripcion', 'adscripcion_id');?> 
<?php	echo form_dropdown('adscripcion_id',$options,$adscripcion,$atribs_ads); ?>


<div id="msg"></div>
<br>
<?php	echo form_submit('Submit', 'Enviar','class="btn btn-primary"');?>
<?php	echo form_close();?>
	
</div> 


<script type="text/javascript">
$(document).ready(function(){
	$("#miFormulario").submit(function( event ){
		event.preventDefault();

		$.ajax({
			type: 'POST',
			url: '<?php echo site_url("empleados/update");?>',
			data: $(this).serialize(),
			success: function(data){
				$("#msg").slideDown();
				$("#msg").html(data);
				

			}
		});

		return false;
	});
});

	
</script>