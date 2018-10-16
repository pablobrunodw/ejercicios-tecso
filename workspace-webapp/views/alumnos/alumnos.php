<?php 
	$alumnos = $admin->getAlumnos();
 ?>

<div class="col-xs-12 col-sm-10 col-sm-offset-1 news-form">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h4><i class="users icon"></i> Alumnos
			<button type="button" class="ui button positive pull-right nuevoAlumno" data-toggle="modal" data-target="#addUser">
				<i class="plus icon"></i> Nuevo
			</button>
      </h4>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-striped table-condensed ui inverted" width="100%" cellspacing="0" id="tabla_alumnos">
				<thead>
					<tr>
						<th>Legajo</th>
						<th>Tipo Doc</th>
						<th>Nro Doc</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Estado</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($alumnos as $alumno) {
							// botones
				              	$ver = '<a href="/index.php?view=alumno_detalle&idAlumno='.$alumno['identificador'].'" class="ui teal icon button editAlumno"><i class="edit outline icon"></i></a>';
           					$eliminar = '<button data-id="'.$alumno['identificador'].'" class="ui negative icon button negativa"><i class="ban icon"></i></button>';
           					$est = '<span class="ui label red">INACTIVO</span>';
           					
           					if ($alumno["estado"] == '1') {
           						$est = '<span class="ui label green">ACTIVO</span>';
           					}
              					// Filas
							echo "<tr>";
								echo "<td>".$alumno['legajo']."</td>";
								echo "<td>".$alumno['tipodoc']."</td>";
								echo "<td>".$alumno['documento']."</td>";
								echo "<td>".$alumno['nombre']."</td>";
								echo "<td>".$alumno['apellido']."</td>";
								echo "<td>".$est."</td>";
								echo "<td><div class='ui icon buttons'>".$ver.$eliminar."</div></td>";
								// echo "<td style='text-align: right'>".$editar." ".$borrar."</td>";
							echo "</tr>";
						}
					 ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include_once 'modales.php'; ?>

<script type="text/javascript" src="views/alumnos/alumnos.js"></script>
