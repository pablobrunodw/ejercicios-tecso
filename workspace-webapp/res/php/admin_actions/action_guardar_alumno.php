<?php
	require '../Functions.php';

	$admin = new Admin_Actions();

	$cambioPersona = $admin->updatePersona($_POST['idpersona'],$_POST['nombre'], $_POST['apellido'], $_POST['tipodoc'],$_POST['nroDoc'], $_POST['fechaNac']);
	$cambioAlumno = $admin->updateAlumno($_POST['idalumno'],$_POST['nroLegajo']);
	
	if ($cambioAlumno>0) {
		echo $_POST['idalumno'];
	} else {
		echo "0";
	}
		
	
?>