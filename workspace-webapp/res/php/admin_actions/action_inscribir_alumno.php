<?php
	require '../Functions.php';

	$admin = new Admin_Actions();

	$cambioAlumno = $admin->inscribirAlumno($_POST['idalumno'],$_POST['idcarrera'],$_POST['fechainscripcion']);
	
	if ($cambioAlumno>0) {
		echo $_POST['idalumno'];
	} else {
		echo "0";
	}
		
	
?>