-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2024 a las 22:45:24
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
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `categoria` enum('Energia','Climatizacion','Red','Servidores','Cableado','Infraestructura') NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_incidencia` date NOT NULL,
  `estado` enum('abierto','cerrado','proceso') NOT NULL,
  `prioridad` enum('baja','media','alta') NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id`, `usuario`, `categoria`, `descripcion`, `fecha_incidencia`, `estado`, `prioridad`, `foto`, `fecha_cierre`, `usuario_id`) VALUES
(14, 'Leandro', 'Red', 'llololololol', '2024-11-14', 'cerrado', 'baja', 'assets/imagenes/image-removebg-preview (53).png', '2024-10-16', 1),
(18, 'Pamela', 'Infraestructura', 'Roptura de puertas', '2024-09-26', 'proceso', 'baja', 'Evidencias/image-removebg-preview (54).png', '0000-00-00', 4),
(19, 'Leandro', 'Energia', 'Cables pelados en la sala de ARI', '2024-09-26', 'abierto', 'baja', 'assets/imagenes/stop.png', '2024-10-10', 1),
(20, 'Leandro', 'Red', 'hola mundo', '2024-10-09', 'abierto', 'baja', 'assets/imagenes/image-removebg-preview (54).png', '2024-10-16', 1),
(21, 'Leandro', 'Infraestructura', 'Gotera en la sala de DAM', '2024-10-10', 'abierto', 'media', 'assets/imagenes/cuadrovida.jpg', '0000-00-00', 1),
(22, 'Leandro', 'Energia', 'Gotera en la sala de DAM', '2024-10-11', 'abierto', 'media', 'assets/imagenes/image-removebg-preview (51).png', '0000-00-00', 1),
(29, 'Admin', 'Climatizacion', 'la incidencia ya se reparo ', '2024-10-02', 'cerrado', 'media', 'assets/imagenes/image-removebg-preview (46).png', '2024-10-23', 5),
(33, 'Admin', 'Energia', 'cables rotos', '2024-10-15', 'abierto', 'media', 'assets/imagenes/abajo.png', '0000-00-00', 5),
(35, 'Leandro', 'Climatizacion', 'Gotera en la sala de DAM', '2024-10-08', 'abierto', 'baja', 'assets/imagenes/abajo.png', '0000-00-00', 1),
(36, 'Leandro', 'Energia', 'hola mundo baby', '2024-10-09', 'cerrado', 'media', 'assets/imagenes/cuadrado.png', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contraseña`, `fecha_creacion`) VALUES
(1, 'Leandro', 'Clavijo', 'leandro@gmail.com', '$2y$10$XTgdhdslaC6XejVbFfZ8z.dVvzOkR.6cIdq5MblqlyYdScMZnGG8G', '2024-10-01 13:36:02'),
(4, 'Pamela', 'Ortiz', 'pamela@gmail.com', '$2y$10$t0rEASbas1j8ICU1/Dw2FewcdaPzyHZmgX3KQZEFSasWk0/6jWk6O', '2024-10-02 20:49:18'),
(5, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$qBI3uMFkQsYc82/oEAnQcekGEUxrUcfaJOmHzApCq5SvnoNvoxVTm', '2024-10-03 09:18:11'),
(7, 'Valentina', 'Utreras', 'vale@gmail.com', '$2y$10$mPC72.1hQjeQk1sVyfMYXe4yUorI3FDo/KVcYDIGxZ6DRaeV/rqne', '2024-10-03 17:35:17'),
(11, 'Andres', 'Cruz', 'andres@gmail.com', '$2y$10$XzQ//wq/IViNC3cMAeJj.e9TfJhdtq6NV7WREjFJJpsHdSpN9.U4O', '2024-10-09 15:47:39'),
(12, 'Juan', 'Perez', 'juan@gmail.com', '$2y$10$uuKxlII72LTUslbHRnSHSufopbWFytA0sriuzcGy0581mrXZA1Utq', '2024-10-09 15:54:16'),
(13, 'Juan', 'Cruz', 'juan1@gmail.com', '$2y$10$Qy1F/5m51voIL/j0us8qveTeIdr0o0uVFpU1.JuSxKcZqJj1ZUyxy', '2024-10-09 16:11:27'),
(14, 'Britany', 'Naranjo', 'britany@gmail.com', '$2y$10$ClVcFCEP7naK8O6/Snp5ye89BbVHkLhN5pLH8KsDHFSrgvlrPT66m', '2024-10-09 16:19:37'),
(15, 'Marc', 'Miro', 'marc@gmail.com', '$2y$10$wshaaL7hpLtkqmqORHRZMuCufTfqWRZ64jHQUmqlcbZdz7DgTJCG6', '2024-10-09 17:20:08'),
(17, 'Samanta', 'Rios', 'samanta@gmail.com', '$2y$10$Mox0dk03NNJHg.7CUH8TU.V4xIrmiRDw2Q62HnJ8sTF.RubsQZivO', '2024-10-09 17:26:26'),
(18, 'Valentina', 'Utreras', 'valentina@gmai.com', '$2y$10$8ocua2odyseAdtjFuowz9.1n4GQMq6GF41dP0wVpBTBzWsX5MjUXC', '2024-10-09 21:13:54'),
(19, 'aleix', 'prat', 'aleix@gmail.com', '$2y$10$eZfqO0u30t5zmi86eeGBcenVEK9gFvUr9PmrvyCVnj799S6GMBq6a', '2024-10-10 08:17:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `incidencia_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
