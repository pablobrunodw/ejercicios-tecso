<?php 
	$cursos = $admin->getCursos();

 ?>

<div class="col-xs-12 col-sm-10 col-sm-offset-1 news-form">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h4><i class="calendar outline icon"></i> Cursos
				<button type="button" class="ui button positive pull-right nuevoAlumno" data-toggle="modal" data-target="#addUser">
					<i class="plus icon"></i> Nuevo
				</button>
	     	</h4>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-striped table-condensed ui inverted" width="100%" cellspacing="0" id="tabla_alumnos">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Carrera</th>
						<th>Cupo</th>
						<th>Año</th>
						<th>Profesor</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if (!empty($cursos)) {
							foreach ($cursos as $curso) {
								$profesor = $admin->getProfesorById($curso['idprofesor']);
								$inscriptos = '<button class="ui button blue btnInscriptos" data-idcurso="'.$curso['identificador'].'">Inscriptos</button>';
								echo "<tr>";
									echo "<td>".$curso['identificador']."</td>";
									echo "<td>".$curso['nombre']."</td>";
									echo "<td>".$curso['descripcion']."</td>";
									echo "<td>".$curso['nomCarrera']."</td>";
									echo "<td>".$curso['cupomaximo']."</td>";
									echo "<td>".$curso['anio']."</td>";
									echo "<td>".$profesor[0]['nombre']." ".$profesor[0]['apellido']."</td>";
									echo "<td>".$inscriptos."</td>";
								echo "</tr>";
							}
						}
					 ?>

				</tbody>
			</table>
		</div>
	</div>
</div><!--  -->

<script type="text/javascript" src="views/cursos/cursos.js"></script>