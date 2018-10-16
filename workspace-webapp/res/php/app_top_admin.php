<?php

	//Cargo el archivo de Funciones 
	require 'Functions.php';

	//Genero un usuario
	$admin = new Admin_Actions();
	$m = time() - 60;
	$d = time() - 86400;
	if (isset($_SESSION["admin"])) {
		$profile = $admin->getProfile($_SESSION['admin']);
	}

?>