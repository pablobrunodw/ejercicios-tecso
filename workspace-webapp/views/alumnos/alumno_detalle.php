<?php 

	$idAlumno = $_GET["idAlumno"];
	$alumno = $admin->getAlumnoById($idAlumno);
	$carrerasAlumno = $admin->getCarrerasByAlumno($idAlumno);

	foreach ($carrerasAlumno as $carrera) {
		$carreraAnotado[] = intval($carrera["identificador"]);
	}

	$carrerasParaAnotarse = $admin->getCarrerasParaAnotarse($carreraAnotado);
 ?>

 <div class="col-xs-12 col-sm-10 col-sm-offset-1 news-form">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h4><i class="user icon"></i> Datos del alumno</h4>
		</div>
		<div class="box-body">
			<div class="col-xs-12 no-padding">
				<div class="col-xs-12 col-sm-6">
					<input type="hidden" name="idpersona" class="idpersona" required="required" value="<?php echo $alumno[0]['idpersona'] ?>">
					<input type="hidden" name="idalumno" class="idalumno" required="required" value="<?php echo $idAlumno ?>">
					<p><b>Nombre *</b></p>
					<div class="ui left icon input">
						<input type="text" name="nombre" class="nombre" placeholder="Nombre" required="required" value=" <?php echo $alumno[0]["nombre"]; ?>">
						<i class="user icon"></i>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<p><b>Apellido *</b></p>
					<div class="ui left icon input">
						<input type="text" name="apellido" class="apellido" placeholder="Apellido" required="required" value=" <?php echo $alumno[0]["apellido"]; ?>">
						<i class="user icon"></i>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<p><b>Tipo de Documento</b></p>
					<select name="slt_tdoc" id="slt_tdoc" class="form-control slt_tdoc">
						<option value="DNI" <?php if($alumno[0]["tipodoc"] == 1){ echo "selected"; } ?>>DNI</option>
						<option value="LC" <?php if($alumno[0]["tipodoc"] == 2){ echo "selected"; } ?>>Libreta Cívica</option>
					</select>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<p><b>Nro de Documento *</b></p>
					<div class="ui left icon input">
						<input type="number" name="nroDoc" class="nroDoc" placeholder="Nro de Documento" required="required" value="<?php echo $alumno[0]['documento']; ?>">
						<i class="id card icon"></i>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<p><b>Fecha de nacimiento *</b></p>
					<div class="ui left icon input">
						<input type="date" name="fechaNac" class="fechaNac" id="fechaNac" placeholder="fechaNac" required="required" value="<?php echo $alumno[0]['fechanac'] ?>">
						<i class="calendar icon"></i>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<p><b>Legajo *</b></p>
					<div class="ui left icon input">
						<input type="number" name="nroLegajo" class="nroLegajo" placeholder="Nro de Legajo" required="required" value="<?php echo $alumno[0]['legajo'] ?>">
						<i class="barcode icon"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<a href="/index.php?view=alumnos" class="ui button gray pull-left">Volver</a>
			<button class="ui button negative pull-right btnEliminarAlumno" id="btnEliminarAlumno">Borrar</button>
			<button class="ui button positive pull-right btnGuardarAlumno" id="btnGuardarAlumno">Guardar</button>
		</div>
	</div>
</div>
 <div class="col-xs-12 col-sm-10 col-sm-offset-1">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h4><i class="university icon"></i> Carreras cursadas
				<button type="button" class="ui button positive pull-right nuevoCarrera" data-toggle="modal" data-target="#addCarrera">
					<i class="plus icon"></i> Nueva carrera
				</button>
			</h4>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-striped table-condensed ui inverted" width="100%" cellspacing="0" id="tabla_usuarios">
				<thead>
					<tr>
						<th>ID</th>
						<th>Carrera</th>
						<th>Descipcion</th>
						<th>Inscripción</th>
						<th>Promedio</th>
						<th width="10%">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($carrerasAlumno as $carrera) {
							$cursos = $admin->getCursosByCarrera($carrera["identificador"]);
							$notas = 0;
							$cantMaterias = 0;
							if (!empty($cursos)) {
								foreach ($cursos as $curso) {
									$cursosByAlumno = $admin->getCursosByAlumno($idAlumno,$curso["identificador"]);
									foreach ($cursosByAlumno as $cursoPA) {
										if (!is_null($cursoPA["nota"])) {
											$notas += floatval($cursoPA["nota"]);
											$cantMaterias += 1;
											$notaPA = $cursoPA["nota"];
										} else {
											$notaPA = 'CURSANDO';
										}
									}
								}
							}

							if ($cantMaterias > 0) {
								$promedio = $notas / $cantMaterias;
							} else {
								$promedio=0;
							}
							// botones
				              	$historial = '<button class="ui blue icon button historial" data-idcarrera="'.$carrera['identificador'].'">Estado</button>';
              					// Filas
							echo "<tr>";
								echo "<td>".$carrera['identificador']."</td>";
								echo "<td>".$carrera['nombre']."</td>";
								echo "<td>".$carrera['descripcion']."</td>";
								echo "<td>".$carrera['fechainscripcion']."</td>";
								echo "<td>".number_format($promedio,2)."</td>";
								echo "<td><div class='ui icon buttons'>".$historial."</div></td>";
							echo "</tr>";
						}
					 ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>



  <div class="modal fade" id="addCarrera" tabindex="-1" role="dialog" aria-labelledby="Nuevo Alumno">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Nuevo Carrera</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
            <div class="col-xs-12 no-padding">
              <div class="col-xs-12 col-sm-6">
                <p><b>Tipo de Documento</b></p>
                <input type="hidden" name="idalumnocarrera" class="idalumnocarrera" value="<?php echo $idAlumno; ?>" required="required">
                <select name="slt_carrera" id="slt_carrera" class="form-control slt_carrera">
                  <?php 
                  if (!empty($carrerasParaAnotarse)) {
                   	foreach ($carrerasParaAnotarse as $carreraPA) {
                   		echo "<option value='".$carreraPA['identificador']."'>".$carreraPA['nombre']."</option>";
                   	}
                   } ?>
                </select>
              </div>
              <div class="col-xs-12 col-sm-6">
                <p><b>Fecha de Inscripción *</b></p>
                <div class="ui left icon input">
                  <input type="date" name="fechainscripcion" class="fechainscripcion" id="fechainscripcion" placeholder="fechaNac" required="required">
                  <i class="calendar icon"></i>
                </div>
              </div>
            </div>
       	</div>
        </div>
        <div class="modal-footer">
          <div class="ui buttons pull-right">
            <button class="ui button positive btnInscCarrera" id="btnInscCarrera">Guardar</button>
            <div class="or" data-text="O"></div>
            <a  data-dismiss="modal" class="ui button" >Cancelar</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php 
foreach ($carrerasAlumno as $carrera) {
		$cursos = $admin->getCursosByCarrera($carrera["identificador"]);
		$notas = 0;
		$cantMaterias = 0;
		$modalHistorial = '';
		$modalHistorial = '<div class="modal fade" id="Carrera_'.$carrera['identificador'].'" tabindex="-1" role="dialog" aria-labelledby="Nuevo Alumno">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          <h4 class="modal-title" id="myModalLabel">'.$carrera['nombre'].'</h4>
		        </div>
		        <div class="modal-body table-responsive">
		        <table class="table table-striped table-condensed ui inverted" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Curso</th>
						<th>Descipcion</th>
						<th>Inscripción</th>
						<th>Nota</th>
					</tr>
				</thead>
				<tbody>';
		if (!empty($cursos)) {
			foreach ($cursos as $curso) {
				$cursosByAlumno = $admin->getCursosByAlumno($idAlumno,$curso["identificador"]);
				foreach ($cursosByAlumno as $cursoPA) {
					if (!is_null($cursoPA["nota"])) {
						$notas += floatval($cursoPA["nota"]);
						$cantMaterias += 1;
						$notaPA = $cursoPA["nota"];
					} else {
						$notaPA = 'CURSANDO';
					}
					$modalHistorial .= '<tr>';
					$modalHistorial .= '<td>'.$cursoPA["nombre"].'</td>';
					$modalHistorial .= '<td>'.$cursoPA["descripcion"].'</td>';
					$modalHistorial .= '<td>'.$cursoPA["fechainscripcion"].'</td>';
					$modalHistorial .= '<td>'.$notaPA.'</td>';
					$modalHistorial .= '</tr>';
				}
			}
		}

		if ($cantMaterias > 0) {
			$promedio = $notas / $cantMaterias;
		} else {
			$promedio=0;
		}
		
		$modalHistorial .= '<tr style="background: teal;color: #fff; font-weight:900;">';
		$modalHistorial .= '<td></td>';
		$modalHistorial .= '<td></td>';
		$modalHistorial .= '<td>PROMEDIO</td>';
		$modalHistorial .= '<td>'.number_format($promedio,2).'</td>';
		$modalHistorial .= '</tr>';


		$modalHistorial .= '</tbody></table></div></div></div></div>';
		echo $modalHistorial;
		
	}
 ?>

<script type="text/javascript" src="views/alumnos/alumnos.js"></script>
