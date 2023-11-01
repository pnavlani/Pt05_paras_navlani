-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2023 a las 19:08:26
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
CREATE DATABASE IF NOT EXISTS Pt03_paras_navlani;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(200) NOT NULL,
  `article` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`) VALUES
(1, 'Incendio en la fábrica local: Un gran incendio arrasó con la fábrica textil local ayer por la noche. No se reportaron heridos, pero las pérdidas materiales son significativas. Las autoridades están investigando las causas del siniestro.'),
(2, 'Nueva ley de educación: El gobierno aprobó una nueva ley de educación que promueve la inclusión digital. Todos los estudiantes de escuelas públicas recibirán una tablet para sus estudios. Se espera que la medida entre en vigor el próximo año escolar.'),
(3, 'Avances en la vacuna contra el COVID-19: Científicos reportan un avance significativo en la vacuna contra el COVID-19. Los resultados preliminares de los ensayos clínicos son prometedores. Se espera su aprobación para finales de este año.'),
(4, 'Elecciones presidenciales: Las elecciones presidenciales se llevarán a cabo el próximo mes. Los candidatos están en plena campaña para ganar votantes. Se espera una alta participación ciudadana.'),
(5, 'Desastre natural en la región montañosa: Un fuerte terremoto sacudió la región montañosa ayer por la noche. Las autoridades reportan numerosas víctimas y daños estructurales. Se están coordinando esfuerzos de rescate y ayuda.'),
(6, 'Descubrimiento arqueológico: Arqueólogos descubrieron una antigua tumba egipcia intacta. El hallazgo incluye artefactos y jeroglíficos bien conservados. Los expertos esperan que este descubrimiento arroje luz sobre la historia del antiguo Egipto.'),
(7, 'Innovación tecnológica: Una empresa local lanzó un nuevo software de inteligencia artificial. Promete mejorar la eficiencia en la industria manufacturera. Las primeras pruebas han demostrado resultados prometedores.'),
(8, 'Cambio climático: Los científicos advierten sobre el aumento de las temperaturas globales. El cambio climático podría tener graves consecuencias si no se toman medidas urgentes. Los líderes mundiales están discutiendo posibles soluciones.'),
(9, 'Economía local: La economía local está experimentando un crecimiento significativo. Las empresas locales informan de un aumento en las ventas y la contratación de personal. Los expertos predicen un futuro económico positivo.'),
(10, 'Salud pública: El número de casos de obesidad está aumentando a nivel nacional. Los expertos en salud pública instan a una mayor educación sobre la nutrición. Se están considerando nuevas políticas para promover estilos de vida saludables.'),
(11, 'Cultura y arte: Se inauguró una nueva exposición de arte contemporáneo en el museo local. La muestra incluye obras de artistas emergentes y establecidos. La exposición estará abierta al público durante el próximo mes.'),
(12, 'Deporte: El equipo local ganó el campeonato nacional de fútbol. Fue un partido reñido que se decidió en tiempo extra. Los fanáticos celebraron la victoria en las calles de la ciudad.'),
(13, 'Ciencia y tecnología: La NASA anunció un nuevo proyecto para explorar Marte. El lanzamiento del rover está programado para el año próximo. El objetivo es buscar signos de vida en el planeta rojo.'),
(14, 'Medio ambiente: Un nuevo informe destaca la amenaza de la deforestación en la selva amazónica. Los incendios forestales y la tala ilegal son las principales causas. Los ambientalistas piden una acción inmediata para proteger el pulmón del planeta.'),
(15, 'Sociedad: Una nueva encuesta revela un aumento en el apoyo a los derechos de los animales. La mayoría de los encuestados considera que se deben fortalecer las leyes de protección animal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(30) NOT NULL,
  `usuari` varchar(45) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contrasenya` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
