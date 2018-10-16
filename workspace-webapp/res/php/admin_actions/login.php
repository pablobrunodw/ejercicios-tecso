<?php 
	require '../Functions.php';


	$admin = new Admin_Actions;

	//Datos de logueo
	$login = $admin->logIn($_POST['email'],$_POST['pass']);
	if ($login) {
		//Inicio de Sesión
		$_SESSION['admin'] = $_POST['email'];
		echo "true";
	}else{
		echo "false";
	};
?>