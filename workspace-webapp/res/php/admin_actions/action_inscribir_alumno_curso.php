<?php
	require '../Functions.php';

	$admin = new Admin_Actions();

	$fechainscripcion = date('Y-m-d');

	$cambioAlumno = $admin->inscribirAlumnoCurso($_POST['idalumno'],$_POST['idcurso'],$fechainscripcion);
	
	if ($cambioAlumno>0) {
		echo $_POST['idalumno'];
	} else {
		echo "0";
	}
		
	
?>