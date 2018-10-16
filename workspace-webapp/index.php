<?php 
	//Cargo archivo inicial
	require 'res/php/app_top_admin.php';
	
	setlocale(LC_TIME, 'es_RA');
	$esAdmin=false;
	$esAlumno=false;
	if(!empty($profile)){
		switch ($profile[0]['idrole']) {
			case 1:
				$esAdmin=true;
				break;
			case 2:
				$esAlumno=true;
				break;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Panel de Control</title>

	<link rel="stylesheet" type="text/css" href="res/semantic/semantic.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="res/css/main-admin.css">
	<link rel="stylesheet" type="text/css" href="res/css/box.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
        <!-- datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
	
</head>
<body class="admin-body">
	<?php 
		if (isset($_SESSION['admin'])) {
			require 'views/nav/main_admin_nav.php'; 
			require 'views/nav/sidebar.php'; 
		}
	?>
	<div class="content">
		<?php require_once 'views/success.php'; ?>
		<?php require_once 'views/danger.php'; ?>

	<?php 
		if (!isset($_SESSION['admin'])) {
			require 'views/admin/log-in.php';
		}else{
			if(isset($_GET["view"]))
		        $view=$_GET["view"];
		    else
		        $view="";
			
		

			switch ($view) {
				case 'panelcontrol':
					require 'views/controlpanel/main.php';
					break;
				case 'alumnos':
					require 'views/alumnos/alumnos.php';
					break;
				case 'alumno_detalle':
					require 'views/alumnos/alumno_detalle.php';
					break;
				case 'cursos':
					if ($esAdmin) {
						require 'views/cursos/cursos.php';
					}elseif ($esAlumno) {
						require 'views/cursos/cursos_alumno.php';
					}
					break;
				case 'usuarios':
					require 'views/usuarios/usuarios.php';
					break;
				
				default:
					require 'views/controlpanel/main.php';
					break;
			}
		}
	 ?>
	</div>


<script type="text/javascript" src="res/semantic/semantic.min.js"></script>
<!-- datatable -->                        
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/components/icon.min.css">

</body>
</html>