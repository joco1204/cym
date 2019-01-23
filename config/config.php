<?php
define('URL_ACCESS', 'http://localhost/cyberactivo/');
/************************************************/
/* Conexión al directorio activo */
//Dominio ldap
define('LDAP_HOST', 'interactivo.com.co');
//DN de ldap
define('LDAP_DN', 'dc=interactivo,dc=com,dc=co');
/************************************************/
/* Datos de conexión a MySQL */
//Motor de la base de datos
define('MOTOR_MYSQL', 'mysql');
//Host de la base de datos
define('HOST_MYSQL', 'localhost');
//Usuario de la base de datos
define('USER_MYSQL', 'root');
//Contraseña de base de datos
define('PASS_MYSQL', '');
//Nombre de la base de datos
define('DB_MYSQL', 'cyberactivo');
//Cotejamiento de caracteres
define('CS_MYSQL', 'utf8');
/************************************************/
/* Datos de conexión a MS SQL Server */
//Motor de la base de datos
define('MOTOR_SQLSRV', 'sqlsrv');
//Host de la base de datos
define('HOST_SQLSRV', '192.168.100.168\BI_ICC, 51473');
//Usuario de la base de datos
define('USER_SQLSRV', 'sa');
//Contraseña de base de datos
define('PASS_SQLSRV', 'Quilontes$$2');
//Nombre de la base de datos
define('DB_SQLSRV', 'BOD_TARIFICADOR_PBA');
/************************************************/
//Respuesta valor por defecto
define('MENSSAGE_BOOL', false);
//Mensaje por defecto
define('MENSSAGE_DEFAULT', 'Respuesta no ha sido asignada');
//Raiz de vistas
define('PATH_VIEW', 'app/view');
//Raiz de modelos
define('PATH_MODEL', 'app/model');
//Raiz de controladores
define('PATH_CONTROLLER', 'app/controller');
//Envío de email
define('SEND_EMAIL', true);
//Host de correo
define('HOST_EMAIL', 'correo.interactivo.com.co');
//Autenticación por SMTP
define('SMTP_AUTH', true);
//Correo electrónico
define('USER_EMAIL', 'aplicativo.calidad@interactivo.com.co');
//Usuario correo electrónico
define('PASS_EMAIL', '1Nt3r4ct1v0');
//Puerto salida correo electrónico
define('PORT_EMAIL', 25);
//Nombre de propietario email
define('NAME_EMAIL', 'Portal Cyberactivo');
?>