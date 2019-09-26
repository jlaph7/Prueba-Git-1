-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2019 a las 20:58:18
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_incidencia`
--
CREATE DATABASE IF NOT EXISTS `bd_incidencia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_incidencia`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `GuardarUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarUsuario` (IN `nom` VARCHAR(70), IN `user` VARCHAR(70), IN `pass` VARCHAR(41))  BEGIN
insert into usuario(nombres,username,password,estado) values(nom,user,pass,1);
select ROW_COUNT();
END$$

DROP PROCEDURE IF EXISTS `sp_actualizar_1`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_1` (IN `id_usuario` INT, IN `titulo` VARCHAR(50), IN `descripcion` VARCHAR(200), IN `latitud` DECIMAL(11,8), IN `longitud` DECIMAL(11,8))  BEGIN
	declare fecha_mod date;
    declare hora_mod time;
        
    set fecha_mod=CURDATE();
    set hora_mod= CURTIME();
    
	update incidencia set id_usuario=id_usuario,
						titulo=titulo,
						descripcion=descripcion,
                        fecha_mod=fecha_mod,
                        hora_mod=hora_mod,
                        latitud=latitud,
                        longitud=longitud
				where id_incidencia=id_incidencia;
END$$

DROP PROCEDURE IF EXISTS `sp_CrearIncidencia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CrearIncidencia` (IN `id_usuario` INT, IN `titulo` VARCHAR(50), IN `descripcion` VARCHAR(200), IN `fecha` DATE, IN `hora` TIME, IN `latitud` DECIMAL(11,8), IN `longitud` DECIMAL(11,8))  MODIFIES SQL DATA
BEGIN
	declare valor varchar(100);
    declare idaux int DEFAULT 0;
    INSERT INTO incidencia(`id_usuario`,`titulo`,`descripcion`,`fecha`,`hora`,`longitud`,`latitud`)
    VALUES (id_usuario, titulo, descripcion, fecha, hora, longitud, latitud);

    set idaux=@@identity;
    set valor= (SELECT concat('images/incidencias/',idaux,'-',id_usuario,'.mp4'));

    update incidencia set video=valor where id_incidencia=idaux;

    select valor;

END$$

DROP PROCEDURE IF EXISTS `sp_CrearIncidencia_2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CrearIncidencia_2` (IN `id_usuario` INT, IN `titulo` VARCHAR(50), IN `descripcion` VARCHAR(200), IN `latitud` DECIMAL(11,8), IN `longitud` DECIMAL(11,8), IN `ruta` VARCHAR(50))  MODIFIES SQL DATA
BEGIN
	declare fecha date;
    declare hora time;
    
    set fecha=CURDATE();
    set hora= CURTIME();
    
    
    INSERT INTO incidencia(`id_usuario`,`titulo`,`descripcion`,`fecha`,`hora`,`longitud`,`latitud`,`ruta`)
    VALUES (id_usuario, titulo, descripcion, fecha, hora, longitud, latitud,ruta);



END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE `incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fecha_mod` date DEFAULT NULL,
  `hora_mod` time DEFAULT NULL,
  `latitud` decimal(11,8) NOT NULL,
  `longitud` decimal(11,8) NOT NULL,
  `ruta` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(41) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
