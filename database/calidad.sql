-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.1.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5229
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para calidad
CREATE DATABASE IF NOT EXISTS `calidad` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `calidad`;

-- Volcando estructura para tabla calidad.ca_agenda_monitoreo
CREATE TABLE IF NOT EXISTS `ca_agenda_monitoreo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_campana` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `fecha_monitoreo` date NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_agenda_monitoreo: ~8 rows (aproximadamente)
DELETE FROM `ca_agenda_monitoreo`;
/*!40000 ALTER TABLE `ca_agenda_monitoreo` DISABLE KEYS */;
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(1, 1, 1, 14, '2018-09-28', 1);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(2, 1, 1, 1, '2018-09-28', 0);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(3, 1, 1, 1, '2018-10-25', 0);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(4, 1, 1, 1, '2018-10-25', 0);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(5, 1, 1, 1, '2018-10-25', 0);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(6, 1, 1, 1, '2018-10-01', 0);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(7, 1, 1, 1, '2018-10-01', 0);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(8, 1, 1, 1, '2018-10-01', 0);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(9, 1, 1, 12, '2018-10-01', 0);
/*!40000 ALTER TABLE `ca_agenda_monitoreo` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_asesores
CREATE TABLE IF NOT EXISTS `ca_asesores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_campana` int(11) NOT NULL,
  `identificacion` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_asesores: ~53 rows (aproximadamente)
DELETE FROM `ca_asesores`;
/*!40000 ALTER TABLE `ca_asesores` DISABLE KEYS */;
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(1, 1, 1, '1022416598', 'CAMILO ANDRES', 'ROJAS AGUILAR', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(2, 1, 1, '80765419', 'JOSE DAVID', 'ZAMORA SIERRA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(3, 1, 1, '1032400922', 'ANDRES', 'GRANDE VALDERRAMA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(4, 1, 1, '1032492274', 'SERGIO NICOLAS', 'AGUIRRE VANEGAS', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(5, 1, 1, '1022379699', 'CARLOS EDUARDO', 'CARRANZA RODRIGUEZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(6, 1, 1, '1030567303', 'VANESSA', 'QUINONES CASTILLO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(7, 1, 1, '19709050', 'LAGARDER', 'AGUIRRE ROMERO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(8, 1, 1, '1030624487', 'CAMILA ALEJANDRA', 'ALARCON HERNANDEZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(9, 1, 1, '1020809452', 'LUISA FERNANDA', 'GARCIA GARCIA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(10, 1, 1, '1024540264', 'KATHERIN', 'LEYTON PERDOMO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(11, 1, 1, '1014267328', 'MARIA ALEJANDRA', 'NARVAEZ FAJARDO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(12, 1, 1, '1023010458', 'PAOLA YULIETH', 'RODRIGUEZ MUNOZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(13, 1, 1, '1033804448', 'MARIA PAULA', 'CARRENO GIL', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(14, 1, 1, '1012401857', 'JHON ESMITH', 'CORTES RAMOS', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(15, 1, 1, '1032400462', 'KIMBERLY CARMENZA', 'HERRERA CEPEDA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(16, 1, 1, '52241800', 'ESUE MIREYA', 'RETABIZCA LEON', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(17, 1, 1, '1012409991', 'CAROL JULYETH', 'SANABRIA COCA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(18, 1, 1, '1030565958', 'FABIAN CAMILO', 'MONGUI GARCIA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(19, 1, 1, '1023896414', 'SANDY ROCIO', 'FLOREZ LOZANO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(20, 1, 1, '1022994951', 'BRIGETTE PAOLA', 'MAHECHA GARZON', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(21, 1, 1, '1015460262', 'ERIKA JUDID', 'MARTINEZ PARRA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(22, 1, 1, '1026592301', 'KIMBERLY TATIANA', 'PINILLA ARIZA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(23, 1, 1, '1023956558', 'DERLY JANETH', 'RICO CORREDOR', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(24, 1, 1, '1082879696', 'MELQUISEDEC', 'MOLINA SOLENO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(25, 1, 1, '1016008717', 'EDITH', 'BOHORQUEZ BERMUDEZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(26, 1, 1, '1023026822', 'LAIDY VANESSA', 'RODRIGUEZ RODRIGUEZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(27, 1, 1, '1111203855', 'CLAUDIA NATALIA', 'GUZMAN MERCHAN', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(28, 1, 1, '80014227', 'JORGE ARMANDO', 'PARRA PORRAS', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(29, 1, 1, '1024543471', 'MARLLE JOHANA', 'GUTIERREZ CASTANO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(30, 1, 1, '1022957923', 'DEISY JOHANNA', 'GAMBOA MERCHAN', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(31, 1, 1, '1018489781', 'TANYA CAMILA', 'MORA BUITRAGO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(32, 1, 1, '1098790020', 'MARIO', 'SANCHEZ ACEVEDO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(33, 1, 1, '1019136613', 'CARLOS DANIEL', 'ALVAREZ SANDOVAL', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(34, 1, 1, '52938069', 'ANGELICA MARIA', 'GALLEGO VILLEGAS', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(35, 1, 1, '1022965698', 'MONICA LORENA', 'CASALLAS AVILA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(36, 1, 1, '1022404292', 'AMBAR DANIELA', 'MONROY URUENA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(37, 1, 1, '1022439208', 'ALISON GABRIELA', 'GARCIA DELGADILLO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(38, 1, 1, '1013633611', 'ANA MILENA', 'CASTELBLANCO OLIVEROS', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(39, 1, 1, '1126594151', 'ANA MARIA', 'GARCIA AVELLANEDA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(40, 1, 1, '1012410807', 'WENDY LORENA', 'VELAZCO GUTIERREZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(41, 1, 1, '1026596862', 'MARIA FERNANDA', 'GOMEZ ARDILA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(42, 1, 1, '1019074357', 'LUISA FERNANDA', 'TAPIERO VARGAS', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(43, 1, 1, '1013673991', 'JULIANA', 'RODRIGUEZ SANCHEZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(44, 1, 1, '1012452457', 'MARIA FERNANDA', 'NUNEZ GARCIA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(45, 1, 1, '1024502214', 'SANDRA MILENA', 'TEQUIA PEDRAZA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(46, 1, 1, '1026586163', 'YESIKA JOHANA', 'GARCIA DIAZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(47, 1, 1, '1010229886', 'JHON SEBASTIAN', 'NAVARRETE MORENO', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(48, 1, 1, '52474328', 'ERIKA', 'QUINTERO PEREZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(49, 1, 1, '1117971333', 'LILIANA', 'VILLARRAGA RIOS', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(50, 1, 1, '1033807440', 'EVELYN ALEJANDRA', 'GUABA VILLEGAS', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(51, 1, 1, '1023037628', 'ANGIE TATIANA', 'GUERRA MONTANA', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(52, 1, 1, '1022435372', 'MARIA ANGELICA', 'GAONA MARTINEZ', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(53, 1, 1, '1016032968', 'JOSE YENDIMEN', 'GRISALES AGUIRRE', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(54, 10000001, 0, 'nu?ez', '1', '1', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(55, 1, 1, '10000001', '?ero', 'nu?ez', 'activo');
/*!40000 ALTER TABLE `ca_asesores` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_audio
CREATE TABLE IF NOT EXISTS `ca_audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audio` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_audio: ~4 rows (aproximadamente)
DELETE FROM `ca_audio`;
/*!40000 ALTER TABLE `ca_audio` DISABLE KEYS */;
INSERT INTO `ca_audio` (`id`, `audio`, `estado`) VALUES
	(1, 'Si, por fallas técnicas', 'activo');
INSERT INTO `ca_audio` (`id`, `audio`, `estado`) VALUES
	(2, 'Si, por el asesor', 'activo');
INSERT INTO `ca_audio` (`id`, `audio`, `estado`) VALUES
	(3, 'Si, por el entorno', 'activo');
INSERT INTO `ca_audio` (`id`, `audio`, `estado`) VALUES
	(4, 'No', 'activo');
/*!40000 ALTER TABLE `ca_audio` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_campana
CREATE TABLE IF NOT EXISTS `ca_campana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campana` varchar(100) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_campana: ~0 rows (aproximadamente)
DELETE FROM `ca_campana`;
/*!40000 ALTER TABLE `ca_campana` DISABLE KEYS */;
INSERT INTO `ca_campana` (`id`, `campana`, `id_empresa`, `estado`) VALUES
	(1, 'VENTAS', 1, 'activo');
/*!40000 ALTER TABLE `ca_campana` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_empresa
CREATE TABLE IF NOT EXISTS `ca_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(100) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_empresa: ~0 rows (aproximadamente)
DELETE FROM `ca_empresa`;
/*!40000 ALTER TABLE `ca_empresa` DISABLE KEYS */;
INSERT INTO `ca_empresa` (`id`, `empresa`, `imagen`, `estado`) VALUES
	(1, 'CRUZ VERDE', '', 'activo');
/*!40000 ALTER TABLE `ca_empresa` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_error
CREATE TABLE IF NOT EXISTS `ca_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_matriz` int(11) NOT NULL,
  `tipo_error` varchar(100) NOT NULL,
  `calculo_valor` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_error: ~4 rows (aproximadamente)
DELETE FROM `ca_error`;
/*!40000 ALTER TABLE `ca_error` DISABLE KEYS */;
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(1, 1, '4', 'sum', 'activo');
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(2, 1, '5', 'por', 'activo');
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(3, 1, '6', 'por', 'activo');
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(4, 1, '1', 'por', 'activo');
/*!40000 ALTER TABLE `ca_error` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_item
CREATE TABLE IF NOT EXISTS `ca_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_matriz` int(11) NOT NULL,
  `id_error` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_item: ~18 rows (aproximadamente)
DELETE FROM `ca_item`;
/*!40000 ALTER TABLE `ca_item` DISABLE KEYS */;
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(1, 1, 1, '1.1 Guion de bienvenida/despedida', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(2, 1, 1, '1.2 Atender de inmediato la llamada', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(3, 1, 1, '1.3 EmpatÃ­a', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(4, 1, 1, '1.4 Entender la necesidad del cliente', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(5, 1, 1, '1.5 Manejar tiempos de espera', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(6, 1, 2, '2.1 Brindar informaciÃ³n incorrecta e incompleta', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(7, 1, 2, '2.2 Hacerse cargo de la solicitud del cliente', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(8, 1, 2, '2.3 Pierde la calma durante la llamada', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(9, 1, 2, '2.4 El asesor provoca cuelgue de llamada o cuelga la llamada', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(10, 1, 3, '3.1 Ingresa informaciÃ³n incorrecta e incompleta en los aplicativos', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(11, 1, 3, '3.2 GestiÃ³n comercial del OAI', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(12, 1, 3, '3.3 InformaciÃ³n de PromociÃ³n', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(13, 1, 3, '3.4 Realizar cierres de venta', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(14, 1, 3, '3.5 ConfirmaciÃ³n de venta ', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(15, 1, 3, '3.6 ConfirmaciÃ³n costo del Domicilio', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(16, 1, 4, '4.1 Habeas Data', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(17, 1, 4, '4.2 Guion de formula Medica', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(18, 1, 4, '4.3 Guion de CotizaciÃ³n', '100', 'activo');
/*!40000 ALTER TABLE `ca_item` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_matriz
CREATE TABLE IF NOT EXISTS `ca_matriz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_campana` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_matriz` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_matriz: ~0 rows (aproximadamente)
DELETE FROM `ca_matriz`;
/*!40000 ALTER TABLE `ca_matriz` DISABLE KEYS */;
INSERT INTO `ca_matriz` (`id`, `id_empresa`, `id_campana`, `estado`) VALUES
	(1, 1, 1, 'activo');
/*!40000 ALTER TABLE `ca_matriz` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_monitoreo_asesor
CREATE TABLE IF NOT EXISTS `ca_monitoreo_asesor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agenda_monitoreo` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `id_analista` int(11) NOT NULL,
  `fecha_llamada` date NOT NULL,
  `hora_llamada` time NOT NULL,
  `tipificacion` int(11) NOT NULL,
  `id_llamada` varchar(100) NOT NULL,
  `observacion` text NOT NULL,
  `solucion` int(11) NOT NULL,
  `fallas_audio` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificaicon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_monitoreo_asesor: ~0 rows (aproximadamente)
DELETE FROM `ca_monitoreo_asesor`;
/*!40000 ALTER TABLE `ca_monitoreo_asesor` DISABLE KEYS */;
INSERT INTO `ca_monitoreo_asesor` (`id`, `id_agenda_monitoreo`, `id_asesor`, `id_analista`, `fecha_llamada`, `hora_llamada`, `tipificacion`, `id_llamada`, `observacion`, `solucion`, `fallas_audio`, `fecha_registro`, `fecha_modificaicon`) VALUES
	(1, 1, 14, 4, '2018-09-27', '17:36:00', 1, '25910223', ' Se comunica la Sra. Maria Cristina NiÃ±o solicitando Diovan 80mg * 28 caps, cetirizina 5 mg *10 tabs. Con numero de cÃ©dula 51696940. El Asesor realiza confirmaciÃ³n de datos, agradece los tiempos de espera, gestiÃ³n comercial de productos correcta, hace solicitud de bolsa, confirma valor, hace gestiÃ³n de OAI. Asesor tiene buen tono de llamada, y una asertiva gestiÃ³n  y comunicaciÃ³n con el usuario, maneja la llamada de forna adecuada. OM: Se sugiere realizar confirmaciÃ³n de pedido  a manera de resumen antes de finalizar la llamada. NOTA: 0/100\r\n', 1, 4, '2018-09-28 11:05:39', '2018-09-28 11:05:39');
/*!40000 ALTER TABLE `ca_monitoreo_asesor` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_monitoreo_asesor_detallado
CREATE TABLE IF NOT EXISTS `ca_monitoreo_asesor_detallado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_monitoreo_asesor` int(11) NOT NULL,
  `id_error` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `valor_cumplimiento` int(2) NOT NULL,
  `valor_porcentaje_cumplimiento` int(11) NOT NULL,
  `id_punto_entrenamiento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_monitoreo_asesor_detallado: ~18 rows (aproximadamente)
DELETE FROM `ca_monitoreo_asesor_detallado`;
/*!40000 ALTER TABLE `ca_monitoreo_asesor_detallado` DISABLE KEYS */;
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(1, 1, 1, 1, 1, 20, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(2, 1, 1, 2, 1, 20, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(3, 1, 1, 3, 1, 20, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(4, 1, 1, 4, 1, 20, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(5, 1, 1, 5, 1, 20, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(6, 1, 2, 6, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(7, 1, 2, 7, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(8, 1, 2, 8, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(9, 1, 2, 9, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(10, 1, 3, 10, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(11, 1, 3, 11, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(12, 1, 3, 12, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(13, 1, 3, 13, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(14, 1, 3, 14, 0, 0, 14);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(15, 1, 3, 15, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(16, 1, 4, 16, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(17, 1, 4, 17, 1, 100, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(18, 1, 4, 18, 1, 100, 0);
/*!40000 ALTER TABLE `ca_monitoreo_asesor_detallado` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_punto_entrenamiento
CREATE TABLE IF NOT EXISTS `ca_punto_entrenamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `punto_entrenamiento` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_punto_entrenamiento: ~18 rows (aproximadamente)
DELETE FROM `ca_punto_entrenamiento`;
/*!40000 ALTER TABLE `ca_punto_entrenamiento` DISABLE KEYS */;
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(1, 1, 'El asesor  utiliza guion de saludo/despedida establecido, se presenta como funcionario de Cruz Verde, con su nombre y primer apellido.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(2, 2, 'El asesor estÃ¡ preparado para recibir la llamada una vez ingresa ( contesta antes de los 3 segundos).');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(3, 3, 'El asesor utiliza frases de cortesÃ­a, ritmo de voz adecuado, ni personaliza generando confianza.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(4, 4, 'El asesor  realiza preguntas de sondeo que permita conocer la necesidad del usuario/pregunta si desea la bolsa.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(5, 5, 'El asesor agradece, acompaÃ±a,  justifica y maneja adecuadamente los tiempos de espera (30 segundos).');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(6, 6, 'Omite y/o Informa de manera errada nombre del producto, cantidad, concentraciÃ³n y laboratorio en el caso que sea genÃ©rico, descuento que le aplica por convenio. ');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(7, 7, 'El asesor se hace cargo de la solicitud, brinda alternativa de soluciÃ³n,  cumple con todos los acuerdos generados durante el contacto./Ofrecer pro activamente el domicilio.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(8, 8, '.El asesor interrumpe abrupta y reiteradamente al usuario, el asesor  pierde la calma en la llamada, utiliza frases ofensivas, irÃ³nicos, sarcÃ¡sticos o burlonas.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(9, 9, 'El asesor atiende la llamada inmediatamente ingresa para evitar un cuelgue de llamada por parte del cliente/El asesor induce al cliente a cortar la llamada, debido a un mal acuerdo de espera/Cuelga intencionalmente para terminar la conversaciÃ³n sostenida.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(10, 10, 'El asesor ingresa de manera incorrecta e incompleta la informaciÃ³n en el sistema (nombre del producto, cantidad, concentraciÃ³n y laboratorio en el caso que sea genÃ©rico) convenio/ datos personales/informaciÃ³n entregada por el cliente.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(11, 11, 'El asesor realiza gestiÃ³n comercial del OAI.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(12, 12, 'El asesor entrega las promociones del dÃ­a de acuerdo a la DinÃ¡mica Comercial del mes.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(13, 13, 'El asesor  realiza el proceso de cierre de venta.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(14, 14, 'El asesor confirma toda la informaciÃ³n correspondiente en el momento de confirmar una venta, medio de pago, tiempo de entrega, verificaciÃ³n del pedido y la confirmaciÃ³n del pedido ( producto, concentraciÃ³n, laboratorio, cantidad y valor total de la factura).');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(15, 15, 'El asesor confirma costo del domicilio segÃºn hora/sector/valor del pedido * 9 pm a 6 am debe generarse cobro a todos los pedidos que superen los $25.000 * Los pedidos por debajo de $25.000 se genera automÃ¡tico independiente del horario de solicitud.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(16, 16, 'El asesor  solicita la autorizaciÃ³n del uso de datos personales o lo realiza de forma incorrecta.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(17, 17, 'El asesor entrega el guion de medicamentos AntibiÃ³tico/abortivo y PsiquiÃ¡tricos.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(18, 18, 'El asesor brinda el guion de cotizaciÃ³n con el fin de evitar contratiempos con el usuario final.');
/*!40000 ALTER TABLE `ca_punto_entrenamiento` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_solucion
CREATE TABLE IF NOT EXISTS `ca_solucion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipos` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='matriz tipificación';

-- Volcando datos para la tabla calidad.ca_solucion: ~4 rows (aproximadamente)
DELETE FROM `ca_solucion`;
/*!40000 ALTER TABLE `ca_solucion` DISABLE KEYS */;
INSERT INTO `ca_solucion` (`id`, `tipos`, `estado`) VALUES
	(1, 'Si', 'activo');
INSERT INTO `ca_solucion` (`id`, `tipos`, `estado`) VALUES
	(2, 'No, por el proceso', 'activo');
INSERT INTO `ca_solucion` (`id`, `tipos`, `estado`) VALUES
	(3, 'No, por el agente', 'activo');
INSERT INTO `ca_solucion` (`id`, `tipos`, `estado`) VALUES
	(4, 'No, por el negocio', 'activo');
/*!40000 ALTER TABLE `ca_solucion` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_tipificacion
CREATE TABLE IF NOT EXISTS `ca_tipificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_tipificacion: ~3 rows (aproximadamente)
DELETE FROM `ca_tipificacion`;
/*!40000 ALTER TABLE `ca_tipificacion` DISABLE KEYS */;
INSERT INTO `ca_tipificacion` (`id`, `nombre`, `estado`) VALUES
	(1, 'Si, correctamente', 'activo');
INSERT INTO `ca_tipificacion` (`id`, `nombre`, `estado`) VALUES
	(2, 'Si, incorrectamente', 'activo');
INSERT INTO `ca_tipificacion` (`id`, `nombre`, `estado`) VALUES
	(3, 'No', 'activo');
/*!40000 ALTER TABLE `ca_tipificacion` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.pa_perfiles
CREATE TABLE IF NOT EXISTS `pa_perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.pa_perfiles: ~5 rows (aproximadamente)
DELETE FROM `pa_perfiles`;
/*!40000 ALTER TABLE `pa_perfiles` DISABLE KEYS */;
INSERT INTO `pa_perfiles` (`id`, `perfil`) VALUES
	(1, 'Super Administrador');
INSERT INTO `pa_perfiles` (`id`, `perfil`) VALUES
	(2, 'Administrador');
INSERT INTO `pa_perfiles` (`id`, `perfil`) VALUES
	(3, 'Analista');
INSERT INTO `pa_perfiles` (`id`, `perfil`) VALUES
	(4, 'Lider');
INSERT INTO `pa_perfiles` (`id`, `perfil`) VALUES
	(5, 'Creacion Usuario');
/*!40000 ALTER TABLE `pa_perfiles` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.pa_tipo_error
CREATE TABLE IF NOT EXISTS `pa_tipo_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `error` varchar(250) NOT NULL,
  `siglas` varchar(250) NOT NULL,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.pa_tipo_error: ~6 rows (aproximadamente)
DELETE FROM `pa_tipo_error`;
/*!40000 ALTER TABLE `pa_tipo_error` DISABLE KEYS */;
INSERT INTO `pa_tipo_error` (`id`, `tipo`, `error`, `siglas`, `estado`) VALUES
	(1, 'CRITICO', 'ERROR CRITICO DE CUMPLIMIENTO', 'ECC', 'activo');
INSERT INTO `pa_tipo_error` (`id`, `tipo`, `error`, `siglas`, `estado`) VALUES
	(2, 'CRITICO', 'ERROR CRITICO DE USAURIO FINAL', 'ECUF', 'activo');
INSERT INTO `pa_tipo_error` (`id`, `tipo`, `error`, `siglas`, `estado`) VALUES
	(3, 'CRITICO', 'ERROR CRITICO DE NEGOCIO', 'ECN', 'activo');
INSERT INTO `pa_tipo_error` (`id`, `tipo`, `error`, `siglas`, `estado`) VALUES
	(4, 'NO_CRITICO', 'ERROR NO CRITICO', 'ENC', 'activo');
INSERT INTO `pa_tipo_error` (`id`, `tipo`, `error`, `siglas`, `estado`) VALUES
	(5, 'CRITICO', 'ERROR CRITICO DE SERVICIO', 'ECS', 'activo');
INSERT INTO `pa_tipo_error` (`id`, `tipo`, `error`, `siglas`, `estado`) VALUES
	(6, 'CRITICO', 'ERROR CRITICO DE OPERACIÃ“N', 'ECO', 'activo');
INSERT INTO `pa_tipo_error` (`id`, `tipo`, `error`, `siglas`, `estado`) VALUES
	(7, 'CRITICO', 'PRUEBAS PRUEBAS 12', 'PP12', 'activo');
/*!40000 ALTER TABLE `pa_tipo_error` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.pa_tipo_identificacion
CREATE TABLE IF NOT EXISTS `pa_tipo_identificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.pa_tipo_identificacion: ~3 rows (aproximadamente)
DELETE FROM `pa_tipo_identificacion`;
/*!40000 ALTER TABLE `pa_tipo_identificacion` DISABLE KEYS */;
INSERT INTO `pa_tipo_identificacion` (`id`, `tipo_identificacion`, `estado`) VALUES
	(1, 'C.C.', 'activo');
INSERT INTO `pa_tipo_identificacion` (`id`, `tipo_identificacion`, `estado`) VALUES
	(2, 'C.E.', 'activo');
INSERT INTO `pa_tipo_identificacion` (`id`, `tipo_identificacion`, `estado`) VALUES
	(3, 'NIT.', 'activo');
/*!40000 ALTER TABLE `pa_tipo_identificacion` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_usaurio_ec
CREATE TABLE IF NOT EXISTS `re_usaurio_ec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_campana` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.re_usaurio_ec: ~0 rows (aproximadamente)
DELETE FROM `re_usaurio_ec`;
/*!40000 ALTER TABLE `re_usaurio_ec` DISABLE KEYS */;
/*!40000 ALTER TABLE `re_usaurio_ec` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_usuarios
CREATE TABLE IF NOT EXISTS `re_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tipo_identificacion` int(11) NOT NULL,
  `identificacion` varchar(30) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido1` varchar(250) NOT NULL,
  `apellido2` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Usuarios del sistema';

-- Volcando datos para la tabla calidad.re_usuarios: ~4 rows (aproximadamente)
DELETE FROM `re_usuarios`;
/*!40000 ALTER TABLE `re_usuarios` DISABLE KEYS */;
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `email`, `estado`) VALUES
	(1, 'administrator', '6ac98575f734a0a81561ee43598ae92b962a1217', 1, '123456789', 'Superadministrador', 'Aplicacion', 'Interactivo', 'johan.cortes@interactivo.com.co', 'activo');
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `email`, `estado`) VALUES
	(2, 'lhernandez', '32b58e557f544a935e55c371fef6309a87377347', 1, '101901714', 'Lady Alexandra', 'Hernandez', 'Lopez', 'alexandra.hernandez@interactivo.com.co', 'activo');
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `email`, `estado`) VALUES
	(3, 'mbenites', '1a3447f43ae92b09a5095a77405bfb97ef129d71', 1, '1073234560', 'Maria Angelica', 'Benites ', 'Cardenas', 'maria.benites@interactivo.com.co', 'activo');
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `email`, `estado`) VALUES
	(4, '1087645391', 'ad913fcbe6cefaa64d6bfcbccd47824fe77ad686', 1, '1087645391', 'HAROLD  ANDRES', 'RODRIGUEZ', 'N/A', 'harold.rodriguez@interactivo.com.co', 'activo');
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `email`, `estado`) VALUES
	(5, 'lhernandez8', '0d3c7eaa4307b5b3752811689985624ead40d361', 1, '101901714s', 'lhernandez', 'lhernandez', 'lhernandez', 'g@h.v', 'activo');
/*!40000 ALTER TABLE `re_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_usuario_perfil
CREATE TABLE IF NOT EXISTS `re_usuario_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.re_usuario_perfil: ~4 rows (aproximadamente)
DELETE FROM `re_usuario_perfil`;
/*!40000 ALTER TABLE `re_usuario_perfil` DISABLE KEYS */;
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`) VALUES
	(1, 1, 1);
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`) VALUES
	(2, 2, 2);
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`) VALUES
	(3, 3, 2);
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`) VALUES
	(4, 4, 3);
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`) VALUES
	(5, 5, 3);
/*!40000 ALTER TABLE `re_usuario_perfil` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
