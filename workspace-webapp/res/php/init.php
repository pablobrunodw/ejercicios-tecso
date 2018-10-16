<?php
	
	//Inicio de sesión
	session_start();

	//Cargo el FrameWork Gestor de BD
	require 'medoo.php';

	//Utilizo el renombr
	use Medoo\Medoo;

	try{
		// Inicio
		$database = new Medoo([
	    	'database_type' => 'mysql',
	    	'database_name' => 'u320001955_alumn',
	    	'server' => 'mysql.hostinger.com.ar',
	    	'username' => 'u320001955_alumn',
			'password' => 'X1JLGXzTqYaIr'
		]);
	}catch(PDOExeption $e){
		echo 'No se pudo conectar a la base de datos';
	}
	

?>