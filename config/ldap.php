<?php
require_once 'config.php';
//Clase de conexión al directorio activo LDAP
class Ldap{
	//Parametros de conexión al directorio activo
	private $host = LDAP_HOST;
	private $dn = LDAP_DN;
	private $conn;
	//Constructor de la conexión a base de datos
	function __construct(){
		try{
			$this->conn = ldap_connect("ldap://".$this->host);
			ldap_set_option($this->conn, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($this->conn, LDAP_OPT_REFERRALS, 0);
			ldap_set_option($this->conn, LDAP_OPT_SIZELIMIT, 50);
		} catch(Exception $e){
			$this->conn = "Error al conectar : ".$e->getMessage()."<br>";
		}
		return $this->conn;
	}
	//Método de login 
	public function userldap($user, $pass){
		$msg = false;
		$login = ldap_bind($this->conn, "{$user}@{$this->host}", $pass);
		if($login){
	        $msg = true;
	    } else {
	        $msg = false;
	    }
	    return $msg;
	}	
}
?>