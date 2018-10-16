<?php
	require '../Functions.php';

	$admin = new Admin_Actions();

	$idpersona = $admin->registerPersona($_POST['nombre'], $_POST['apellido'], $_POST['tipodoc'],$_POST['nroDoc'], $_POST['fechaNac']);
	$idalumno = $admin->registerAlumno($idpersona,$_POST['nroLegajo']);
	$iduser = $admin->registerUser($idpersona,2,$_POST['nroLegajo']);
	
	if ($idalumno>0) {
		echo $idalumno;
	} else {
		echo "0";
	}
		
	
?>