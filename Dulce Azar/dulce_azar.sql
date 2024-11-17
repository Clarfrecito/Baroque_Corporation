-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-11-2024 a las 20:51:43
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
(163, 3, 'Local/Visitante', '2024-10-25 15:53:07'),
(164, 3, 'Local/Visitante', '2024-11-01 12:03:24'),
(165, 3, 'manchita', '2024-11-01 12:03:42'),
(166, 3, 'Local/Visitante', '2024-11-01 12:05:09'),
(167, 3, 'Local/Visitante', '2024-11-01 12:09:27'),
(168, 3, 'manchita', '2024-11-01 12:09:44'),
(169, 3, 'Local/Visitante', '2024-11-01 12:28:23'),
(170, 3, 'manchita', '2024-11-01 12:34:24'),
(171, 3, 'manchita', '2024-11-01 13:10:05'),
(172, 3, 'manchita', '2024-11-01 13:10:29'),
(173, 3, 'manchita', '2024-11-01 13:11:41'),
(174, 3, 'Local/Visitante', '2024-11-01 13:18:57'),
(175, 3, 'Local/Visitante', '2024-11-01 13:34:55'),
(176, 3, 'manchita', '2024-11-01 14:06:38'),
(177, 3, 'manchita', '2024-11-01 14:20:03'),
(178, 3, 'Local/Visitante', '2024-11-01 14:20:22'),
(179, 3, 'manchita', '2024-11-01 16:05:47'),
(180, 3, 'manchita', '2024-11-01 16:05:50'),
(181, 3, 'Local/Visitante', '2024-11-01 16:06:10'),
(182, 3, 'Local/Visitante', '2024-11-01 16:13:05'),
(183, 3, 'manchita', '2024-11-01 16:17:36'),
(184, 3, 'manchita', '2024-11-01 16:17:53'),
(185, 3, 'Local/Visitante', '2024-11-01 16:17:55'),
(186, 3, 'manchita', '2024-11-01 16:17:56'),
(187, 3, 'Local/Visitante', '2024-11-01 16:17:58'),
(188, 3, 'manchita', '2024-11-01 16:17:59'),
(189, 3, 'Local/Visitante', '2024-11-01 16:20:58'),
(190, 3, 'Local/Visitante', '2024-11-01 16:24:04'),
(191, 3, 'manchita', '2024-11-01 16:24:06'),
(192, 3, 'manchita', '2024-11-01 16:25:22'),
(193, 3, 'manchita', '2024-11-01 16:26:17'),
(194, 3, 'Local/Visitante', '2024-11-01 16:26:22'),
(195, 3, 'manchita', '2024-11-01 16:26:23'),
(196, 3, 'Local/Visitante', '2024-11-01 16:26:45'),
(197, 3, 'manchita', '2024-11-01 16:27:34'),
(198, 3, 'Local/Visitante', '2024-11-01 16:27:35'),
(199, 3, 'manchita', '2024-11-01 16:27:37'),
(200, 3, 'manchita', '2024-11-01 16:27:49'),
(201, 3, 'Local/Visitante', '2024-11-01 16:28:06'),
(202, 3, 'manchita', '2024-11-01 16:28:08'),
(203, 3, 'Local/Visitante', '2024-11-01 16:28:11'),
(204, 3, 'manchita', '2024-11-01 16:28:12'),
(205, 3, 'Local/Visitante', '2024-11-01 16:28:16'),
(206, 3, 'manchita', '2024-11-01 16:28:45'),
(207, 3, 'Local/Visitante', '2024-11-01 16:29:23'),
(208, 3, 'manchita', '2024-11-01 16:29:24'),
(209, 3, 'Local/Visitante', '2024-11-01 16:30:46'),
(210, 3, 'manchita', '2024-11-01 16:30:53'),
(211, 3, 'Local/Visitante', '2024-11-01 16:34:37'),
(212, 3, 'manchita', '2024-11-01 16:34:39'),
(213, 3, 'Local/Visitante', '2024-11-01 16:34:40'),
(214, 3, 'manchita', '2024-11-01 16:34:42'),
(215, 3, 'Local/Visitante', '2024-11-01 16:34:43'),
(216, 3, 'manchita', '2024-11-01 16:35:09'),
(217, 3, 'Local/Visitante', '2024-11-01 16:35:10'),
(218, 3, 'manchita', '2024-11-01 16:35:12'),
(219, 3, 'Local/Visitante', '2024-11-01 16:35:14'),
(220, 3, 'manchita', '2024-11-01 16:35:17'),
(221, 3, 'Local/Visitante', '2024-11-01 16:35:18'),
(222, 3, 'manchita', '2024-11-01 16:37:48'),
(223, 3, 'manchita', '2024-11-01 16:39:54'),
(224, 3, 'Local/Visitante', '2024-11-01 16:41:43'),
(225, 3, 'manchita', '2024-11-04 12:30:23'),
(226, 3, 'Local/Visitante', '2024-11-04 12:30:28'),
(227, 3, 'manchita', '2024-11-04 12:30:31'),
(228, 3, 'Local/Visitante', '2024-11-04 12:30:32'),
(229, 3, 'manchita', '2024-11-04 12:30:33'),
(230, 3, 'manchita', '2024-11-04 12:58:27'),
(231, 3, 'manchita', '2024-11-04 13:11:19'),
(232, 3, 'Local/Visitante', '2024-11-04 13:41:05'),
(233, 3, 'Local/Visitante', '2024-11-04 13:41:09'),
(234, 3, 'manchita', '2024-11-04 13:41:19'),
(235, 3, 'manchita', '2024-11-04 13:41:58'),
(236, 3, 'manchita', '2024-11-04 14:12:59'),
(237, 3, 'manchita', '2024-11-04 14:15:27'),
(238, 3, 'manchita', '2024-11-04 14:15:30'),
(239, 3, 'manchita', '2024-11-04 14:16:27'),
(240, 3, 'manchita', '2024-11-04 14:17:08'),
(241, 3, 'manchita', '2024-11-04 14:17:41'),
(242, 3, 'manchita', '2024-11-04 14:17:55'),
(243, 3, 'manchita', '2024-11-04 14:17:56'),
(244, 3, 'manchita', '2024-11-04 14:18:48'),
(245, 3, 'manchita', '2024-11-04 14:22:11'),
(246, 3, 'manchita', '2024-11-04 14:22:30'),
(247, 3, 'manchita', '2024-11-04 14:22:34'),
(248, 3, 'manchita', '2024-11-04 14:22:36'),
(249, 3, 'manchita', '2024-11-04 14:22:40'),
(250, 3, 'Local/Visitante', '2024-11-04 14:22:48'),
(251, 3, 'Local/Visitante', '2024-11-04 14:24:39'),
(252, 3, 'Local/Visitante', '2024-11-04 14:24:40'),
(253, 3, 'Local/Visitante', '2024-11-04 14:24:42'),
(254, 3, 'Local/Visitante', '2024-11-04 14:25:22'),
(255, 3, 'manchita', '2024-11-04 14:25:31'),
(256, 3, 'Local/Visitante', '2024-11-04 14:26:09'),
(257, 3, 'manchita', '2024-11-04 14:41:45'),
(258, 3, 'Local/Visitante', '2024-11-04 14:55:38'),
(259, 3, 'manchita', '2024-11-05 12:28:35'),
(260, 3, 'Local/Visitante', '2024-11-05 12:29:00'),
(261, 3, 'manchita', '2024-11-05 12:29:03'),
(262, 3, 'manchita', '2024-11-05 12:29:05'),
(263, 3, 'Local/Visitante', '2024-11-05 12:29:10'),
(264, 3, 'manchita', '2024-11-05 12:32:08'),
(265, 3, 'manchita', '2024-11-05 12:55:15'),
(266, 3, 'Local/Visitante', '2024-11-05 13:02:14'),
(267, 3, 'manchita', '2024-11-05 13:10:04'),
(268, 3, 'Local/Visitante', '2024-11-05 13:10:44'),
(269, 3, 'manchita', '2024-11-05 13:33:08'),
(270, 3, 'Local/Visitante', '2024-11-05 13:33:15'),
(271, 3, 'Local/Visitante', '2024-11-05 13:33:37'),
(272, 3, 'manchita', '2024-11-08 12:54:53'),
(273, 3, 'Local/Visitante', '2024-11-08 12:55:23'),
(274, 3, 'manchita', '2024-11-10 19:26:57'),
(275, 3, 'Local/Visitante', '2024-11-10 19:27:05'),
(276, 3, 'Local/Visitante', '2024-11-15 12:31:48'),
(277, 3, 'manchita', '2024-11-15 12:32:05');

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
(1, 'ser', 181000),
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
(3, 'ser', 0),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

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
