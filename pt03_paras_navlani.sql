-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2023 a las 15:33:40
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt03_paras_navlani`
--
CREATE DATABASE IF NOT EXISTS `pt03_paras_navlani` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt03_paras_navlani`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`) VALUES
(1, 'Incendio en la fábrica local: Un gran incendio arrasó con la fábrica textil local ayer por la noche. No se reportaron heridos, pero las pérdidas materiales son significativas. Las autoridades están investigando las causas del siniestro.'),
(2, 'Java i JavaScript no son iguals'),
(3, 'Java i JavaScript no son iguals'),
(4, 'Java i JavaScript no son iguals'),
(5, 'Java i JavaScript no son iguals'),
(6, 'Java i JavaScript no son iguals'),
(7, 'Java i JavaScript no son iguals'),
(8, 'Java i JavaScript no son iguals'),
(9, 'Java i JavaScript no son iguals'),
(10, 'Java i JavaScript no son iguals'),
(11, 'Java i JavaScript no son iguals'),
(12, 'Java i JavaScript no son iguals'),
(13, 'Java i JavaScript no son iguals'),
(14, 'Java i JavaScript no son iguals'),
(15, 'Java i JavaScript no son iguals'),
(32, 'C i C++no son iguals');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE IF NOT EXISTS `usuaris` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `usuari` varchar(45) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contrasenya` varchar(80) NOT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
