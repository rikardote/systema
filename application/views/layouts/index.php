<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SISSSTEMA</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo site_url();?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo site_url();?>assets/css/bootstrap-datepicker.min.css">

<link rel="stylesheet" href="<?php echo site_url();?>assets/css/my_style.css">

<link rel="stylesheet" href="<?php echo site_url();?>assets/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<script src="<?php echo site_url();?>assets/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo site_url();?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo site_url();?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo site_url();?>assets/locales/bootstrap-datepicker.es.min.js"></script>



<!-- Latest compiled and minified JavaScript -->
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

</head>
 
<body class="mygradient" onload="startTime()">
	<!-- Barra de navegacion -->
	<?php $this->load->view('layouts/nav'); ?>

	
	

<div class="container">	
	<div class="panel panel-primary ">
  		<div class="panel-heading ">
  			<h3 class="panel-title"><?=$panelheading;?></h3>
  		</div>
  		<div class="panel-body ">
  			
    		<?php $this->load->view($index); ?>
    		
  		</div>
	</div>

</div>		


<footer>
	<div class="container">
		<div id="txt"></div>
         &copy;  <? echo date('Y');?> ISSSTE BAJA CALIFORNIA
    </div>
</footer>


</body>


</html>