-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2019 a las 01:55:39
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0
CREATE DATABASE IF NOT EXISTS `verdurasoft`;
USE `verdurasoft`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `verdurasoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `foto`, `nombre`, `apellido`, `email`, `password`, `telefono`, `estado`) VALUES
(1093225188, '/img/avatar/david.jpg', 'David Fernando', 'Torres Zapata', 'fernando.zapata.live@gmail.com', '$2y$12$Y3JV8wr7j4X7xfkxrmNPCuuBACHPO4t0jOxRJ3LsvyxinaxENFwKW', '3107148905', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `factura` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` float NOT NULL,
  `estado` enum('activo','espera','inactivo') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'espera'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `usuarios_id`, `productos_id`, `factura`, `cantidad`, `valor`, `estado`) VALUES
(12, 4, 10002, '6502777524', 2, 8400, 'espera'),
(13, 4, 10003, '6502777524', 3, 18900, 'espera'),
(14, 4, 10006, '6502777524', 2, 8200, 'espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `admins_id` int(11) NOT NULL,
  `foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` float NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `admins_id`, `foto`, `nombre`, `descripcion`, `cantidad`, `valor`, `estado`) VALUES
(10001, 1093225188, 'img/productos/1520584585aguacate.jpg', 'Aguacate', 'Fruto verde, originario de MÃ©xico', 800, 5500, 'activo'),
(10002, 1093225188, 'img/productos/258985095aji.jpg', 'AjÃ­ Picante', 'Fruto rojo, picante', 98, 4200, 'activo'),
(10003, 1093225188, 'img/productos/1307257988ajo.jpg', 'Ajo', 'AliÃ±o, saborizante natural ', 147, 6300, 'activo'),
(10004, 1093225188, 'img/productos/549756478banano.jpg', 'Banano', 'Fruto blando, con alta cantidad de potasio ', 50, 2700, 'activo'),
(10005, 1093225188, 'img/productos/1355980226berenjena.jpg', 'Berenjena', 'Verdura amarga para guisados.', 80, 8900, 'activo'),
(10006, 1093225188, 'img/productos/249536916broccoli.jpg', 'Boccoli', 'Verdura con vitamina K para saltear', 198, 4100, 'activo'),
(10007, 1093225188, 'img/productos/695916210cebolla.jpg', 'Cebolla Blanca', 'Verdura para guisados. ', 800, 1900, 'activo'),
(10008, 1093225188, 'img/productos/1761138033cebolla-larga.gif', 'Cebolla Larga', 'AliÃ±o para guisados.', 600, 1500, 'activo'),
(10009, 1093225188, 'img/productos/2100473979cilantro.jpg', 'Cilantro', 'AliÃ±o, saborizante y aromatizaste natural ', 510, 1000, 'activo'),
(10010, 1093225188, 'img/productos/1411513505coliflor.jpg', 'Coliflor', 'Verdura con vitamina K para saltear', 95, 7300, 'activo'),
(10011, 1093225188, 'img/productos/1417940387lechuga.jpg', 'Lechuga', 'Legumbre fresca para ensalada. ', 32, 3500, 'activo'),
(10012, 1093225188, 'img/productos/1236723240limon.jpeg', 'Limon', 'Fruto Ã¡cido.', 300, 3200, 'activo'),
(10013, 1093225188, 'img/productos/89982848mango.jpg', 'Mango', 'Fruto dulce para jugo. ', 45, 7400, 'activo'),
(10014, 1093225188, 'img/productos/176234408manzana.jpg', 'Manzana', 'Fruto dulce.', 180, 4100, 'activo'),
(10015, 1093225188, 'img/productos/720499335maracuya.jpg', 'Maracuya', 'Fruto Ã¡cido para jugo', 220, 6000, 'activo'),
(10016, 1093225188, 'img/productos/414723338papa-criolla.jpg', 'Papa Criolla', 'Legumbre para sopa y frituras ', 220, 2300, 'activo'),
(10017, 1093225188, 'img/productos/defecto.jpg', 'Mix de verduras ', 'Verduras bÃ¡sicas para guisado Colombiano.', 78, 15000, 'activo'),
(10018, 1093225188, 'img/productos/2145624697papa-pastusa.jpg', 'Papa Pastusa', 'Papa con alta cantidad de almidÃ³n ', 350, 3100, 'activo'),
(10019, 1093225188, 'img/productos/1845861536pepino.jpg', 'Pepino', 'Verdura fresca para ensaladas ', 110, 4800, 'activo'),
(10020, 1093225188, 'img/productos/1904258130pimenton.jpg', 'PimentÃ³n ', 'Verdura para guisados. ', 260, 4500, 'activo'),
(10021, 1093225188, 'img/productos/1299784853platano-maduro.jpg', 'PlÃ¡tano Maduro', 'PlÃ¡tano dulce para fritura ', 400, 3400, 'activo'),
(10022, 1093225188, 'img/productos/159002475platano-verde.jpg', 'PlÃ¡tano Verde', 'Fruta para guisados colombianos  ', 430, 4800, 'activo'),
(10023, 1093225188, 'img/productos/2044833404repollo.jpg', 'Repollo', 'Legumbre fresca para ensalada. ', 110, 3800, 'activo'),
(10024, 1093225188, 'img/productos/990950002tomate.jpg', 'Tomate', 'Fruto para guisados ', 850, 2300, 'activo'),
(10025, 1093225188, 'img/productos/1342519919zanahoria.jpg', 'Zanahoria', 'Legumbre fresca para ensalada. ', 350, 3800, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `direccion`, `telefono`, `estado`) VALUES
(4, 'David Fernando', 'Zapata Torres', 'fernando.zapata.live@gmail.com', '$2y$12$nELaIes5yMMUOwnMsO8A/e62uU6R4m7OTUjALf2DO/MQ/6.0maFEy', 'carrera 14 - 5.6', '3107148905', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_UNIQUE` (`email`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compras_productos_idx` (`productos_id`),
  ADD KEY `fk_compras_usuarios_idx` (`usuarios_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_productos_admins_idx` (`admins_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_productos` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compras_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_admins` FOREIGN KEY (`admins_id`) REFERENCES `admins` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
