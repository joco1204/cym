<?php
require_once 'config.php';
//Clase de conexión a MS SQL Server 
class SQLSRV extends PDO{
	//Parametros de conexión a la base de datos
	private $type = MOTOR_SQLSRV;
	private $host = HOST_SQLSRV;
	//Constructor de conexión a la pase de datos
	public function __construct($user, $pass, $db){
		//Definicion del string de conexión a la base de datos
		$strc = $this->type.':server='.$this->host.';database='.$db;
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