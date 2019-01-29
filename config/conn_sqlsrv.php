<?php
require_once 'config.php';
//Clase de conexión a MS SQL Server 
class SQLSRV extends PDO{
	//Parametros de conexión a la base de datos
	private $type = MOTOR_SQLSRV;
	private $host = HOST_SQLSRV;
	private $user = USER_SQLSRV_VAL;
	private $pass = PASS_SQLSRV_VAL;
	private $db = DB_SQLSRV_VAL;
	//Constructor de conexión a la pase de datos
	public function __construct(){
		//Definicion del string de conexión a la base de datos
		$strc = $this->type.':server='.$this->host.';database='.$this->db;
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