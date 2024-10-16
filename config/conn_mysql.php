<?php
require_once 'config.php';
//Clase de conexión a MySQL 
class MySQL extends PDO{
	//Parametros de conexión a la base de datos
	private $type = MOTOR_MYSQL;
	private $host = HOST_MYSQL;
	private $user = USER_MYSQL;
	private $pass = PASS_MYSQL;
	private $base = DB_MYSQL;
	private $cset = CS_MYSQL;
	//Constructor de conexión a la pase de datos
	public function __construct(){
		//Definicion del string de conexión a la base de datos
		$strc = $this->type.':host='.$this->host.';dbname='.$this->base.';charset='.$this->cset;
		$user = $this->user;
		$pass = $this->pass; 
		//conexión a la base de datos
		try{
			$conn = parent::__construct($strc, $user, $pass);
		} catch(PDOException $e){
			$conn = "Error al conectar la base de datos: ".$e->getMessage()."<br>";
		}
		return $conn;
	}
}


?>