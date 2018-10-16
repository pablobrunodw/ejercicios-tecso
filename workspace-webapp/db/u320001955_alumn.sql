-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-10-2018 a las 13:12:56
-- Versión del servidor: 10.2.16-MariaDB
-- Versión de PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u320001955_alumn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `identificador` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `legajo` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`identificador`, `idpersona`, `legajo`, `estado`) VALUES
(1, 3, 98734, 1),
(2, 4, 9213, 1),
(3, 1, 35839, 1),
(4, 5, 36299, 1),
(5, 2, 11009, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `identificador` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechadesde` date NOT NULL,
  `fechahasta` date DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`identificador`, `nombre`, `descripcion`, `fechadesde`, `fechahasta`, `estado`) VALUES
(1, 'Ingenieria en sistema de información', 'Carrera a fines a programación y desarrollo de software en general', '1960-01-01', NULL, 1),
(2, 'Ingenieria civil', 'Carrera a fines a construcción, planificación y desarrollo de obras de desarrollo urbano', '1980-01-01', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `identificador` int(11) NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cupomaximo` smallint(6) NOT NULL,
  `anio` smallint(6) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`identificador`, `idcarrera`, `idprofesor`, `nombre`, `descripcion`, `cupomaximo`, `anio`, `estado`) VALUES
(1, 1, 1, 'Análisis matemático', 'Curso sobre el desarrollo avanzado de matemáticas', 5, 2018, 1),
(2, 1, 2, 'Diseño de sistemas', 'Curso sobre diseño de componentes de sistemas de software', 3, 2018, 1),
(3, 1, 1, 'Java', 'Curso sobre el lenguaje de programación JAVA', 4, 2018, 1),
(4, 1, 1, 'Base de datos-SQL', 'Curso sobre tipos de base de datos y consultas sql', 10, 2018, 1),
(5, 2, 2, 'Fisica básica', 'Curso sobre fundamentos base de física', 5, 2018, 1),
(6, 2, 2, 'Dibujo', 'Curso sobre dibujo de planos', 10, 2018, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_carrera`
--

CREATE TABLE `inscripciones_carrera` (
  `idalumno` int(11) NOT NULL,
  `idcarrera` int(11) NOT NULL,
  `fechainscripcion` date NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inscripciones_carrera`
--

INSERT INTO `inscripciones_carrera` (`idalumno`, `idcarrera`, `fechainscripcion`, `estado`) VALUES
(1, 1, '2000-01-01', 1),
(2, 1, '2003-01-01', 1),
(3, 1, '2004-01-01', 1),
(4, 1, '2001-01-01', 1),
(5, 2, '2000-01-01', 1),
(4, 2, '2000-01-01', 1),
(1, 2, '2018-10-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_curso`
--

CREATE TABLE `inscripciones_curso` (
  `idalumno` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `fechainscripcion` date NOT NULL,
  `nota` decimal(10,2) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inscripciones_curso`
--

INSERT INTO `inscripciones_curso` (`idalumno`, `idcurso`, `fechainscripcion`, `nota`, `estado`) VALUES
(1, 1, '2002-01-01', '7.89', 1),
(1, 2, '2006-01-01', '4.55', 1),
(1, 3, '2002-01-01', NULL, 1),
(2, 1, '2004-01-01', '8.43', 1),
(2, 3, '2002-01-01', '9.27', 1),
(2, 4, '2004-01-01', '8.66', 1),
(3, 1, '2010-01-01', '3.23', 1),
(3, 3, '2010-01-01', '3.86', 1),
(4, 1, '2010-01-01', '7.27', 1),
(4, 3, '2009-01-01', '5.10', 1),
(5, 5, '2010-01-01', '4.50', 1),
(4, 3, '2010-01-01', '6.20', 1),
(5, 5, '2011-01-01', '8.76', 1),
(4, 4, '2011-01-01', '7.56', 1),
(4, 5, '2011-01-01', '9.73', 1),
(4, 6, '2011-01-01', NULL, 1),
(1, 4, '2018-10-16', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `identificador` int(11) NOT NULL,
  `tipodoc` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `documento` bigint(20) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `fechanac` date NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`identificador`, `tipodoc`, `documento`, `nombre`, `apellido`, `fechanac`, `estado`) VALUES
(1, 'DNI', 31565839, 'Florencia', 'Maneiro', '1985-06-28', 1),
(2, 'DNI', 31000123, 'Patricia', 'Brumatti', '1985-01-13', 1),
(3, 'DNI', 20945422, 'Diego', 'Menendez', '1982-04-10', 1),
(4, 'DNI', 30999281, 'Franzo', 'Perez', '1986-02-05', 1),
(5, 'DNI', 24112872, 'Leandro', 'Garcia', '1988-01-03', 1),
(6, 'DNI', 28912953, 'Pablo', 'Bruno', '1981-09-10', 1),
(7, 'DNI', 32099167, 'Laura', 'Guayanez', '1983-02-20', 1),
(8, 'DNI', 30299012, 'Mariano', 'Tobaldo', '1986-12-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `identificador` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `legajo` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`identificador`, `idpersona`, `legajo`, `estado`) VALUES
(1, 7, 1982, 1),
(2, 8, 1162, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `identificador` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`identificador`, `nombre`, `estado`) VALUES
(1, 'Administracion', 1),
(2, 'Alumno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `identificador` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idrole` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`identificador`, `idpersona`, `idrole`, `username`, `password`, `estado`) VALUES
(1, 6, 1, 'admin', '$2y$10$mOl9iM/87RPeop/wYqpWnOr3gNeXGY6KcMrHXO9X49PUPykjsM.se', 1),
(2, 5, 2, '11009', '$2y$10$mOl9iM/87RPeop/wYqpWnOr3gNeXGY6KcMrHXO9X49PUPykjsM.se', 1),
(3, 3, 2, '98734', '$2y$10$mOl9iM/87RPeop/wYqpWnOr3gNeXGY6KcMrHXO9X49PUPykjsM.se', 1),
(4, 1, 2, '35839', '$2y$10$mOl9iM/87RPeop/wYqpWnOr3gNeXGY6KcMrHXO9X49PUPykjsM.se', 1),
(5, 4, 2, '9213', '$2y$10$mOl9iM/87RPeop/wYqpWnOr3gNeXGY6KcMrHXO9X49PUPykjsM.se', 1),
(6, 5, 2, '36299', '$2y$10$mOl9iM/87RPeop/wYqpWnOr3gNeXGY6KcMrHXO9X49PUPykjsM.se', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`identificador`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`identificador`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`identificador`),
  ADD KEY `IDCARRERA` (`idcarrera`),
  ADD KEY `IDPROFESOR` (`idprofesor`);

--
-- Indices de la tabla `inscripciones_carrera`
--
ALTER TABLE `inscripciones_carrera`
  ADD KEY `IDALUMNO` (`idalumno`),
  ADD KEY `IDCARRERA` (`idcarrera`);

--
-- Indices de la tabla `inscripciones_curso`
--
ALTER TABLE `inscripciones_curso`
  ADD KEY `IDALUMNO` (`idalumno`),
  ADD KEY `IDCURSO` (`idcurso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`identificador`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`identificador`),
  ADD KEY `IDPERSONA` (`idpersona`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`identificador`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`identificador`),
  ADD KEY `IDPERSONA` (`idpersona`),
  ADD KEY `IDROLE` (`idrole`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`identificador`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idcarrera`) REFERENCES `carrera` (`identificador`),
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`idprofesor`) REFERENCES `profesor` (`identificador`);

--
-- Filtros para la tabla `inscripciones_carrera`
--
ALTER TABLE `inscripciones_carrera`
  ADD CONSTRAINT `inscripciones_carrera_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`identificador`),
  ADD CONSTRAINT `inscripciones_carrera_ibfk_2` FOREIGN KEY (`idcarrera`) REFERENCES `carrera` (`identificador`);

--
-- Filtros para la tabla `inscripciones_curso`
--
ALTER TABLE `inscripciones_curso`
  ADD CONSTRAINT `inscripciones_curso_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`identificador`),
  ADD CONSTRAINT `inscripciones_curso_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`identificador`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`identificador`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `persona_usuario` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`identificador`),
  ADD CONSTRAINT `role_usuario` FOREIGN KEY (`idrole`) REFERENCES `roles` (`identificador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
