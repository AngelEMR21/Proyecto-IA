-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2022 a las 23:38:05
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_vehiculos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto_info`
--

CREATE TABLE `auto_info` (
  `id_auto` int(255) NOT NULL,
  `nombre_user` varchar(255) NOT NULL,
  `apellido_user` varchar(255) NOT NULL,
  `id_placa` varchar(255) NOT NULL,
  `marca_name` varchar(255) NOT NULL,
  `model_auto` varchar(255) NOT NULL,
  `year_date` int(10) NOT NULL,
  `type_body` varchar(255) NOT NULL,
  `color_auto` varchar(255) NOT NULL,
  `no_serie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `auto_info`
--

INSERT INTO `auto_info` (`id_auto`, `nombre_user`, `apellido_user`, `id_placa`, `marca_name`, `model_auto`, `year_date`, `type_body`, `color_auto`, `no_serie`) VALUES
(1, 'Noé', 'Diaz', 'GUH645N', 'TOYOTA', 'TACOMA', 2018, 'PICK-UP', 'GRIS', '2JDJ939294DNLTCM6V'),
(2, 'Leonel', 'Aguirre', 'GPI987A', 'HONDA', 'CIVIC', 2022, 'SEDAN', 'BLANCO', '9HJXHDASED4CM6V'),
(3, 'Daniel', 'Zavala', 'CLF243M', 'NISSAN', 'MARCH', 2015, 'HASHBACK', 'ROJO', 'MRCH39QHMTL104CM4C'),
(4, 'Tania', 'Calderon', 'GTO203A', 'NISSAN', 'FRONTIER', 2014, 'PICK-UP', 'NARANJA', 'NSAK939294DNLTCM4J'),
(5, 'Casimiro', 'Zamudio', 'GLO909L', 'MERCEDES BENZ', 'CLASE A', 2020, 'SEDAN', 'PLATA', 'MCRDZJ939294DNLTC'),
(6, 'Angel', 'Martinez', 'PBL847K', 'HONDA', 'CR-V', 2012, 'CROSSOVER', 'AZUL MARINO', 'WQDJDJDNLTCM6V'),
(7, 'Pablo', 'Vargas', 'MXE765L', 'TOYOTA', 'RAV4', 2019, 'CROSSOVER', 'BLANCO', '90DJ93929DWDO23K'),
(8, 'Aldo', 'Ayala', 'MRL229G', 'VOLKSWAGEN', 'JETTA', 2021, 'SEDAN', 'AZUL CLARO', '4DJ93929DWWEK'),
(9, 'Catherine', 'Luna', 'JGL382H', 'BMW', '32Oi', 2017, 'SEDAN', 'PLATA', '23J93929DWDO23K'),
(10, 'Alejandro', 'Castillos', 'GPY873C', 'SEAT', 'CUPRA LEON', 2022, 'HASHBACK', 'GRIS GRAFENO', '7DJ93929DWDO23K'),
(11, 'Gustavo', 'Paz', 'GUS328J', 'CHEVROLET', 'OPTRA', 2011, 'SEDAN', 'BLANCO', 'CODJ93929DWDO23K'),
(12, 'Francisco', 'Espinoza', 'GXD298N', 'NISSAN', 'TSURU', 2015, 'SEDAN', 'GUINDA', '3KJJ93929DWDO2FF'),
(13, 'Rocio', 'Moreno', 'GFR908', 'VOLKSWAGEN', 'POINTER', 2005, 'HASHBACK', 'BLANCO', 'HD3I3929DWDO2E'),
(14, 'Chatito', 'Martinez', 'GHY200I', 'BMW', 'M4 COMPETITION', 2022, 'SEDAN', 'VERDE MENTA', '2IOIN29DWDO23K'),
(15, 'Alejandra', 'Murillo', 'GHK499Q', 'MERCEDES BENZ', 'AMG E53', 2020, 'COUPE', 'NEGRO ', 'DWKJ929DWDO23K'),
(16, 'Jesus', 'Lizarraga', 'GHJ39QL', 'KIA', 'RIO', 2018, 'SEDAN', 'ROJO', 'KARO93929DWDOJUG'),
(17, 'Francisco', 'De Leon', 'GJL234I', 'AUDI', 'A3', 2021, 'SPORTBACK', 'AZUL', 'AARO93929DWF'),
(18, 'Cesar', 'Mora', 'GJD389K', 'FORD', 'F150', 2021, 'PICK-UP', 'AZUL', 'FRDRO93929DJUG'),
(19, 'Leonardo', 'Orozco', 'FSI092J', 'RAM', '700', 2023, 'PICK-UP', 'GRIS', 'XS3929DWDOJ3J'),
(20, 'Marcela', 'Salas', 'GSL503L', 'MAZDA', '3', 2016, 'SEDAN', 'ROJO', 'WKK3929DWDOJ3J');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auto_info`
--
ALTER TABLE `auto_info`
  ADD PRIMARY KEY (`id_auto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auto_info`
--
ALTER TABLE `auto_info`
  MODIFY `id_auto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
