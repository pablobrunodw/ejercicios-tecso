<?php 
	$alumnoUsuario = $admin->getAlumnoByPersona(intval($profile[0]['identificador']));
	$carrerasAlumno = $admin->getCarrerasByAlumno(intval($alumnoUsuario[0]['identificador']));

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
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Carrera</th>
						<th>Cupo</th>
						<th>Año</th>
						<th>Profesor</th>
						<th>Estado</th>
						<th>Nota</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if (!empty($carrerasAlumno)) {
							foreach ($carrerasAlumno as $carrera) {
							$cursos = $admin->getCursosByCarrera($carrera["identificador"]);
							$notas = 0;
							$cantMaterias = 0;
							if (!empty($cursos)) {
								foreach ($cursos as $curso) {
									$cursosByAlumno = $admin->getCursosByAlumno($alumnoUsuario[0]['identificador'],$curso["identificador"]);
									$profesor = $admin->getProfesorById($curso['idprofesor']);
									if (!empty($cursosByAlumno)) {
										foreach ($cursosByAlumno as $cursoPA) {
											if (!is_null($cursoPA["nota"])) {
												if (floatval($cursoPA['nota'] >= 6)) {
													$est = '<span class="ui green label">APROBADO</span>';
												 	$notaPA = $cursoPA["nota"];
												 	$anotarse = '';
												 } else {
												 	$est = '<span class="ui red label">REPROBADO</span>';
												 	$notaPA = $cursoPA["nota"];
												 	$anotarse = '<button class="ui button blue btnInscCurso" data-idcurso="'.$curso["identificador"].'" data-idalumno="'.$alumnoUsuario[0]['identificador'].'">Inscribirse</button>';
												 }
												
											} else {
												$est = '<span class="ui orange label">CURSANDO</span>';
												$notaPA = '-';
												$anotarse = '';
											}
										}
									} else {
										$est = '<span class="ui yellow label">PENDIENTE</span>';
										$notaPA = '-';
									 	$anotarse = '<button class="ui button blue btnInscCurso" data-idcurso="'.$curso["identificador"].'" data-idalumno="'.$alumnoUsuario[0]['identificador'].'">Inscribirse</button>';
									}
									echo "<tr>";
										echo "<td>".$curso['nombre']."</td>";
										echo "<td>".$curso['descripcion']."</td>";
										echo "<td>".$carrera['nombre']."</td>";
										echo "<td>".$curso['cupomaximo']."</td>";
										echo "<td>".$curso['anio']."</td>";
										echo "<td>".$profesor[0]['nombre']." ".$profesor[0]['apellido']."</td>";
										echo "<td>".$est."</td>";
										echo "<td>".$notaPA."</td>";
										echo "<td><div class='ui icon buttons'>".$anotarse."</div></td>";
									echo "</tr>";
								}
							}
						}
						}
					 ?>

				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript" src="views/cursos/cursos.js"></script>