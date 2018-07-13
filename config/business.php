<?php
//Include models
include 'connect.php';
include 'session.php';
include '../../app/model/login.php';
include '../../app/model/logout.php';
include '../../app/model/clientes.php';
include '../../app/model/servicios.php';
include '../../app/model/segmentos.php';
include '../../app/model/usuarios.php';
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
		$this->return->msg = 'Answer has not been assigned';
		$this->conn = new Connect();
		$this->session = new Session();
		$this->post = ((object) $_POST);
		$this->get = ((object) $_GET);
		$this->db = 'appdb';
 	}
} 
?>