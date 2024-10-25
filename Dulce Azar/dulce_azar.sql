-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-10-2024 a las 15:57:30
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dulce_azar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sesion_juego` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `id_usuario`, `nombre`, `sesion_juego`) VALUES
(114, 3, 'Local/Visitante', '2024-10-12 20:51:41'),
(115, 3, 'manchita', '2024-10-12 20:53:36'),
(116, 3, 'manchita', '2024-10-12 20:55:05'),
(117, 3, 'manchita', '2024-10-12 20:56:52'),
(118, 3, 'Local/Visitante', '2024-10-12 20:58:26'),
(119, 3, 'manchita', '2024-10-15 12:30:20'),
(120, 3, 'Local/Visitante', '2024-10-15 12:33:24'),
(121, 3, 'Local/Visitante', '2024-10-15 12:47:50'),
(122, 3, 'Local/Visitante', '2024-10-15 12:48:22'),
(123, 3, 'Local/Visitante', '2024-10-15 13:07:35'),
(124, 3, 'manchita', '2024-10-15 13:11:02'),
(125, 3, 'Local/Visitante', '2024-10-15 13:12:37'),
(126, 3, 'Local/Visitante', '2024-10-15 14:20:09'),
(127, 3, 'manchita', '2024-10-18 12:31:29'),
(128, 3, 'manchita', '2024-10-18 12:43:45'),
(129, 3, 'manchita', '2024-10-18 13:04:00'),
(130, 3, 'manchita', '2024-10-18 13:07:57'),
(131, 3, 'manchita', '2024-10-18 13:09:07'),
(132, 3, 'manchita', '2024-10-18 13:25:56'),
(133, 3, 'Local/Visitante', '2024-10-18 13:26:59'),
(134, 3, 'manchita', '2024-10-21 17:54:44'),
(135, 3, 'Local/Visitante', '2024-10-21 18:11:02'),
(136, 3, 'Local/Visitante', '2024-10-21 18:19:24'),
(137, 3, 'manchita', '2024-10-25 01:37:07'),
(138, 3, 'Local/Visitante', '2024-10-25 01:37:26'),
(139, 3, 'Local/Visitante', '2024-10-25 01:49:24'),
(140, 3, 'manchita', '2024-10-25 01:49:53'),
(141, 3, 'Local/Visitante', '2024-10-25 02:06:18'),
(142, 3, 'manchita', '2024-10-25 02:06:27'),
(143, 3, 'manchita', '2024-10-25 02:08:22'),
(144, 3, 'manchita', '2024-10-25 02:10:15'),
(145, 3, 'manchita', '2024-10-25 02:11:01'),
(146, 3, 'Local/Visitante', '2024-10-25 02:11:28'),
(147, 3, 'Local/Visitante', '2024-10-25 02:17:54'),
(148, 3, 'manchita', '2024-10-25 02:19:01'),
(149, 3, 'Local/Visitante', '2024-10-25 02:34:27'),
(150, 3, 'manchita', '2024-10-25 02:50:33'),
(151, 3, 'Local/Visitante', '2024-10-25 03:00:32'),
(152, 3, 'manchita', '2024-10-25 03:45:11'),
(153, 3, 'Local/Visitante', '2024-10-25 11:03:41'),
(154, 3, 'manchita', '2024-10-25 11:03:48'),
(155, 3, 'manchita', '2024-10-25 11:12:45'),
(156, 3, 'Local/Visitante', '2024-10-25 11:13:32'),
(157, 3, 'Local/Visitante', '2024-10-25 11:16:32'),
(158, 24, 'manchita', '2024-10-25 13:19:30'),
(159, 24, 'Local/Visitante', '2024-10-25 13:20:34'),
(160, 3, 'manchita', '2024-10-25 15:50:14'),
(161, 3, 'Local/Visitante', '2024-10-25 15:50:18'),
(162, 3, 'manchita', '2024-10-25 15:53:03'),
(163, 3, 'Local/Visitante', '2024-10-25 15:53:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local_visitante`
--

CREATE TABLE `local_visitante` (
  `id` int NOT NULL,
  `usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `caramelos` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `local_visitante`
--

INSERT INTO `local_visitante` (`id`, `usuario`, `caramelos`) VALUES
(1, 'ser', 95000),
(2, 'Pipolanga', 7000),
(3, 'Pablo', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manchita`
--

CREATE TABLE `manchita` (
  `id` int NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `caramelos` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `manchita`
--

INSERT INTO `manchita` (`id`, `usuario`, `caramelos`) VALUES
(3, 'ser', 8000),
(4, 'Pipolanga', 0),
(5, 'nuevo123', 3000),
(6, 'Pablo', 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id` int NOT NULL,
  `caramelos` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `email`, `id`, `caramelos`) VALUES
('ser', '$2y$10$00eQPSvK0McrDzZJ0nssnePk1UmeKmFBlkYw4BY2i3HZjIiGw0WZG', 'ser@gmail.com', 3, 0),
('Pipolanga', '$2y$10$02k/NFFS4R9XrGk19bF7t.PUzYILAzYolbCDV0ls4kQvIOR2phjDe', 'tosabe@gmail.com', 20, 0),
('nuevo123', '$2y$10$e4CQ6ko2DD4/KM8ASGV3T.FWR8za9aM8iUFdey4bGh1B8Z.fjni.K', 'hola@gmail.com', 21, 1000),
('tosabe123', '$2y$10$qiigKU2k9kXEFEerq/SzG.JdmbhjOxNZKEknQ.YTMpxfja27txLIK', 'tomi.palumbo07@gmail.com', 22, 1000),
('ClarfrecitoHD', '$2y$10$s1qbozmuLKzqpzN0gpJdReBmzcix3j0h/2EcP.16Eys/kTy1OKrc.', 'juanifreire06@gmail.com', 23, 1000),
('Pablo', '$2y$10$xyiiOlh7KW.mE6ayRtsei.o4IstgU0SPJ8zC6XR27E1AE2ATJON9y', 'pablo@gmail.com', 24, 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`id_usuario`);

--
-- Indices de la tabla `local_visitante`
--
ALTER TABLE `local_visitante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `manchita`
--
ALTER TABLE `manchita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `local_visitante`
--
ALTER TABLE `local_visitante`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `manchita`
--
ALTER TABLE `manchita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
