-- --------------------------------------------------------
-- Host:                         192.168.100.143
-- Versión del servidor:         5.6.37 - MySQL Community Server (GPL)
-- SO del servidor:              Linux
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

-- Volcando datos para la tabla calidad.ca_agenda_monitoreo: ~0 rows (aproximadamente)
DELETE FROM `ca_agenda_monitoreo`;
/*!40000 ALTER TABLE `ca_agenda_monitoreo` DISABLE KEYS */;
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

-- Volcando datos para la tabla calidad.ca_asesores: ~1 rows (aproximadamente)
DELETE FROM `ca_asesores`;
/*!40000 ALTER TABLE `ca_asesores` DISABLE KEYS */;
INSERT INTO `ca_asesores` (`id`, `id_empresa`, `id_campana`, `identificacion`, `nombres`, `apellidos`, `estado`) VALUES
	(1, 1, 1, '1026586163', 'YESIKA JOHANA ', 'GARCIA DIAZ', 'activo');
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

-- Volcando datos para la tabla calidad.ca_campana: ~1 rows (aproximadamente)
DELETE FROM `ca_campana`;
/*!40000 ALTER TABLE `ca_campana` DISABLE KEYS */;
INSERT INTO `ca_campana` (`id`, `campana`, `id_empresa`, `estado`) VALUES
	(1, 'Ventas', 1, 'activo');
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
	(1, 'Cruz Verde', '', 'activo');
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

-- Volcando datos para la tabla calidad.ca_error: ~5 rows (aproximadamente)
DELETE FROM `ca_error`;
/*!40000 ALTER TABLE `ca_error` DISABLE KEYS */;
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(1, 1, '4', 'por', 'activo');
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(2, 2, '4', 'por', 'activo');
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(3, 2, '2', 'por', 'activo');
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(4, 2, '3', 'por', 'activo');
INSERT INTO `ca_error` (`id`, `id_matriz`, `tipo_error`, `calculo_valor`, `estado`) VALUES
	(5, 2, '1', 'por', 'activo');
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
	(1, 2, 2, '1.1 Guion de bienvenida/despedida', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(2, 2, 2, '1.2 Atender de inmediato la llamada', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(3, 2, 2, '1.3 EmpatÃ­a', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(4, 2, 2, '1.4 Entender la necesidad del cliente', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(5, 2, 2, '1.5 Manejar tiempos de espera', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(6, 2, 3, '2.1 Brindar informaciÃ³n incorrecta e incompleta', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(7, 2, 3, '2.2 Hacerse cargo de la solicitud del cliente', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(8, 2, 3, '2.3 Pierde la calma durante la llamada.', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(9, 2, 3, '2.4 El asesor provoca cuelgue de llamada o cuelga la llamada', '20', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(10, 2, 4, '3.1 Ingresa informaciÃ³n incorrecta e incompleta en los aplicativos', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(11, 2, 4, '3.2 GestiÃ³n comercial del OAI', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(12, 2, 4, '3.3 InformaciÃ³n de PromociÃ³n', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(13, 2, 4, '3.4 Realizar cierres de venta', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(14, 2, 4, '3.5 ConfirmaciÃ³n de venta ', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(15, 2, 4, '3.6 ConfirmaciÃ³n costo del Domicilio', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(16, 2, 5, '4.1 Habeas Data', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(17, 2, 5, '4.2 Guion de formula Medica', '100', 'activo');
INSERT INTO `ca_item` (`id`, `id_matriz`, `id_error`, `item`, `valor`, `estado`) VALUES
	(18, 2, 5, '4.3 Guion de CotizaciÃ³n', '100', 'activo');
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

-- Volcando datos para la tabla calidad.ca_matriz: ~2 rows (aproximadamente)
DELETE FROM `ca_matriz`;
/*!40000 ALTER TABLE `ca_matriz` DISABLE KEYS */;
INSERT INTO `ca_matriz` (`id`, `id_empresa`, `id_campana`, `estado`) VALUES
	(1, 1, 1, 'activo');
INSERT INTO `ca_matriz` (`id`, `id_empresa`, `id_campana`, `estado`) VALUES
	(2, 1, 1, 'activo');
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

-- Volcando datos para la tabla calidad.ca_monitoreo_asesor_detallado: ~0 rows (aproximadamente)
DELETE FROM `ca_monitoreo_asesor_detallado`;
/*!40000 ALTER TABLE `ca_monitoreo_asesor_detallado` DISABLE KEYS */;
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
	(3, 3, 'El asesor utiliza frases de cortesÃ­a, ritmo de voz adecuado, ni personaliza generando confianza ');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(4, 4, 'El asesor  realiza preguntas de sondeo que permita conocer la necesidad del usuario/pregunta si desea la bolsa.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(5, 5, 'El asesor agradece, acompaÃ±a,  justifica y maneja adecuadamente los tiempos de espera (30 segundos).');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(6, 6, 'Omite y/o Informa de manera errada nombre del producto, cantidad, concentraciÃ³n y laboratorio en el caso que sea genÃ©rico, descuento que le aplica por convenio. ');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(7, 7, 'El asesor se hace cargo de la solicitud, brinda alternativa de soluciÃ³n,  cumple con todos los acuerdos generados durante el contacto./Ofrecer proactivamente el domicilio/ ');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(8, 8, '.El asesor interrumpe abrupta y reiteradamente al usuario, el asesor  pierde la calma en la llamada, utiliza frases ofensivas, irÃ³nicos, sarcÃ¡sticos o burlonas.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(9, 9, 'El asesor atiende la llamada inmediatamente ingresa para evitar un cuelgue de llamada por parte del cliente/El asesor induce al cliente a cortar la llamada, debido a un mal acuerdo de espera/Cuelga intencionalmente para terminar la conversaciÃ³n sostenida.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(10, 10, 'El asesor ingresa de manera incorrecta e incompleta la informaciÃ³n en el sistema (nombre del producto, cantidad, concentraciÃ³n y laboratorio en el caso que sea genÃ©rico) convenio/ datos personales/informaciÃ³n entregada por el cliente');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(11, 11, 'El asesor realiza gestiÃ³n comercial del OAI.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(12, 12, 'El asesor entrega las promociones del dÃ­a de acuerdo a la DinÃ¡mica Comercial del mes');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(13, 13, 'El asesor  realiza el proceso de cierre de venta.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(14, 14, 'El asesor confirma toda la informaciÃ³n correspondiente en el momento de confirmar una venta, medio de pago, tiempo de entrega, verificaciÃ³n del pedido y la confirmaciÃ³n del pedido ( producto, concentraciÃ³n, laboratorio, cantidad y valor total de la factura).');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(15, 15, '"El asesor confirma costo del domicilio segÃºn hora/sector/valor del pedido * 9 pm a 6 am debe generarse cobro a todos los pedidos que superen los $25.000 * Los pedidos por debajo de $25.000 se genera automÃ¡tico independiente del horario de solicitud"');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(16, 16, 'El asesor  solicita la autorizaciÃ³n del uso de datos personales o lo realiza de forma incorrecta.');
INSERT INTO `ca_punto_entrenamiento` (`id`, `id_item`, `punto_entrenamiento`) VALUES
	(17, 17, 'El asesor entrega el guion de medicamentos AntibiÃ³tico/abortivo y PsiquiÃ¡tricos');
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

-- Volcando datos para la tabla calidad.re_usuarios: ~1 rows (aproximadamente)
DELETE FROM `re_usuarios`;
/*!40000 ALTER TABLE `re_usuarios` DISABLE KEYS */;
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `email`, `estado`) VALUES
	(1, 'administrator', '6ac98575f734a0a81561ee43598ae92b962a1217', 1, '123456789', 'Superadministrador', 'Aplicacion', 'Interactivo', 'johan.cortes@interactivo.com.co', 'activo');
INSERT INTO `re_usuarios` (`id`, `usuario`, `password`, `tipo_identificacion`, `identificacion`, `nombre`, `apellido1`, `apellido2`, `email`, `estado`) VALUES
	(2, 'lhernandez', '171b04070233d26065b589d4f2b0f3c1b8d4bddf', 1, '101901714', 'Lady Alexandra', 'Hernandez', 'Lopez', 'alexandra.hernandez@interactivo.com.co', 'activo');
/*!40000 ALTER TABLE `re_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla calidad.re_usuario_perfil
CREATE TABLE IF NOT EXISTS `re_usuario_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla calidad.re_usuario_perfil: ~1 rows (aproximadamente)
DELETE FROM `re_usuario_perfil`;
/*!40000 ALTER TABLE `re_usuario_perfil` DISABLE KEYS */;
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`) VALUES
	(1, 1, 1);
INSERT INTO `re_usuario_perfil` (`id`, `id_usuario`, `id_perfil`) VALUES
	(2, 2, 2);
/*!40000 ALTER TABLE `re_usuario_perfil` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
