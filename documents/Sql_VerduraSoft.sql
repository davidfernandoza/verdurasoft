-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2019 a las 03:01:30
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0
CREATE DATABASE IF NOT EXISTS `verdurasoft`;
use `verdurasoft`;

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
(85694, 'img/avatar/32294109615631.png', 'juan', 'amado', 'google@live.com', '$2y$12$1HWfLoAkuQJQ0XLC0jT56uHpArwehNaxxtl6AKFKTWGhkvLJMxex.', '321542832', 'activo'),
(12234333, 'img/avatar/defecto.png', 'David Fernando', 'Zapata', 'fernando.zapEata.liv4e@gmail.com', '$2y$12$zAjTF7SysJ8tnn46idoNe.V/.bha7I0ht8Z4Kv2rYjFuLS63KTETq', '3107148905', 'activo'),
(43558116, 'img/avatar/1266805614backend.png', 'Luz Estrella ', 'Zapata Toro', 'luzestrella@hotmail.co', '$2y$12$yXAYFrHfBlMnmHJuKbVnkefbUtPhyMxoMOE.sLjL/60hQwWmVdxmm', '3216359778', 'inactivo'),
(1093225188, 'img/avatar/802886416min.jpg', 'David Fernando', 'Zapata', 'fernando.zapata.live@gmail.com', '$2y$12$Y3JV8wr7j4X7xfkxrmNPCuuBACHPO4t0jOxRJ3LsvyxinaxENFwKW', '3107148905', 'activo'),
(2147483647, 'img/avatar/defecto.png', 'David Fernando', 'Zapata', 'fernando.zapata.liv4e@gmail.com', '$2y$12$icU5wT3v4alu8qVhgLMTuuPzKALjpzFDvtMCci2mrIObft9mY3c72', '3107148905', 'activo');

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
(4, 2, 123, '5415049732', 10, 20000, ''),
(5, 2, 12928, '1673943062', 7, 24500, ''),
(6, 2, 3743893, '1673943062', 8, 800, ''),
(7, 2, 123, '13487763602', 7, 14000, ''),
(8, 2, 3743893, '13487763602', 1, 100, ''),
(9, 2, 123, '10811371832', 4, 8000, ''),
(10, 2, 123, '2127691752', 9, 18000, '');

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
(123, 12234333, 'img/productos/mora.jpg', 'mora', 'es una fruta deliciosa', 0, 2000, 'activo'),
(12928, 12234333, 'img/productos/maracuya.jpg', 'maracuya', 'es una fruta acida', 31, 3500, 'activo'),
(3743893, 2147483647, 'img/productos/banano.png', 'banano', 'es un platano', 40, 100, 'activo');

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
(2, 'David Fernando', 'Zapata', 'fernando.zapata.live@gmail.com', '$2y$12$YO5IaNpbpBnh6fcDwEpOy.EYaCTN34a8g8dXMWkxoZE2KIdvY/MqO', 'carrera', '3107148905', 'activo');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
