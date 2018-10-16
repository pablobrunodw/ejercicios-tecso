----EJERCICIOS
-- SOLO ES REQUERIDO REALIZAR LOS EJERCICIOS DE COMPLEJIDAD BAJA, realizar los demas ejercicios serán puntos extras para la evaluación del examen.


--- EJERCICIO 1 - COMPLEJIDAD BAJA: 
--Realizar una consulta para consultar todos los alumnos existentes, mostrar: TipoDoc, Documento, Nombre, Apellido, Legajo.

-- TODAS LAS SOLUCIONES FUERON HECHAS EN SQL SERVER Y NO EN POSTGRESQL PUESTO QUE DABA ERROR DE CONEXIÓN Y POR CUESTIONES
-- DE TIEMPO NO PUDE INVESTIGAR CUAL ERA LA FALLA QUE ESTABA PRESENTANDO EL PROGRAMA

SELECT persona.tipodoc AS TipoDoc, persona.documento AS Documento, persona.nombre AS Nombre, persona.apellido AS Apellido, alumno.legajo AS Legajo 
FROM persona INNER JOIN alumno ON persona.identificador = alumno.idpersona;


--- EJERCICIO 2 - COMPLEJIDAD BAJA: 
--Realizar una consulta para consultar todas las carreras a la que un alumno esta inscripto, mostrar: Legajo, nombre, apellido, nombre carrera, fechainscripcioncarrera
--ordenado por legajo descendiente

SELECT legajo, persona.nombre, apellido, carrera.nombre, fechainscripcion 
FROM inscripciones_carrera 
INNER JOIN alumno on inscripciones_carrera.idalumno = alumno.identificador
INNER JOIN persona on alumno.idpersona = persona.identificador
INNER JOIN carrera on inscripciones_carrera.idcarrera = carrera.identificador
ORDER BY legajo DESC;


--- EJERCICIO 3 - COMPLEJIDAD MEDIA: 
--Realizar una consulta para consultar la cantidad de inscriptos por curso, mostrando: nombre carrera, nombre curso, cantidad inscriptos, cupo máximo por curso

SELECT carrera.nombre, curso.nombre,COUNT(*) AS inscripciones, curso.cupomaximo
FROM inscripciones_curso
INNER JOIN curso ON inscripciones_curso.idcurso = curso.identificador
INNER JOIN carrera ON curso.idcarrera = carrera.identificador
GROUP BY carrera.nombre, curso.nombre, curso.cupomaximo;


--- EJERCICIO 4 - COMPLEJIDAD ALTA: 
--Sobre la consulta anterior (copiar y pegarla y modificarla) modificar la sql para que la consulta retorne solo los cursos cuya cantidad de inscripciones 
--supera su cupo maximo

SELECT carrera.nombre, curso.nombre, CONSULTA.INSCRIPCIONES, curso.cupomaximo FROM
(SELECT idcurso AS IDCURSO, COUNT(*) AS INSCRIPCIONES
FROM inscripciones_curso
GROUP BY idcurso) AS CONSULTA
INNER JOIN curso ON CONSULTA.IDCURSO = curso.identificador
INNER JOIN carrera ON curso.idcarrera = carrera.identificador
where CONSULTA.INSCRIPCIONES >= curso.cupomaximo;


--- EJERCICIO 5 -  COMPLEJIDAD BAJA: 
-- actualizar todos las cursos que posean anio 2018 y cuyo cupo sea menor a 5, y actualizar el cupo de todos ellos a 10.

UPDATE curso set cupomaximo = 10 where anio = 2018 AND cupomaximo < 5;


--- EJERCICIO 6 -  COMPLEJIDAD ALTA: 
-- actualizar todas las fechas de inscripcion a cursados que posean el siguiente error: la fecha de inscripcion al cursado de un 
-- alumno es menor a la fecha de inscripcion a la carrera. La nueva fecha que debe tener es la fecha del dia. Se puede hacer en dos pasos, primero
-- realizando la consulta y luego realizando el update manual

UPDATE T1
 SET T1.fechainscripcion = CONVERT(date,GETDATE())
 FROM inscripciones_curso T1
	INNER JOIN inscripciones_carrera T2
	ON T1.idalumno = T2.idalumno
 WHERE T1.fechainscripcion < T2.fechainscripcion


--- EJERCICIO 7 - COMPLEJIDAD BAJA:  
--INSERTAR un nuevo registro de alumno con tus datos personales, (hacer todos inserts que considera necesario)

BEGIN TRANSACTION
   DECLARE @DataID table(ident integer);
   DECLARE @newAl int;
   INSERT INTO persona(identificador,nombre,apellido,tipodoc,documento,fechanac)
   OUTPUT INSERTED.identificador
   INTO @DataID
   VALUES (6,'Pablo','Bruno','DNI',28912953,'1981-09-10');
   SELECT @newAl = ident FROM @DataID;
   INSERT INTO alumno(identificador,idpersona,legajo) VALUES (6,@newAl,41812);
COMMIT


--- EJERCICIO 8 -  COMPLEJIDAD BAJA: 
-- si se desea comenzar a persistir de ahora en mas el dato de direccion de un alumno y considerando que este es un único cambio string de 200 caracteres.
-- Determine sobre que tabla seria mas conveniente persistir esta información y realizar la modificación de estructuras correspondientes.

ALTER TABLE persona
  ADD direccion VARCHAR(200);

  