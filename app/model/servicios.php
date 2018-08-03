<?php 
class Servicio{
	function __construct(){
		$this->business = new Business();
	}
	
	public function tabla_servicios(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query   = "SELECT a.id, a.servicio, b.cliente, a.estado ";
			$query  .= "FROM ca_servicio AS a ";
			$query  .= "JOIN ca_cliente AS b ON a.id_cliente = b.id"; 
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

	public function servicios($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query   = "SELECT id, servicio ";
			$query  .= "FROM ca_servicio ";
			$query  .= "WHERE estado = 'activo' ";
			$query  .= "AND id_cliente = '".$data->id_cliente."'; ";
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
	
	public function crear_servicio($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "INSERT INTO ca_servicio (servicio, id_cliente, estado) VALUES ('".$data->nombre_servicio."', '".$data->id_cliente."', '".$data->estado_servicio."')";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha creado el servicio '.$data->nombre_servicio.' correctamente';
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