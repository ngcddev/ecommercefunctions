-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2024 a las 01:19:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventory_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory_updates`
--

CREATE TABLE `inventory_updates` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- tabla `inventory_updates`
--

INSERT INTO `inventory_updates` (`id`, `product_name`, `category`, `description`, `update_time`) VALUES
(1, 'orquidea', 'pequeña', 'Es muy linda', '2024-05-04 23:16:54'),
(2, 'orquidea', 'pequeña', 'Es muy linda', '2024-05-04 23:21:45'),
(3, 'Anturio', 'pequeño', 'lindo', '2024-05-04 23:26:09'),
(4, 'josefina', 'grande', 'linda', '2024-05-04 23:26:56'),
(5, 'geranio', 'mediano', 'Hermoso', '2024-05-05 00:03:37');

-- --------------------------------------------------------

--
-- tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `passworduser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- tabla `users`
--

INSERT INTO `users` (`id`, `username`, `passworduser`) VALUES
(2, 'admin', '$2y$10$sce6LMEy2g/j06OdIsHbiO7H2fcGfUBqIX2IM7NZp2ikmj/ZRLPAS'),
(4, 'admi', '$2y$10$e17XUjb1KMJDECPR.kDa3.3tf5UgHaGJ4irQueVzp4lXLm2nsWZaO'),
(6, 'sebas', '123');

--
-- tablas volcadas
--

--
--  tabla `inventory_updates`
--
ALTER TABLE `inventory_updates`
  ADD PRIMARY KEY (`id`);

--
-- tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- tablas volcadas
--

--
--  tabla `inventory_updates`
--
ALTER TABLE `inventory_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
--  tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
