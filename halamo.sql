-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2019 a las 21:14:33
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `halamo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `PERSONA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Cli` bigint(20) NOT NULL,
  `TIPO_CLIENTE` bigint(20) NOT NULL,
  `TIPO_DESCUENTO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidades`
--

CREATE TABLE `funcionalidades` (
  `Id` bigint(20) NOT NULL,
  `Nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `Icon` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionalidades`
--

INSERT INTO `funcionalidades` (`Id`, `Nombre`, `Descripcion`, `Ruta`, `Icon`) VALUES
(1, 'Gestión Personas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'persona', 'fa fa-user-plus'),
(2, 'Gestión Reservas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'reserva', 'fa fa-calendar'),
(3, 'Gestión Habitaciones', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'habitaciones', 'fa fa-h-square'),
(4, 'Gestión Usuarios', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'usuario', 'fa fa-user'),
(5, 'Gestion Reportes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'reporte', 'fa fa-pie-chart'),
(6, 'Gestión Rol', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'rol', 'fa fa-users'),
(7, 'Configuración', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'configuracion', 'fa fa-cogs'),
(8, 'Administrador de Acceso', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'acceso', 'fa fa-lock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `Codigo` bigint(20) NOT NULL,
  `Disponible` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Y',
  `Num_Habitacion` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `TIPO_HABITACION` bigint(20) NOT NULL,
  `Imagen` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`Codigo`, `Disponible`, `Num_Habitacion`, `Precio`, `TIPO_HABITACION`, `Imagen`) VALUES
(1, 'Y', 1, 20000, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfun`
--

CREATE TABLE `perfun` (
  `PERMISO` bigint(20) NOT NULL,
  `FUNCIONALIDAD` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `Id` bigint(20) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`Id`, `Nombre`, `Descripcion`) VALUES
(1, 'Visualizar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, vel, nemo. Fugit optio quam, iusto et odio porro autem doloremque in officiis nesciunt possimus repudiandae facere ullam amet laborum ut.'),
(2, 'Agregar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, vel, nemo. Fugit optio quam, iusto et odio porro autem doloremque in officiis nesciunt possimus repudiandae facere ullam amet laborum ut.'),
(3, 'Editar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, vel, nemo. Fugit optio quam, iusto et odio porro autem doloremque in officiis nesciunt possimus repudiandae facere ullam amet laborum ut.'),
(4, 'Eliminar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, vel, nemo. Fugit optio quam, iusto et odio porro autem doloremque in officiis nesciunt possimus repudiandae facere ullam amet laborum ut.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Num_Documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TIPO_DOC` bigint(20) NOT NULL,
  `Movil` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Num_Documento`, `Nombre`, `Apellido`, `Direccion`, `Correo`, `TIPO_DOC`, `Movil`, `Telefono`) VALUES
('1', 'Recepcionista', 'rr', 'cc', 'recepcionista@gmail.com', 1, 0, 0),
('1090472103', 'ALDAIR', 'GONZALEZ', 'CUCUTA', 'aldair@gmail.com', 1, 12121, 2121),
('2', 'Cliente', 'cc', 'ccccc', 'cliente@gmail.com', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `Codigo` bigint(20) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Salida` date NOT NULL,
  `DescuentoReserva` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Total` float NOT NULL,
  `CLIENTE` bigint(20) NOT NULL,
  `HABITACION` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Id` bigint(20) NOT NULL,
  `Nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Id`, `Nombre`, `Descripcion`) VALUES
(1, 'Administrador', 'Lorem ipsum dolor sit amet'),
(2, 'Recepcionista', 'Lorem ipsum dolor sit amet'),
(3, 'Cliente', 'Lorem ipsum dolor sit amet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_funcionalidad`
--

CREATE TABLE `rol_funcionalidad` (
  `ROL` bigint(20) NOT NULL,
  `FUNCIONALIDAD` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol_funcionalidad`
--

INSERT INTO `rol_funcionalidad` (`ROL`, `FUNCIONALIDAD`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `Id_tc` bigint(20) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`Id_tc`, `Descripcion`) VALUES
(1, 'Habitual'),
(2, 'Esporadico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_descuento`
--

CREATE TABLE `tipo_descuento` (
  `Id_tdes` bigint(20) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `Id_tp` bigint(20) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`Id_tp`, `Descripcion`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Tarjeta de Identidad'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

CREATE TABLE `tipo_habitacion` (
  `Id_th` bigint(20) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`Id_th`, `Descripcion`) VALUES
(1, 'Simple'),
(2, 'Doble'),
(3, 'Matrimonial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` text COLLATE utf8_spanish_ci NOT NULL,
  `ROL` bigint(20) NOT NULL,
  `Agregado` date NOT NULL,
  `Log` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Activo` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Y',
  `PERSONA` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `contrasena`, `ROL`, `Agregado`, `Log`, `Activo`, `PERSONA`) VALUES
('aldair@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auQstvAs9a/DaWE6VrBHcKoyValeASYee', 1, '2019-07-19', '', 'Y', '1090472103'),
('cliente@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auQstvAs9a/DaWE6VrBHcKoyValeASYee', 3, '2019-07-19', '', 'Y', '2'),
('recepcionista@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auQstvAs9a/DaWE6VrBHcKoyValeASYee', 2, '2019-07-19', '', 'Y', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cli`),
  ADD UNIQUE KEY `Id_Cli` (`Id_Cli`),
  ADD KEY `PERSONA` (`PERSONA`),
  ADD KEY `TIPO_CLIENTE` (`TIPO_CLIENTE`),
  ADD KEY `TIPO_DESCUENTO` (`TIPO_DESCUENTO`);

--
-- Indices de la tabla `funcionalidades`
--
ALTER TABLE `funcionalidades`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Codigo` (`Codigo`),
  ADD KEY `TIPO_HABITACION` (`TIPO_HABITACION`);

--
-- Indices de la tabla `perfun`
--
ALTER TABLE `perfun`
  ADD PRIMARY KEY (`PERMISO`,`FUNCIONALIDAD`),
  ADD KEY `PERMISO` (`PERMISO`),
  ADD KEY `FUNCIONALIDAD` (`FUNCIONALIDAD`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Num_Documento`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD KEY `TIPO_DOC` (`TIPO_DOC`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Codigo` (`Codigo`),
  ADD KEY `CLIENTE` (`CLIENTE`),
  ADD KEY `HABITACION` (`HABITACION`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indices de la tabla `rol_funcionalidad`
--
ALTER TABLE `rol_funcionalidad`
  ADD PRIMARY KEY (`ROL`,`FUNCIONALIDAD`),
  ADD KEY `ROL` (`ROL`),
  ADD KEY `FUNCIONALIDAD` (`FUNCIONALIDAD`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  ADD PRIMARY KEY (`Id_tc`),
  ADD UNIQUE KEY `Id_tc` (`Id_tc`);

--
-- Indices de la tabla `tipo_descuento`
--
ALTER TABLE `tipo_descuento`
  ADD PRIMARY KEY (`Id_tdes`),
  ADD UNIQUE KEY `Id_tdes` (`Id_tdes`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`Id_tp`),
  ADD UNIQUE KEY `Id_tp` (`Id_tp`);

--
-- Indices de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  ADD PRIMARY KEY (`Id_th`),
  ADD UNIQUE KEY `Id_th` (`Id_th`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `ROL` (`ROL`),
  ADD KEY `PERSONA` (`PERSONA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_Cli` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funcionalidades`
--
ALTER TABLE `funcionalidades`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `Codigo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `Codigo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  MODIFY `Id_tc` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_descuento`
--
ALTER TABLE `tipo_descuento`
  MODIFY `Id_tdes` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `Id_tp` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_habitacion`
--
ALTER TABLE `tipo_habitacion`
  MODIFY `Id_th` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`PERSONA`) REFERENCES `persona` (`Num_Documento`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`TIPO_DESCUENTO`) REFERENCES `tipo_descuento` (`Id_tdes`),
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`TIPO_CLIENTE`) REFERENCES `tipo_cliente` (`Id_tc`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`TIPO_HABITACION`) REFERENCES `tipo_habitacion` (`Id_th`);

--
-- Filtros para la tabla `perfun`
--
ALTER TABLE `perfun`
  ADD CONSTRAINT `perfun_ibfk_1` FOREIGN KEY (`PERMISO`) REFERENCES `permisos` (`Id`),
  ADD CONSTRAINT `perfun_ibfk_2` FOREIGN KEY (`FUNCIONALIDAD`) REFERENCES `funcionalidades` (`Id`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`TIPO_DOC`) REFERENCES `tipo_documento` (`Id_tp`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`HABITACION`) REFERENCES `habitacion` (`Codigo`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`CLIENTE`) REFERENCES `cliente` (`Id_Cli`);

--
-- Filtros para la tabla `rol_funcionalidad`
--
ALTER TABLE `rol_funcionalidad`
  ADD CONSTRAINT `rol_funcionalidad_ibfk_1` FOREIGN KEY (`ROL`) REFERENCES `rol` (`Id`),
  ADD CONSTRAINT `rol_funcionalidad_ibfk_2` FOREIGN KEY (`FUNCIONALIDAD`) REFERENCES `funcionalidades` (`Id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ROL`) REFERENCES `rol` (`Id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`PERSONA`) REFERENCES `persona` (`Num_Documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
