<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          <a class="brand" href="#"><img src="<?php echo base_url();?>/assets/images/logo.png" alt=""></a>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="<?php echo active_link('empleados'); ?>"><a href="<?php echo base_url();?>empleados">Empleados</a></li>
        <li class="<?php echo active_link('captura'); ?>"><a href="<?php echo base_url();?>captura">Capturar Incidencias</a></li>
        <li class="<?php echo active_link('qnas'); ?>"><a href="<?php echo base_url();?>qnas">Quincenas</a></li>
        <li class="<?php echo active_link('adscripciones'); ?>"><a href="<?php echo base_url();?>adscripciones">Adscripciones</a></li>
        <li class="<?php echo active_link('incidencias'); ?>"><a href="<?php echo base_url();?>incidencias">Incidencias</a></li>
        
        <li class="<?php echo active_link('periodos'); ?>"><a href="<?php echo base_url();?>periodos">Periodos</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="">Bienvenido: <?=$username?></a></li>
        <li><a href="<?=base_url()?>auth/logout">Salir</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


