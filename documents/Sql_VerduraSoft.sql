-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2019 a las 06:27:46
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5


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
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cc` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `cc`, `foto`, `nombre`, `apellido`, `email`, `password`, `telefono`, `estado`) VALUES
(1, '1093225188', 'img/avatar/defecto/defecto.png', 'David Fernando', 'Torres Zapata (ADMIN)', 'fernando.zapata.live@gmail.com', '$2y$12$hTqhz5Yjd8YiLQgb7.BBsev1FKy7.v8seO.uY0J7No/.tFQqVb5uS', '3107148905', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `admins_id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` text COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` float NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


--
-- Volcado de datos para la tabla `productos`

INSERT INTO `productos` (`id`, `admins_id`, `codigo`, `foto`, `nombre`, `descripcion`, `cantidad`, `valor`, `estado`) VALUES
(NULL, 1, '1000', 'img/productos/1520584585aguacate.jpg', 'Aguacate', 'Fruto verde, originario de MÃ©xico', 781, 5500, 'inactivo'),
(NULL, 1, '1001', 'img/productos/258985095aji.jpg', 'Aji Picante', 'Fruto rojo, picante', 86, 4200, 'inactivo'),
(NULL, 1, '1002', 'img/productos/1480250413ajo.jpg', 'Ajo', 'AliÃ±o, saborizante natural ', 130, 6300, 'activo'),
(NULL, 1, '1003', 'img/productos/549756478banano.jpg', 'Banano', 'Fruto blando, con alta cantidad de potasio ', 0, 2700, 'inactivo'),
(NULL, 1, '1004', 'img/productos/1355980226berenjena.jpg', 'Berenjena', 'Verdura amarga para guisados.', 69, 8900, 'activo'),
(NULL, 1, '1005', 'img/productos/249536916broccoli.jpg', 'Boccoli', 'Verdura con vitamina K para saltear', 198, 4100, 'activo'),
(NULL, 1, '1006', 'img/productos/695916210cebolla.jpg', 'Cebolla Blanca', 'Verdura para guisados. ', 799, 1900, 'activo'),
(NULL, 1, '1007', 'img/productos/1761138033cebolla-larga.gif', 'Cebolla Larga', 'AliÃ±o para guisados.', 598, 1500, 'activo'),
(NULL, 1, '1008', 'img/productos/2100473979cilantro.jpg', 'Cilantro', 'AliÃ±o, saborizante y aromatizaste natural ', 508, 1000, 'activo'),
(NULL, 1, '1009', 'img/productos/1411513505coliflor.jpg', 'Coliflor', 'Verdura con vitamina K para saltear', 95, 7300, 'activo'),
(NULL, 1, '1010', 'img/productos/1417940387lechuga.jpg', 'Lechuga', 'Legumbre fresca para ensalada. ', 32, 3500, 'activo'),
(NULL, 1, '1011', 'img/productos/1236723240limon.jpeg', 'Limon', 'Fruto Ã¡cido.', 300, 3200, 'activo'),
(NULL, 1, '1012', 'img/productos/89982848mango.jpg', 'Mango', 'Fruto dulce para jugo. ', 45, 7400, 'activo'),
(NULL, 1, '1013', 'img/productos/176234408manzana.jpg', 'Manzana', 'Fruto dulce.', 180, 4100, 'activo'),
(NULL, 1, '1014', 'img/productos/720499335maracuya.jpg', 'Maracuya', 'Fruto Ã¡cido para jugo', 219, 6000, 'activo'),
(NULL, 1, '1015', 'img/productos/414723338papa-criolla.jpg', 'Papa Criolla', 'Legumbre para sopa y frituras ', 219, 2300, 'activo'),
(NULL, 1, '1016', 'img/productos/defecto/defecto.jpg', 'Mix de verduras ', 'Verduras bÃ¡sicas para guisado Colombiano.', 78, 15000, 'activo'),
(NULL, 1, '1017', 'img/productos/2145624697papa-pastusa.jpg', 'Papa Pastusa', 'Papa con alta cantidad de almidÃ³n ', 349, 3100, 'activo'),
(NULL, 1, '1018', 'img/productos/1845861536pepino.jpg', 'Pepino', 'Verdura fresca para ensaladas ', 99, 4800, 'activo'),
(NULL, 1, '1019', 'img/productos/1904258130pimenton.jpg', 'PimentÃ³n ', 'Verdura para guisados. ', 260, 4500, 'activo'),
(NULL, 1, '1020', 'img/productos/1299784853platano-maduro.jpg', 'Platano Maduro', 'Platano dulce para fritura ', 400, 3400, 'activo'),
(NULL, 1, '1021', 'img/productos/159002475platano-verde.jpg', 'Platano Verde', 'Fruta para guisados colombianos  ', 430, 4800, 'activo'),
(NULL, 1, '1022', 'img/productos/2044833404repollo.jpg', 'Repollo', 'Legumbre fresca para ensalada. ', 109, 3800, 'activo'),
(NULL, 1, '1023', 'img/productos/990950002tomate.jpg', 'Tomate', 'Fruto para guisados ', 850, 2300, 'activo'),
(NULL, 1, '1024', 'img/productos/1342519919zanahoria.jpg', 'Zanahoria', 'Legumbre fresca para ensalada. ', 350, 3800, 'activo');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cc` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cc`, `nombre`, `apellido`, `email`, `password`, `direccion`, `telefono`, `estado`) VALUES
(1, '1093225188', 'David', 'Zapata (USUARIO)', 'dftorres88@misena.edu.co', '$2y$12$2SXUCRdBn4wJcmz6Jnbyc.HlLe2F2R0PYOllGFg/lfCEBVl/efHvC', 'Calle 24 # 15-59 - Santa Rosa de Cabal - Risaralda', '3107148905', 'activo');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `factura` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` float NOT NULL,
  `estado` enum('activo','espera','inactivo') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'espera',
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


ALTER TABLE `admins`
  ADD UNIQUE KEY `correo_UNIQUE` (`email`),
  ADD UNIQUE KEY `cc_UNIQUE` (`cc`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD KEY `fk_compras_productos_idx` (`productos_id`),
  ADD KEY `fk_compras_usuarios_idx` (`usuarios_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD KEY `fk_productos_admins_idx` (`admins_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `correo_UNIQUE` (`email`),
  ADD UNIQUE KEY `cc_nit_UNIQUE` (`cc`);



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
