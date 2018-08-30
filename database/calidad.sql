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

-- Volcando datos para la tabla calidad.ca_agenda_monitoreo: ~3 rows (aproximadamente)
DELETE FROM `ca_agenda_monitoreo`;
/*!40000 ALTER TABLE `ca_agenda_monitoreo` DISABLE KEYS */;
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(1, 1, 1, 1, '2018-08-29', 1);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(2, 1, 1, 2, '2018-08-29', 1);
INSERT INTO `ca_agenda_monitoreo` (`id`, `id_empresa`, `id_campana`, `id_asesor`, `fecha_monitoreo`, `estado`) VALUES
	(3, 1, 1, 2, '2018-08-30', 0);
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

-- Volcando datos para la tabla calidad.ca_asesores: ~2 rows (aproximadamente)
DELETE FROM `ca_asesores`;
/*!40000 ALTER TABLE `ca_asesores` DISABLE KEYS */;
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(1, 1, 1, '1013645455', 'Angie', 'Moyano', 'activo');
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(2, 1, 1, '1023875261', 'Johan', 'Cortes', 'activo');
/*!40000 ALTER TABLE `ca_asesores` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_campana
CREATE TABLE IF NOT EXISTS `ca_campana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campana` varchar(100) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_campana: ~1 rows (aproximadamente)
DELETE FROM `ca_campana`;
/*!40000 ALTER TABLE `ca_campana` DISABLE KEYS */;
INSERT INTO `ca_campana` (`id`, `campana`, `id_empresa`, `estado`) VALUES
	(1, 'INBOUND', 1, 'activo');
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

-- Volcando datos para la tabla calidad.ca_empresa: ~1 rows (aproximadamente)
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

-- Volcando datos para la tabla calidad.ca_error: ~2 rows (aproximadamente)
DELETE FROM `ca_error`;
/*!40000 ALTER TABLE `ca_error` DISABLE KEYS */;
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(1, 1, '4', 'sum', 'activo');
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(2, 1, '3', 'por', 'activo');
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

-- Volcando datos para la tabla calidad.ca_item: ~4 rows (aproximadamente)
DELETE FROM `ca_item`;
/*!40000 ALTER TABLE `ca_item` DISABLE KEYS */;
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(1, 1, 1, 'Guión de bienvenida y despedida', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(2, 1, 1, 'Atender la llamada inmediata', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(3, 1, 1, 'Empatía', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(4, 1, 2, 'Ingresa información incorrecta e incompleta en los aplicativos', '100', 'activo');
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

-- Volcando datos para la tabla calidad.ca_matriz: ~1 rows (aproximadamente)
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
  `observacion` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_monitoreo_asesor: ~2 rows (aproximadamente)
DELETE FROM `ca_monitoreo_asesor`;
/*!40000 ALTER TABLE `ca_monitoreo_asesor` DISABLE KEYS */;
INSERT INTO `ca_monitoreo_asesor` (`id`, `id_agenda_monitoreo`, `id_asesor`, `id_analista`, `fecha_llamada`, `hora_llamada`, `observacion`) VALUES
	(1, 1, 1, 2, '2018-08-23', '10:45:00', 'Pruebas');
INSERT INTO `ca_monitoreo_asesor` (`id`, `id_agenda_monitoreo`, `id_asesor`, `id_analista`, `fecha_llamada`, `hora_llamada`, `observacion`) VALUES
	(2, 2, 2, 2, '2018-08-17', '17:55:00', 'Pruebas');
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

-- Volcando datos para la tabla calidad.ca_monitoreo_asesor_detallado: ~8 rows (aproximadamente)
DELETE FROM `ca_monitoreo_asesor_detallado`;
/*!40000 ALTER TABLE `ca_monitoreo_asesor_detallado` DISABLE KEYS */;
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(1, 1, 1, 1, 0, 0, 1);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(2, 1, 1, 2, 1, 20, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(3, 1, 1, 3, 1, 20, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(4, 1, 2, 4, 0, 0, 4);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(5, 2, 1, 1, 1, 20, 0);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(6, 2, 1, 2, 0, 0, 2);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(7, 2, 1, 3, 0, 0, 3);
INSERT INTO `ca_monitoreo_asesor_detallado` (`id`, `id_monitoreo_asesor`, `id_error`, `id_item`, `valor_cumplimiento`, `valor_porcentaje_cumplimiento`, `id_punto_entrenamiento`) VALUES
	(8, 2, 2, 4, 0, 0, 4);
/*!40000 ALTER TABLE `ca_monitoreo_asesor_detallado` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.ca_punto_entrenamiento
CREATE TABLE IF NOT EXISTS `ca_punto_entrenamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `punto_entrenamiento` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.ca_punto_entrenamiento: ~4 rows (aproximadamente)
DELETE FROM `ca_punto_entrenamiento`;
/*!40000 ALTER TABLE `ca_punto_entrenamiento` DISABLE KEYS */;
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(1, 1, 'El asesor utiliza el guión de saludo');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(2, 2, 'El asesor esta preparado para recibir la llamada una vez ingresa (Contesta antes de 3 segundos)');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(3, 3, 'El asesor utiliza frases de cortesía, ritmo de voz adecuado, no personaliza generando confianza');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(4, 4, 'El asesor ingresa de manera incorrecta e incompleta la información en el sistema.');
/*!40000 ALTER TABLE `ca_punto_entrenamiento` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.pa_ciudad
CREATE TABLE IF NOT EXISTS `pa_ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` int(11) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.pa_ciudad: ~32 rows (aproximadamente)
DELETE FROM `pa_ciudad`;
/*!40000 ALTER TABLE `pa_ciudad` DISABLE KEYS */;
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(1, 1, 'Bogotá D.C.', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(2, 1, 'Medellin', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(3, 1, 'Cali', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(4, 1, 'Barranquilla', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(5, 1, 'Bucaramanga', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(6, 1, 'Cartagena', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(7, 1, 'Santa Marta', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(8, 1, 'Popayan', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(9, 1, 'Pasto', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(10, 1, 'Armenia', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(11, 1, 'Pereira', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(12, 1, 'Manizales', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(13, 1, 'Cúcuta', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(14, 1, 'Valledupar', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(15, 1, 'Montería', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(16, 1, 'Sincelejo', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(17, 1, 'Tunja', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(18, 1, 'Villavicencio', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(19, 1, 'Ibagué', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(20, 1, 'Leticia', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(21, 1, 'San Andrés', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(22, 1, 'Quibdó', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(23, 1, 'San Jose del Guaviare', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(24, 1, 'Mitú', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(25, 1, 'Puerto Carreño', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(26, 1, 'Puerto Inírida', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(27, 1, 'Yopal', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(28, 1, 'Rioacha', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(29, 1, 'Mocoa', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(30, 1, 'Neiva', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(31, 1, 'Florencia', 'activo');
INSERT INTO `pa_ciudad` (`id`, `id_pais`, `ciudad`, `estado`) VALUES
	(32, 1, 'Arauca', 'activo');
/*!40000 ALTER TABLE `pa_ciudad` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.pa_pais
CREATE TABLE IF NOT EXISTS `pa_pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pais_UNIQUE` (`pais`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.pa_pais: ~0 rows (aproximadamente)
DELETE FROM `pa_pais`;
/*!40000 ALTER TABLE `pa_pais` DISABLE KEYS */;
INSERT INTO `pa_pais` (`id`, `pais`, `estado`) VALUES
	(1, 'Colombia', 'activo');
/*!40000 ALTER TABLE `pa_pais` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.pa_perfiles
CREATE TABLE IF NOT EXISTS `pa_perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(100) NOT NULL,
  `descripcion` text,
  `usuario_registro` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificacion` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `ip_registro` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `perfil_UNIQUE` (`perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.pa_perfiles: ~4 rows (aproximadamente)
DELETE FROM `pa_perfiles`;
/*!40000 ALTER TABLE `pa_perfiles` DISABLE KEYS */;
INSERT INTO `pa_perfiles` (`id`, `perfil`, `descripcion`, `usuario_registro`, `fecha_registro`, `usuario_modificacion`, `fecha_modificacion`, `ip_registro`, `estado`) VALUES
	(1, 'Super Administrador', 'Super Administrador', 1, '2017-05-09 09:11:15', 1, '2017-05-09 14:11:15', '200.119.116.109', 'activo');
INSERT INTO `pa_perfiles` (`id`, `perfil`, `descripcion`, `usuario_registro`, `fecha_registro`, `usuario_modificacion`, `fecha_modificacion`, `ip_registro`, `estado`) VALUES
	(2, 'Administrador', 'Administrador', 1, '2017-05-11 11:26:59', 1, '2017-05-11 16:26:59', '200.119.116.109', 'activo');
INSERT INTO `pa_perfiles` (`id`, `perfil`, `descripcion`, `usuario_registro`, `fecha_registro`, `usuario_modificacion`, `fecha_modificacion`, `ip_registro`, `estado`) VALUES
	(3, 'Analista', 'Analista', 1, '2017-05-11 11:59:23', 1, '2017-05-11 16:59:23', '200.119.116.109', 'activo');
INSERT INTO `pa_perfiles` (`id`, `perfil`, `descripcion`, `usuario_registro`, `fecha_registro`, `usuario_modificacion`, `fecha_modificacion`, `ip_registro`, `estado`) VALUES
	(4, 'Lider', 'Lider', 1, '2017-05-11 12:00:24', 1, '2017-05-11 17:00:24', '200.119.116.109', 'activo');
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

-- Volcando datos para la tabla calidad.pa_tipo_error: ~4 rows (aproximadamente)
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

-- Volcando estructura para tabla calidad.re_cargo
CREATE TABLE IF NOT EXISTS `re_cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(100) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_registro` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_mdificacion` int(11) NOT NULL,
  `ip_registro` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `cargo_UNIQUE` (`cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.re_cargo: ~4 rows (aproximadamente)
DELETE FROM `re_cargo`;
/*!40000 ALTER TABLE `re_cargo` DISABLE KEYS */;
INSERT INTO `re_cargo` (`id`, `cargo`, `id_sede`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_mdificacion`, `ip_registro`, `estado`) VALUES
	(1, 'Super Administrador', 1, '2017-05-09 09:12:13', 1, '2017-05-09 14:12:13', 1, '200.119.116.109', 'activo');
INSERT INTO `re_cargo` (`id`, `cargo`, `id_sede`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_mdificacion`, `ip_registro`, `estado`) VALUES
	(2, 'Administrador', 1, '2017-05-11 12:11:12', 1, '2017-05-11 17:11:12', 1, '200.119.116.109', 'activo');
INSERT INTO `re_cargo` (`id`, `cargo`, `id_sede`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_mdificacion`, `ip_registro`, `estado`) VALUES
	(3, 'Coordinador', 1, '2017-05-11 12:13:10', 1, '2017-05-11 17:13:10', 1, '200.119.116.109', 'activo');
INSERT INTO `re_cargo` (`id`, `cargo`, `id_sede`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_mdificacion`, `ip_registro`, `estado`) VALUES
	(4, 'Supervisor', 1, '2017-05-11 12:14:02', 1, '2017-05-11 17:14:02', 1, '200.119.116.109', 'activo');
/*!40000 ALTER TABLE `re_cargo` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_empresa
CREATE TABLE IF NOT EXISTS `re_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(30) NOT NULL,
  `dv` varchar(2) NOT NULL,
  `razon_social` varchar(250) NOT NULL,
  `web` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_registro` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_modifica` int(11) NOT NULL,
  `ip_registro` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `nit_UNIQUE` (`nit`),
  UNIQUE KEY `razon_social_UNIQUE` (`razon_social`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.re_empresa: ~0 rows (aproximadamente)
DELETE FROM `re_empresa`;
/*!40000 ALTER TABLE `re_empresa` DISABLE KEYS */;
INSERT INTO `re_empresa` (`id`, `nit`, `dv`, `razon_social`, `web`, `logo`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modifica`, `ip_registro`, `estado`) VALUES
	(1, '999999999', '9', 'Empresa Prueba S.A.', NULL, NULL, '2017-05-09 08:54:03', 1, '2017-05-09 13:54:03', 1, '200.119.116.109', 'activo');
/*!40000 ALTER TABLE `re_empresa` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_personas
CREATE TABLE IF NOT EXISTS `re_personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` int(11) NOT NULL,
  `identificacion` varchar(30) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido1` varchar(250) NOT NULL,
  `apellido2` varchar(250) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `cargo` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_registro` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `ip_registro` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `identificacion_UNIQUE` (`identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.re_personas: ~4 rows (aproximadamente)
DELETE FROM `re_personas`;
/*!40000 ALTER TABLE `re_personas` DISABLE KEYS */;
INSERT INTO `re_personas` (`id`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `fecha_nacimiento`, `cargo`, `email`, `id_usuario`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(1, 1, '999999999', 'Super', 'Administrador', '', '0000-00-00', 1, 'admin@admin.com', 1, '2017-05-09 10:07:41', 1, '2017-05-09 15:07:41', 1, '200.119.116.109', 'activo');
INSERT INTO `re_personas` (`id`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `fecha_nacimiento`, `cargo`, `email`, `id_usuario`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(2, 1, '888888888', 'Administrador', 'Aplicacion', '', '0000-00-00', 2, 'admin@logisticscm.com', 2, '2017-05-11 12:28:04', 1, '2017-05-11 17:28:04', 1, '200.119.116.109', 'activo');
INSERT INTO `re_personas` (`id`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `fecha_nacimiento`, `cargo`, `email`, `id_usuario`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(3, 1, '777777777', 'Analista', 'Campana', '', '0000-00-00', 3, 'coordinador@logisticscm.com', 3, '2017-05-11 12:28:04', 1, '2017-05-11 17:28:04', 1, '200.119.116.109', 'activo');
INSERT INTO `re_personas` (`id`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `fecha_nacimiento`, `cargo`, `email`, `id_usuario`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(4, 1, '666666666', 'Lider', 'Campana', '', '0000-00-00', 4, 'supervisor@logisticscm.com', 4, '2017-05-11 12:28:04', 1, '2017-05-11 17:28:04', 1, '200.119.116.109', 'activo');
/*!40000 ALTER TABLE `re_personas` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_sede_empresa
CREATE TABLE IF NOT EXISTS `re_sede_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `sede` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono_uno` varchar(30) DEFAULT NULL,
  `telefono_dos` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_registro` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `ip_registro` varchar(255) DEFAULT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `sede_UNIQUE` (`sede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.re_sede_empresa: ~0 rows (aproximadamente)
DELETE FROM `re_sede_empresa`;
/*!40000 ALTER TABLE `re_sede_empresa` DISABLE KEYS */;
INSERT INTO `re_sede_empresa` (`id`, `id_empresa`, `id_pais`, `id_ciudad`, `sede`, `direccion`, `telefono_uno`, `telefono_dos`, `celular`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(1, 1, 1, 1, 'Principal', 'Calle 36 Sur  # 1 A - 29', '3625129', NULL, '3022660334', '2017-05-09 09:10:12', 1, '2017-05-09 14:10:12', 1, '200.119.116.109', 'activo');
/*!40000 ALTER TABLE `re_sede_empresa` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_usuarios
CREATE TABLE IF NOT EXISTS `re_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_registro` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `ip_registro` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Usuarios del sistema';

-- Volcando datos para la tabla calidad.re_usuarios: ~4 rows (aproximadamente)
DELETE FROM `re_usuarios`;
/*!40000 ALTER TABLE `re_usuarios` DISABLE KEYS */;
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `empresa_id`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(1, 'admin', '8e34e1c6a02283d62e5d1b95986eeefbf5be6a8d', 1, '2017-05-09 10:23:17', 1, '2017-05-09 15:23:17', 1, '200.119.116.109', 'activo');
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `empresa_id`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(2, 'administrador', '9dbf7c1488382487931d10235fc84a74bff5d2f4', 1, '2017-05-11 12:18:46', 1, '2017-05-11 17:18:46', 1, '200.119.116.109', 'activo');
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `empresa_id`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(3, 'analista', '016442bc8a8d2e20bfd97fed8797d4d154811f8e', 1, '2017-05-11 12:19:15', 1, '2017-05-11 17:19:15', 1, '200.119.116.109', 'activo');
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `empresa_id`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(4, 'lider', 'a374ab25015014aa0f2a40745ff9a82549b11149', 1, '2017-05-11 12:19:56', 1, '2017-05-11 17:19:56', 1, '200.119.116.109', 'activo');
/*!40000 ALTER TABLE `re_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_usuario_perfil
CREATE TABLE IF NOT EXISTS `re_usuario_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_registro` int(11) NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_modificacion` int(11) NOT NULL,
  `ip_registro` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `id_perfil_UNIQUE` (`id_perfil`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.re_usuario_perfil: ~4 rows (aproximadamente)
DELETE FROM `re_usuario_perfil`;
/*!40000 ALTER TABLE `re_usuario_perfil` DISABLE KEYS */;
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(1, 1, 1, '2017-05-09 10:20:58', 1, '2017-05-09 15:20:58', 1, '200.119.116.109', 'activo');
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(2, 2, 2, '2017-05-11 12:22:07', 1, '2017-05-09 15:20:58', 1, '200.119.116.109', 'activo');
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(3, 3, 3, '2017-05-11 12:22:34', 1, '2017-05-11 17:22:34', 1, '200.119.116.109', 'activo');
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`, `fecha_registro`, `usuario_registro`, `fecha_modificacion`, `usuario_modificacion`, `ip_registro`, `estado`) VALUES
	(4, 4, 4, '2017-05-11 12:22:59', 1, '2017-05-11 17:22:59', 1, '200.119.116.109', 'activo');
/*!40000 ALTER TABLE `re_usuario_perfil` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.session
CREATE TABLE IF NOT EXISTS `session` (
  `id_session` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `ip_registro` varchar(30) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.session: ~0 rows (aproximadamente)
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
