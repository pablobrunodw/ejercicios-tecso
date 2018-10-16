<?php 
	require 'init.php';

	class Admin_Actions{
		// Cantidad de alumnos
		public function getCantAlumnos(){
			global $database;

			$cantAlumnos = $database->count("alumno", [
				"estado" => true
			]);

			return $cantAlumnos;	
		}
		
		public function getCantProfesores(){
			global $database;

			$cantAlumnos = $database->count("profesor", [
				"estado" => true
			]);

			return $cantAlumnos;	
		}

		public function getCantCarreras(){
			global $database;

			$cantCarreras = $database->count("carrera", [
				"estado" => true
			]);

			return $cantCarreras;	
		}

		//Registro de usuario
		public function getCantCursos(){
			global $database;

			$cantCursos = $database->count("curso", [
				"estado" => true
			]);

			return $cantCursos;	
		}

		//Registro de usuario
		public function registerPersona($nombre, $apellido, $tipodoc, $documento, $fechanac ){
			global $database;
				$register = $database->insert("persona", [
					"nombre" 			=> htmlentities($nombre),
					"apellido"		=> htmlentities($apellido),
					"tipodoc"			=> $tipodoc,
					"documento"		=> intval($documento),
					"fechanac"		=> $fechanac,
					"estado"			=> true
				]);

				return $database->id();
		}

		//Registro de usuario
		public function updatePersona($idpersona,$nombre, $apellido, $tipodoc, $documento, $fechanac ){
			global $database;
				$update = $database->update("persona", [
					"nombre" 			=> htmlentities($nombre),
					"apellido"		=> htmlentities($apellido),
					"tipodoc"			=> $tipodoc,
					"documento"		=> intval($documento),
					"fechanac"		=> $fechanac
				],[
					"identificador" => $idpersona
				]);

				return $update->rowCount();
		}

		//Registro de usuario
		public function registerAlumno($idpersona,$legajo ){
			global $database;

			if ($this->alumnoAvailable($legajo) == 0) {
				$register = $database->insert("alumno",[
					"idpersona" => $idpersona,
					"legajo" => $legajo,
					"estado" => true
				]);

				return $database->id();
			} else {
				return false;
			}

		}

		//Registro de usuario
		public function inscribirAlumno($idalumno,$idcarrera,$fechainscripcion ){
			global $database;
			$register = $database->insert("inscripciones_carrera",[
				"idalumno" => $idalumno,
				"idcarrera" => $idcarrera,
				"fechainscripcion" => $fechainscripcion,
				"estado" => true
			]);

			return $database->id();
		}

		//Registro de usuario
		public function inscribirAlumnoCurso($idalumno,$idcurso,$fechainscripcion ){
			global $database;
			$register = $database->insert("inscripciones_curso",[
				"idalumno" => $idalumno,
				"idcurso" => $idcurso,
				"fechainscripcion" => $fechainscripcion,
				"estado" => true
			]);

			return $database->id();
		}

		//Registro de usuario
		public function updateAlumno($idalumno,$legajo ){
			global $database;

			if ($this->alumnoAvailable($legajo) == 0) {
				$update = $database->update("alumno",[
					"legajo" => $legajo
				]);

				return $update->rowCount();
			} else {
				return false;
			}

		}

		//Registro de usuario
		public function registerUser($idpersona,$idrole,$username ){
			global $database;
				$register = $database->insert("users",[
					"idpersona" => $idpersona,
					"idrole" => $idrole,
					"username" => $username,
					"password" => password_hash(123456, PASSWORD_BCRYPT),
					"estado" => true
				]);

				return $database->id();
			
		}

		//Recuperar Alumnos de la DB
		public function getAlumnos(){
			global $database;

			$alumnos = $database->select("alumno",[
				"[>]persona" => ["idpersona" => "identificador"]
			],[
				"alumno.identificador",
				"alumno.legajo",
				"persona.tipodoc",
				"persona.documento",
				"persona.nombre",
				"persona.apellido",
				"persona.estado",
			]);

			return $alumnos;
		}
		//Registro de usuario
		public function getAlumnoById($idalumno){
			global $database;

				$alumno = $database->select("alumno",[
					"[>]persona" => ["idpersona" => "identificador"]
				],[
					"alumno.identificador",
					"alumno.legajo",
					"alumno.idpersona",
					"persona.tipodoc",
					"persona.documento",
					"persona.nombre",
					"persona.apellido",
					"persona.fechanac",
					"persona.estado",
				],[
					"alumno.identificador" => $idalumno
				]);

				return $alumno;
		}
		//Registro de usuario
		public function getAlumnoByPersona($idpersona){
			global $database;

				$alumno = $database->select("alumno",[
					"[>]persona" => ["idpersona" => "identificador"]
				],[
					"alumno.identificador",
					"alumno.legajo",
					"alumno.idpersona",
					"persona.tipodoc",
					"persona.documento",
					"persona.nombre",
					"persona.apellido",
					"persona.fechanac",
					"persona.estado",
				],[
					"alumno.idpersona" => $idpersona
				]);

				return $alumno;
		}
		//Registro de usuario
		public function getProfesorById($idprofesor){
			global $database;

				$profesor = $database->select("profesor",[
					"[>]persona" => ["idpersona" => "identificador"]
				],[
					"profesor.identificador",
					"profesor.legajo",
					"profesor.idpersona",
					"persona.tipodoc",
					"persona.documento",
					"persona.nombre",
					"persona.apellido",
					"persona.fechanac",
					"persona.estado",
				],[
					"profesor.identificador" => $idprofesor
				]);

				return $profesor;
		}
		//Registro de usuario
		public function getCarrerasByAlumno($idalumno){
			global $database;

				$carreras = $database->select("inscripciones_carrera",[
					"[>]carrera" => ["idcarrera" => "identificador"]
				], 
				"*",
				[
					"idalumno" => $idalumno
				]);

				return $carreras;
		}
		//Registro de usuario
		public function getCarrerasParaAnotarse($idcarreras){
			global $database;


				$carreras = $database->select("carrera", 
				"*",
				[
					"identificador[!]" => $idcarreras
				]);

				return $carreras;
		}
		//Registro de usuario
		public function getCursosByCarrera($idcarrera){
			global $database;

				$cursos = $database->select("curso", 
				"*",
				[
					"idcarrera" => $idcarrera
				]);

				return $cursos;
		}
		//Registro de usuario
		public function getCursos(){
			global $database;

				$cursos = $database->select("curso",[
					"[>]carrera" => ["idcarrera" => "identificador"]
				],
				[
					"curso.identificador",
					"curso.nombre",
					"curso.descripcion",
					"curso.anio",
					"curso.cupomaximo",
					"curso.idcarrera",
					"curso.idprofesor",
					"carrera.nombre(nomCarrera)"
				]);

				return $cursos;
		}
		//Registro de usuario
		public function getCursosByAlumno($idalumno,$idcurso){
			global $database;

				$cursosT = $database->select("inscripciones_curso",[
					"[>]curso" => ["idcurso" => "identificador"]
				],"*",
				[
					"idalumno" => $idalumno,
					"idcurso" => $idcurso
				]);

				return $cursosT;
		}

		public function alumnoAvailable($legajo){
			global $database;

			$user = $database->count("alumno",[
				"legajo"=> $legajo
			]);

			return $user;

		}

		//Logueo
		public function logIn($username,$pass){
			global $database;

			$data = $database->select("users",
				["password"],
				["username" => $username]
			);



			$password_db = $data[0]["password"];

			if(password_verify($pass, $password_db)){
				return $data;
			}else{
				return false;
			}
		}

		//Perfil del administrador
		public function getProfile($username){
			global $database;

			$admin = $database->select("users",[
				"[>]persona" => ["idpersona" => "identificador"]
			],'*',
				[
					"username" => $username,
				]
			);

			return $admin;
		}

	}
 ?>