-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 15:43:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dulceria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_productos`
--

CREATE TABLE `t_productos` (
  `imagen` text NOT NULL,
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_productos`
--

INSERT INTO `t_productos` (`imagen`, `id_producto`, `descripcion`, `precio`, `cantidad`) VALUES
('https://supermode.com.mx/cdn/shop/products/100001476_5fd60ca6-75b8-4ebe-a5fe-20fae6c6c865.jpg?v=1698798007', 55, 'Pulparindo', 25, 6),
('https://dulcesdelarosa.com.mx/wp-content/uploads/dulces-de-la-rosa_mazapan_mazapan-12-28g.png', 56, 'mazapan', 58, 2),
('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhrpo27TzW6ECmKvn-G0JpG9D2BNXPrWQDZw&s', 57, 'Dulce de Chocolate  Vaquita ', 53, 13),
('https://i5.walmartimages.com.mx/gr/images/product-images/img_large/00072518103501L1.jpg?odnHeight=612&odnWidth=612&odnBg=FFFFFF', 58, 'Dulce Lucas Gusano', 56, 6),
('https://lamimigb.com/cdn/shop/files/4410_1000x.jpg?v=1706289009', 60, 'Tupsipop', 56, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `nombre`, `apellido`, `rol`, `usuario`, `password`) VALUES
(25, 'elisa', 'guzman', 'Usuario', 'eli123@gmail.com', '$2y$10$JFBXK5U.ONqmIWwa8RpVBegXwJJeJZNNGtOYYw.Ju11H2J8KexAcG'),
(26, 'andy', 'mtz', 'Administrador', 'andy291@gmail.com', '$2y$10$jIjlZ7V6Gq3sOjxkFHAs1u4W5lTuNkid34uO4qOU8JigDJr5idfpq'),
(30, 'mau', 'palma', 'Usuario', 'mau12@gmail.com', '$2y$10$CX33Vpd60k.IDeqtXAcA7uJ4JD3wXTj/vdLuMK0vGwxgiDHwxOIlu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_productos`
--
ALTER TABLE `t_productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_productos`
--
ALTER TABLE `t_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
