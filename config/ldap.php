<?php
require_once 'config.php';
//Clase de conexión al directorio activo LDAP
class Ldap{
	//Parametros de conexión al directorio activo
	private $dominio = LDAP_DOMINIO;
	private $dn = LDAP_DN;
	//
	function __construct(){
		$this->dominio;
		$this->dn;
		try{
			$conn = ldap_connect("ldap://{this->$dominio}");
		} catch(Exception $e){
			$conn = "Error al conectar : ".$e->getMessage()."<br>";
		}

		return $conn;
	}
}
?>