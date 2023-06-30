-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2023 a las 16:02:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `id_Pago` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `id_Pago`, `email`, `pass`, `nombre`, `direccion`) VALUES
(1, '', 'cliente1@gmail.com', '4983a0ab83ed86e0e7213c8783940193', 'cliente1', ''),
(9, '', 'armando@gmail.com', '7b64d09060db17ca6b96c0af99575903', 'Armando', 'calle tales y pascuales'),
(15, '', 'armando2@gmail.com', '426ba3ffac05f41bc23751172b73e6a9', 'armando2', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL DEFAULT '',
  `filesize` int(11) NOT NULL DEFAULT 0,
  `web_path` varchar(250) NOT NULL DEFAULT '',
  `system_path` varchar(250) NOT NULL DEFAULT '',
  `test` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`, `test`) VALUES
(1, 'Monitor.png', 2905190, '/eccomerce/uploads/1.png', 'C:/xampp/htdocs//eccomerce/uploads/1.png', 0),
(2, 'pc.png', 47814, '/eccomerce/uploads/2.png', 'C:/xampp/htdocs//eccomerce/uploads/2.png', 0),
(3, 'Chasis Caja Atx Gamer.png', 195295, '/eccomerce/uploads/3.png', 'C:/xampp/htdocs//eccomerce/uploads/3.png', 0),
(4, 'Chasis Caja  Gamer.png', 81123, '/eccomerce/uploads/4.png', 'C:/xampp/htdocs//eccomerce/uploads/4.png', 0),
(5, 'Chasis Atx Gamer.png', 94292, '/eccomerce/uploads/5.png', 'C:/xampp/htdocs//eccomerce/uploads/5.png', 0),
(6, 'Chasis Atx Gamer.png', 94292, '/eccomerce/uploads/6.png', 'C:/xampp/htdocs//eccomerce/uploads/6.png', 0),
(7, 'Caja Atx Xpg Valor Air.png', 51801, '/eccomerce/uploads/7.png', 'C:/xampp/htdocs//eccomerce/uploads/7.png', 0),
(8, 'Gabinete Caja Atx Iceberg.png', 78640, '/eccomerce/uploads/8.png', 'C:/xampp/htdocs//eccomerce/uploads/8.png', 0),
(9, 'Caja Gabinete Gamer.png', 38911, '/eccomerce/uploads/9.png', 'C:/xampp/htdocs//eccomerce/uploads/9.png', 0),
(10, 'Caja Darkflash.png', 53536, '/eccomerce/uploads/10.png', 'C:/xampp/htdocs//eccomerce/uploads/10.png', 0),
(11, 'Gabinete Pc Caja Atx Iceberg.png', 60920, '/eccomerce/uploads/11.png', 'C:/xampp/htdocs//eccomerce/uploads/11.png', 0),
(12, 'Gabinete Caja Gamer.png', 103931, '/eccomerce/uploads/12.png', 'C:/xampp/htdocs//eccomerce/uploads/12.png', 0),
(13, 'Combo Chasis Iceberg.png', 71638, '/eccomerce/uploads/13.png', 'C:/xampp/htdocs//eccomerce/uploads/13.png', 0),
(14, 'chasis atx gamer + control.png', 92084, '/eccomerce/uploads/14.png', 'C:/xampp/htdocs//eccomerce/uploads/14.png', 0),
(15, 'Chasis Corsair.png', 87679, '/eccomerce/uploads/15.png', 'C:/xampp/htdocs//eccomerce/uploads/15.png', 0),
(16, 'Chasis Gamer.png', 54182, '/eccomerce/uploads/16.png', 'C:/xampp/htdocs//eccomerce/uploads/16.png', 0),
(17, 'Chasis Gamer black.png', 54199, '/eccomerce/uploads/17.png', 'C:/xampp/htdocs//eccomerce/uploads/17.png', 0),
(18, 'Gabinete Chasis.png', 34684, '/eccomerce/uploads/18.png', 'C:/xampp/htdocs//eccomerce/uploads/18.png', 0),
(19, 'Chasis Micro Atx.png', 32997, '/eccomerce/uploads/19.png', 'C:/xampp/htdocs//eccomerce/uploads/19.png', 0),
(20, 'Gabinete Chasis Atx Gamer.png', 67308, '/eccomerce/uploads/20.png', 'C:/xampp/htdocs//eccomerce/uploads/20.png', 0),
(21, 'Gabinete Pc Gamer Xtech.png', 36035, '/eccomerce/uploads/21.png', 'C:/xampp/htdocs//eccomerce/uploads/21.png', 0),
(22, 'Gabinete Chasis Gamer.png', 42130, '/eccomerce/uploads/22.png', 'C:/xampp/htdocs//eccomerce/uploads/22.png', 0),
(23, 'Chasis Gabinete Iceberg.png', 62988, '/eccomerce/uploads/23.png', 'C:/xampp/htdocs//eccomerce/uploads/23.png', 0),
(24, 'Monitor gamer.png', 101460, '/eccomerce/uploads/24.png', 'C:/xampp/htdocs//eccomerce/uploads/24.png', 0),
(25, 'Monitor gamer curvo.png', 127327, '/eccomerce/uploads/25.png', 'C:/xampp/htdocs//eccomerce/uploads/25.png', 0),
(26, 'Monitor Ultrawide.png', 76851, '/eccomerce/uploads/26.png', 'C:/xampp/htdocs//eccomerce/uploads/26.png', 0),
(27, 'Monitor gamer basic.png', 63851, '/eccomerce/uploads/27.png', 'C:/xampp/htdocs//eccomerce/uploads/27.png', 0),
(28, 'Monitor Led.png', 71161, '/eccomerce/uploads/28.png', 'C:/xampp/htdocs//eccomerce/uploads/28.png', 0),
(29, 'Monitor.png', 74398, '/eccomerce/uploads/29.png', 'C:/xampp/htdocs//eccomerce/uploads/29.png', 0),
(30, 'Monitor Tv.png', 86859, '/eccomerce/uploads/30.png', 'C:/xampp/htdocs//eccomerce/uploads/30.png', 0),
(31, 'Monitor Led base ac.png', 56300, '/eccomerce/uploads/31.png', 'C:/xampp/htdocs//eccomerce/uploads/31.png', 0),
(32, 'Monitor Dell.png', 67760, '/eccomerce/uploads/32.png', 'C:/xampp/htdocs//eccomerce/uploads/32.png', 0),
(33, 'Monitor Led base ac.png', 56300, '/eccomerce/uploads/33.png', 'C:/xampp/htdocs//eccomerce/uploads/33.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `existence` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `existence`) VALUES
(3, 'Monitor', 150000, 20),
(4, 'Caja ATX ', 255000, 10),
(5, 'Chasis Caja Atx Gamer', 197910, 10),
(6, 'Chasis Caja  Gamer', 780000, 100),
(7, 'Chasis Atx Gamer', 379900, 100),
(8, 'Caja Atx Xpg Valor Air', 319900, 100),
(9, 'Gabinete Caja Atx Iceberg', 192740, 100),
(10, 'Caja Gabinete Gamer', 249900, 100),
(11, 'Caja Darkflash', 379900, 100),
(12, 'Gabinete Pc Caja Atx Iceberg', 155940, 100),
(13, 'Gabinete Caja Gamer', 143910, 100),
(14, 'Combo Chasis Iceberg', 165508, 100),
(15, 'chasis atx gamer + control', 319900, 100),
(16, 'Chasis Corsair', 779000, 100),
(17, 'Chasis Gamer', 269900, 100),
(18, 'Chasis Gamer', 413910, 100),
(19, 'Gabinete Chasis', 199900, 100),
(20, 'Chasis Micro Atx', 212900, 100),
(21, 'Gabinete Chasis Atx Gamer', 279900, 100),
(22, 'Gabinete Pc Gamer Xtech', 219900, 100),
(23, 'Gabinete Chasis Gamer', 197910, 100),
(24, 'Chasis Gabinete Iceberg', 227148, 100),
(25, 'Monitor gamer', 140000, 100),
(26, 'Monitor gamer curvo ', 2858438, 100),
(27, 'Monitor Ultrawide', 1326220, 100),
(28, 'Monitor gamer', 810167, 100),
(29, 'Monitor Led', 687000, 100),
(30, 'Monitor', 758000, 100),
(31, 'Monitor Tv', 610000, 100),
(32, 'Monitor Led', 687000, 100),
(33, 'Monitor Dell', 329900, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_files`
--

CREATE TABLE `products_files` (
  `products_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products_files`
--

INSERT INTO `products_files` (`products_id`, `file_id`) VALUES
(5, 3),
(4, 2),
(6, 4),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15),
(17, 16),
(18, 17),
(19, 18),
(20, 19),
(21, 20),
(22, 21),
(23, 22),
(24, 23),
(25, 24),
(26, 25),
(27, 26),
(28, 27),
(29, 28),
(30, 29),
(31, 30),
(32, 31),
(33, 32),
(3, 1),
(3, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibe`
--

CREATE TABLE `recibe` (
  `id` int(5) NOT NULL,
  `idCli` int(5) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recibe`
--

INSERT INTO `recibe` (`id`, `idCli`, `nombres`, `email`, `direccion`) VALUES
(2, 9, 'mi mama', 'mama@gmail.com', 'dir de mi mama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `idcli` int(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salesdetails`
--

CREATE TABLE `salesdetails` (
  `id` int(11) NOT NULL,
  `idprodu` int(5) NOT NULL,
  `idsale` int(5) NOT NULL,
  `amount` int(5) NOT NULL,
  `price` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `nombre`) VALUES
(1, 'davidarmandoguevara@gmail.com', '172522ec1028ab781d9dfd17eaca4427', 'David Armando'),
(2, 'prueba@gmail.com', 'c893bad68927b457dbed39460e6afd62', 'prueba 1'),
(3, 'prueba2@gmail.com', '96080775c113b0e5c3e32bdd26214aec', 'prueba 2'),
(8, 'valentina@gmail.com', 'ab3ab964804dc9ae20de3b02d379b1bd', 'Valentina');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `KEmail` (`email`) USING BTREE;

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recibe`
--
ALTER TABLE `recibe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fkidCli` (`idCli`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidcli` (`idcli`) USING BTREE;

--
-- Indices de la tabla `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidsale` (`idsale`) USING BTREE,
  ADD KEY `fkidprodu` (`idprodu`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `recibe`
--
ALTER TABLE `recibe`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salesdetails`
--
ALTER TABLE `salesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `idcli` FOREIGN KEY (`idcli`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD CONSTRAINT `idprodu` FOREIGN KEY (`idprodu`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idsale` FOREIGN KEY (`idsale`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
