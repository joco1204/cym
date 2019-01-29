<?php
//Inclusión de archivos de configuración
require 'config.php';
include 'conn_mysql.php';
include 'conn_sqlsrv.php';
include 'ldap.php';
include 'session.php';
include 'cookie.php';
include 'email.php';

//Inclusión de modelos
include '../../'.PATH_MODEL.'/login.php';
include '../../'.PATH_MODEL.'/loginldap.php';
include '../../'.PATH_MODEL.'/logout.php';
include '../../'.PATH_MODEL.'/empresas.php';
include '../../'.PATH_MODEL.'/campanas.php';
include '../../'.PATH_MODEL.'/usuarios.php';
include '../../'.PATH_MODEL.'/matriz.php';
include '../../'.PATH_MODEL.'/asesor.php';
include '../../'.PATH_MODEL.'/planmonitoreo.php';
include '../../'.PATH_MODEL.'/agendamonitoreo.php';
include '../../'.PATH_MODEL.'/monitoreo.php';
include '../../'.PATH_MODEL.'/validacion.php';
include '../../'.PATH_MODEL.'/pruebasqlsrv.php';

//Business class
class Business{
	public $return;
	public $url;
	public $mysql;
	public $sqlsrv_val;
	public $ldap;
	public $session;
	public $cookie;
	public $post;
	public $get;
	public $files;
	public $db_mysql;
	public $db_sqlsrv_val;
	public $date;
	public $email;

 	//Business class builder
	function __construct(){
		//Definition response scheme
		$this->return = new stdClass();
		$this->return->bool = MENSSAGE_BOOL;
		$this->return->msg = MENSSAGE_DEFAULT;
		$this->url = URL_ACCESS;
		$this->mysql = new MySQL();
		//Conexión de base de datos MS SQL Server de validación
		$this->sqlsrv_val = new SQLSRV();
		$this->ldap = new Ldap();
		$this->session = new Session();
		$this->cookie = new Cookie();
		$this->post = ((object) $_POST);
		$this->get = ((object) $_GET);
		$this->files = ((object) $_FILES);
		$this->db_mysql = DB_MYSQL;
		$this->db_sqlsrv_val = DB_SQLSRV_VAL;
		$this->date = date('Y-m-d');
		$this->email = new Email();
 	}
}
?>