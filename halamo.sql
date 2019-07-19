-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2019 a las 19:05:12
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
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionalidades`
--

INSERT INTO `funcionalidades` (`Id`, `Nombre`, `Descripcion`) VALUES
(1, 'Gestión Personas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'Gestión Reservas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'Gestión Habitaciones', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'Gestión Usuarios', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'Gestion Reportes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(6, 'Gestión Rol', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(7, 'Configuración', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(8, 'Administrador de Acceso', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `Codigo` bigint(20) NOT NULL,
  `Estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Num_Habitacion` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `TIPO_HABITACION` bigint(20) NOT NULL,
  `Imagen` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'Administrador', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'Recepcionista', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'Cliente', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_funcionalidad`
--

CREATE TABLE `rol_funcionalidad` (
  `ROL` bigint(20) NOT NULL,
  `FUNCIONALIDAD` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `Id_tc` bigint(20) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitación`
--

CREATE TABLE `tipo_habitación` (
  `Id_th` bigint(20) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Indices de la tabla `tipo_habitación`
--
ALTER TABLE `tipo_habitación`
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
  MODIFY `Codigo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Id_tc` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_descuento`
--
ALTER TABLE `tipo_descuento`
  MODIFY `Id_tdes` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `Id_tp` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_habitación`
--
ALTER TABLE `tipo_habitación`
  MODIFY `Id_th` bigint(20) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`TIPO_HABITACION`) REFERENCES `tipo_habitación` (`Id_th`);

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
