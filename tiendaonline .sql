-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2023 a las 18:56:00
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_us` int(11) DEFAULT NULL,
  `cod_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_us`, `cod_admin`) VALUES
(11, 'asd'),
(13, 'fsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(4, 'rock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_us` int(11) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `genero` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `tipo_ident` enum('DNI','NIF','Pasaporte','nº SS') DEFAULT NULL,
  `identificador` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_us`, `apellidos`, `genero`, `fecha_nac`, `telefono`, `email`, `direccion`, `tipo_ident`, `identificador`) VALUES
(12, 'Martinez', 'Masculino', '2023-03-05', 'hhgfddhf', 'sdfs@ajsd.com', 'dasdas', 'DNI', 'dasdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_us` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `estado` enum('Incompleto','Solicitado','Preparación','En transporte','Entregado','Rechazado','Cancelado') DEFAULT NULL,
  `productos` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `id_us`, `fecha`, `precio`, `estado`, `productos`) VALUES
(3, 2, '2023-03-05', 69, 'Preparación', '3-fs'),
(4, 12, '2023-03-13', 60, 'Solicitado', '3-AHfskl'),
(6, 12, '2023-03-13', 400, 'Solicitado', '10-a/5-c'),
(7, 12, '2023-03-13', 320, 'Solicitado', '10-b'),
(8, 12, '2023-03-13', 0, 'Incompleto', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `categoria` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `unidades` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `categoria`, `unidades`) VALUES
(2, 'AHfskl', 20, 'rock', 12),
(4, 'AHfskl', 20, 'rock', 15),
(5, 'a', 23, 'rock', 13),
(6, 'b', 32, 'rock', 10),
(7, 'c', 34, 'rock', 18),
(8, 'fs', 23, 'rock', 23),
(9, 'asd', 34, 'jazz/pop', 20),
(10, 'asd', 34, 'jazz/pop', 20),
(11, 'asd', 34, 'jazz/pop', 20),
(12, 'asd', 34, 'jazz/pop', 20),
(13, 'asd', 34, 'jazz/pop', 20),
(14, 'asd', 34, 'jazz/pop', 20),
(15, 'asd', 34, 'jazz/pop', 20),
(16, 'asd', 34, 'jazz/pop', 20),
(17, 'asd', 34, 'jazz/pop', 20),
(18, 'asd', 34, 'jazz/pop', 20),
(19, 'asd', 34, 'jazz/pop', 20),
(20, 'asd', 34, 'jazz/pop', 20),
(21, 'asd', 34, 'jazz/pop', 20),
(22, 'asd', 34, 'jazz/pop', 20),
(23, 'asd', 34, 'jazz/pop', 20),
(24, 'asd', 34, 'jazz/pop', 20),
(25, 'asd', 34, 'jazz/pop', 20),
(26, 'asd', 34, 'jazz/pop', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `contra` varchar(100) DEFAULT NULL,
  `tipo` enum('administrador','cliente') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contra`, `tipo`) VALUES
(11, 'fs', 'asd', 'administrador'),
(12, 'Pepe', 'asd', 'cliente'),
(13, 'rock', 'asd', 'administrador');

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
