<?php
//Inclusión de archivos de configuración
require 'config.php';
include 'connect.php';
include 'session.php';
include 'cookie.php';
include 'email.php';

//Inclusión de modelos
include '../../'.PATH_MODEL.'/login.php';
include '../../'.PATH_MODEL.'/logout.php';
include '../../'.PATH_MODEL.'/empresas.php';
include '../../'.PATH_MODEL.'/campanas.php';
include '../../'.PATH_MODEL.'/usuarios.php';
include '../../'.PATH_MODEL.'/matriz.php';
include '../../'.PATH_MODEL.'/asesor.php';
include '../../'.PATH_MODEL.'/planmonitoreo.php';
include '../../'.PATH_MODEL.'/agendamonitoreo.php';
include '../../'.PATH_MODEL.'/monitoreo.php';

//Business class
class Business{
	public $return;
	public $url;
	public $conn;
	public $session;
	public $cookie;
	public $post;
	public $get;
	public $files;
	public $db;
	public $date;
	public $email;

 	//Business class builder
	function __construct(){
		//Definition response scheme
		$this->return = new stdClass();
		$this->return->bool = MENSSAGE_BOOL;
		$this->return->msg = MENSSAGE_DEFAULT;
		$this->url = URL_ACCESS;
		$this->conn = new Connect();
		$this->session = new Session();
		$this->cookie = new Cookie();
		$this->post = ((object) $_POST);
		$this->get = ((object) $_GET);
		$this->files = ((object) $_FILES);
		$this->db = DATABASE;
		$this->date = date('Y-m-d');
		$this->email = new Email();
 	}
}
?>