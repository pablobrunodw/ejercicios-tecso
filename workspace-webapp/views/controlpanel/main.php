<?php 
	if ($esAdmin) {
		$cantAlumnos = $admin->getCantAlumnos();
		$cantProfesores = $admin->getCantProfesores();
		$cantCarreras = $admin->getCantCarreras();
		$cantCursos = $admin->getCantCursos();
	
 ?>

<div class="col-xs-12 col-md-10 col-md-offset-1 news-form">
	<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
		<div class="resume-inner send col-xs-12">
			<div class="col-xs-6 dato">
				<h1><?php echo $cantAlumnos; ?></h1>
				<h5>ALUMNOS</h5>
			</div>
			<div class="col-xs-6"><i class="icon users"></i></div>
		</div>
	</div>
	<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
		<div class="resume-inner inbox col-xs-12">
			<div class="col-xs-6 dato">
				<h1><?php echo $cantProfesores; ?></h1>
				<h5>PROFESORES</h5>
			</div>
			<div class="col-xs-6"><i class="graduation cap icon"></i></div>
		</div>
	</div>
	<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
		<div class="resume-inner trash col-xs-12">
			<div class="col-xs-6 dato">
				<h1><?php echo $cantCarreras; ?></h1>
				<h5>CARRERAS</h5>
			</div>
			<div class="col-xs-6"><i class="university icon"></i></div>
		</div>
	</div>
	<div class="col-xs-6 col-xm-6 col-sm-3 resume-card">
		<div class="resume-inner envelope col-xs-12">
			<div class="col-xs-6 dato">
				<h1><?php echo $cantCursos; ?></h1>
				<h5>CURSOS</h5>
			</div>
			<div class="col-xs-6"><i class="icon calendar outline"></i></div>
		</div>
	</div>
</div>
<?php } else { ?>
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 news-form">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h4><i class="user outline icon"></i> Bienvenido <?php echo $profile[0]['nombre']." ".$profile[0]['apellido'] ?>
					
		     	</h4>
			</div>
			<div class="box-body">
			</div>
		</div>
	</div>
<?php } ?>


<script>    
  $(document).ready(function(){                
    $("#sd_panelcontrol").addClass("active");
  });
</script>
