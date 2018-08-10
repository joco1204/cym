<?php
class Asesor{
	function __construct(){
		$this->business = new Business();
	}

	public function tabla_asesor(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT a.id, a.identificacion, a.nombres, a.apellidos, b.empresa, c.campana, a.estado ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query .= "JOIN ca_campana AS c ON a.id_campana = c.id;";
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

	public function crear_asesor($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "INSERT INTO ca_asesores (id_empresa, id_campana, identificacion, nombres, apellidos, estado) VALUES ('".$data->empresa."', '".$data->campana."', '".$data->identificacion."', '".$data->nombres."', '".$data->apellidos."', 'activo'); ";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha creado el asesor '.$data->nombres.' '.$data->apellidos.' correctamente';
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