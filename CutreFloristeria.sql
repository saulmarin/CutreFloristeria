-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2016 a las 10:31:40
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `floristeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `contenido`, `precio`) VALUES
(1, 'Te quiero', '6.00'),
(2, 'Lo siento', '3.00'),
(3, 'Feliz cumpleaños', '3.00'),
(4, 'Enhorabuena', '6.00'),
(999, 'Personalizado', '15.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cabeceras`
--

CREATE TABLE `pedido_cabeceras` (
  `id` int(11) NOT NULL,
  `fac_nombre` varchar(50) NOT NULL,
  `fac_apellidos` varchar(100) NOT NULL,
  `fac_direccion` varchar(200) NOT NULL,
  `fac_ciudad` varchar(50) NOT NULL,
  `fac_cp` varchar(5) NOT NULL,
  `fac_provincia` varchar(50) NOT NULL,
  `fac_telefono` varchar(10) NOT NULL,
  `fac_correo` varchar(100) NOT NULL,
  `fecha_fac` date NOT NULL,
  `fecha_envio` date NOT NULL,
  `tarjeta_tipo` varchar(50) NOT NULL,
  `tarjeta_num` varchar(12) NOT NULL,
  `tarjeta_mes` int(11) NOT NULL,
  `tarjeta_ano` int(11) NOT NULL,
  `tarjeta_ccv` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido_cabeceras`
--

INSERT INTO `pedido_cabeceras` (`id`, `fac_nombre`, `fac_apellidos`, `fac_direccion`, `fac_ciudad`, `fac_cp`, `fac_provincia`, `fac_telefono`, `fac_correo`, `fecha_fac`, `fecha_envio`, `tarjeta_tipo`, `tarjeta_num`, `tarjeta_mes`, `tarjeta_ano`, `tarjeta_ccv`, `id_usuario`) VALUES
(31, 'Francisco', 'Martín', 'Calle Falsa 123', 'Torremolinos', '25000', 'malaga', '111111111', 'francisco.martin@gmail.com', '2016-12-18', '2017-07-10', 'mastercard', '111111111', 10, 2026, 111, 6),
(32, 'María', 'Gonzalez', 'Calle  Ortega Gasset 9', 'Almeria', '24000', 'almeria', '222222222', 'maria.gonzalez@gmail.com', '2016-12-18', '2017-10-05', 'american_express', '222222222', 9, 2026, 222, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_envios`
--

CREATE TABLE `pedido_envios` (
  `id` int(11) NOT NULL,
  `env_nombre` varchar(50) NOT NULL DEFAULT '',
  `env_apellidos` varchar(100) NOT NULL DEFAULT '',
  `env_direccion` varchar(200) NOT NULL DEFAULT '',
  `env_ciudad` varchar(100) NOT NULL DEFAULT '',
  `env_cp` varchar(5) NOT NULL DEFAULT '',
  `env_provincia` varchar(50) NOT NULL DEFAULT '',
  `env_telefono` varchar(10) NOT NULL DEFAULT '',
  `env_correo` varchar(100) NOT NULL DEFAULT '',
  `id_cabecera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido_envios`
--

INSERT INTO `pedido_envios` (`id`, `env_nombre`, `env_apellidos`, `env_direccion`, `env_ciudad`, `env_cp`, `env_provincia`, `env_telefono`, `env_correo`, `id_cabecera`) VALUES
(20, 'Jose', 'Ventura', 'Avenida de los Guindos 5', 'Malaga', '44444', 'malaga', '222222223', 'ventura@gmail.com', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_lineas`
--

CREATE TABLE `pedido_lineas` (
  `id` int(11) NOT NULL,
  `id_mensaje` int(11) DEFAULT NULL,
  `personalizado` varchar(255) DEFAULT NULL,
  `id_articulo` int(11) DEFAULT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido_lineas`
--

INSERT INTO `pedido_lineas` (`id`, `id_mensaje`, `personalizado`, `id_articulo`, `id_pedido`) VALUES
(19, 2, NULL, NULL, 31),
(20, 999, 'Hola que ase', NULL, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL DEFAULT '',
  `correo` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `apellidos` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `correo`, `password`, `nombre`, `apellidos`) VALUES
(1, 'pepita', 'prueba1@gmail.com', 'pepita', 'Pepita', 'Perales'),
(4, 'admin', 'admin@admin', 'admin', 'admin', 'admin'),
(5, 'joselito', 'jose@jose.com', 'ventura', 'Jose', 'Ventura'),
(6, 'pacom', 'francisco.martin@gmail.com', 'pacom', 'Francisco', 'Martín'),
(7, 'mariag', 'maria.gonzalez@gmail.com', 'mariag', 'Maria', 'Gonzalez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido_cabeceras`
--
ALTER TABLE `pedido_cabeceras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedido_envios`
--
ALTER TABLE `pedido_envios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cabecera` (`id_cabecera`);

--
-- Indices de la tabla `pedido_lineas`
--
ALTER TABLE `pedido_lineas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
--
-- AUTO_INCREMENT de la tabla `pedido_cabeceras`
--
ALTER TABLE `pedido_cabeceras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `pedido_envios`
--
ALTER TABLE `pedido_envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `pedido_lineas`
--
ALTER TABLE `pedido_lineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
