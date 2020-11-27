-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2020 a las 22:07:02
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_venta_tec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Notebook', 'pc\'s portatiles'),
(3, 'Celular', 'smartphones de consumo masivo'),
(4, 'Led', 'Televisores Led'),
(22, 'Tablet', 'Tabletas portatiles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `puntaje` int(1) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `comentario`, `puntaje`, `id_producto`, `id_usuario`) VALUES
(1, 'Muy buen producto, recomendable', 3, 3, 1),
(3, 'malaso', 2, 9, 1),
(4, 'malaso', 2, 9, 1),
(7, 'amor', 4, 28, 1),
(10, '234', 5, 3, 1),
(11, 'Muy bueno', 4, 27, 4),
(13, 'chango', 1, 27, 4),
(14, '11111', 1, 28, 4),
(15, 'il cuatto', 3, 28, 4),
(16, 'Una masa', 5, 12, 1),
(17, 'five', 5, 12, 1),
(18, 'Wazaaaaaaaa prueba API', 5, 28, 4),
(19, 'Segunda prueba API !', 3, 28, 4),
(21, 'Tercera prueba API !', 3, 28, 4),
(22, 'joya', 4, 28, 1),
(23, 'Esto explota !', 4, 28, 1),
(24, 'maleeeeesemoooo', 1, 28, 1),
(25, '444444444444444444', 4, 28, 1),
(26, '2swssssa', 2, 28, 4),
(28, 'Mega prueba API !', 3, 28, 4),
(31, 'Pesimo', 1, 28, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `oferta` tinyint(1) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `oferta`, `id_categoria`, `imagen`) VALUES
(3, 'Lenovo Smart 15\'', 'Notebook deluxe', 121000, 0, 1, NULL),
(9, 'HP Pavilion g55', 'Linea Office de HP', 102000, 0, 1, NULL),
(12, 'Iphone 10', 'Apple Iphone modelo 2019', 87500, 0, 3, NULL),
(13, 'Samsung T8', 'Triple camara de 68 mpx', 124570, 0, 3, NULL),
(23, 'Dell Inspiron', 'Toda una inspiracion', 145720, 0, 1, NULL),
(27, 'LG 50\'', 'Modelo para fanas del cine', 45200, 1, 4, NULL),
(28, 'I Phone x', 'Careli', 1244560, 1, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `admin`) VALUES
(1, 'admin@newtech.com.ar', '$2y$12$hw15ntd.6PkFUUnV9enBvOMuGQPYxcJS8BuAx4m/oIPwstIfBYFpe', 1),
(2, 'guest@newtech.com.ar', '$2y$12$SQUqevnbu5Jb6IkXNPIjD.h0pQvl/kRcElnTevqxRm2lE7mfR3Wd6', 0),
(4, 'juanmolfese@hotmail.com', '$2y$10$zUrNGeR3YzptG88EfoVPhujaEx0JmaZbEUDJy3VHA1KFtIvqRDKni', 1),
(5, 'molfesemariapaz@gmail.com', '$2y$10$S.BsLDxMOKyJDy12TQ2vSe9rOXkl1A31G4y9tTo9ia.J6QxabvmEK', 0),
(6, 'fede@gmail.com', '$2y$10$VfYd3eqEEjlb2sv2wPkJxOvB8KATJjn42vvM.o2BSVEQ2oTWZg0fu', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
