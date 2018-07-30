<?php 
class Calificacion{
	function __construct(){
		$this->business = new Business();
	}
	
	public function tabla_calificacion(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT * FROM ca_cliente;";
			$result = $conn->query($query);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					array_push($arrayTabla, $row);
				}
				$this->business->return->bool = true;
				$this->business->return->msg = json_encode($arrayTabla);
			} else {
				$this->business->return->bool = false;
				$this->business->return->msg = 'Error query';
			}
		} else {
			$this->business->return->bool = false;
			$this->business->return->msg = 'Error de conexión de base de datos';
		}
		return $this->business->return;
	}
}
?>