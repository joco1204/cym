<?php
//Clase de conexión a MySQL 
class Connect extends PDO{
	//Parametros de conexión a la base de datos
	private $type = 'mysql';
	private $host = 'localhost';
	private $user = 'root';
	private $pass = 'CortesHoyos1$';
	private $base = 'calidad';
	//Constructor de conexión a la pase de datos
	public function __construct(){
		//Definicion del string de conexión a la base de datos
		$strc = $this->type.':host='.$this->host.';dbname='.$this->base;
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