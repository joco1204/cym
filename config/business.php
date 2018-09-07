<?php
//Include models
include 'connect.php';
include 'session.php';
include '../../app/model/login.php';
include '../../app/model/logout.php';
include '../../app/model/empresas.php';
include '../../app/model/campanas.php';
include '../../app/model/usuarios.php';
include '../../app/model/matriz.php';
include '../../app/model/asesor.php';
include '../../app/model/planmonitoreo.php';
include '../../app/model/agendamonitoreo.php';
include '../../app/model/monitoreo.php';
//Business class
class Business{
	public $return;
	public $conn;
	public $db;
	public $post;
 	//Business class builder
	function __construct(){
		//Definition response scheme
		$this->return = new stdClass();
		$this->return->bool = false;
		$this->return->msg = 'Respuesta no ha sido asignada';
		$this->conn = new Connect();
		$this->session = new Session();
		$this->post = ((object) $_POST);
		$this->get = ((object) $_GET);
		$this->files = ((object) $_FILES);
		$this->db = 'calidad';
		$this->date = date('Y-m-d');
 	}
} 
?>