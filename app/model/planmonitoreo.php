<?php 
class PlanMonitoreo{
	function __construct(){
		$this->business = new Business();
	}
	
	public function empresa_campana($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query   = "SELECT b.empresa, a.campana ";
			$query  .= "FROM ca_campana AS a ";
			$query  .= "JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query  .= "WHERE b.id = '".$data->id_empresa."' ";
			$query  .= "AND a.id = '".$data->id_campana."';";
			$result = $conn->query($query);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					array_push($arrayData, $row);
				}
				$this->business->return->bool = true;
				$this->business->return->msg = json_encode($arrayData);
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

	public function tabla_asesor($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT a.id, a.identificacion, a.nombres, a.apellidos, b.empresa, c.campana, a.estado ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query .= "JOIN ca_campana AS c ON a.id_campana = c.id ";
			$query .= "WHERE a.id_empresa = '".$data->id_empresa."' ";
			$query .= "AND a.id_campana = '".$data->id_campana."' ";
			$query .= "AND a.estado = 'activo' ";
			$query .= "ORDER BY b.empresa, c.campana;";
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

	public function monitoreos_dia($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT a.id_empresa, a.id_campana, a.id_asesor, a.id AS id_agenda, b.identificacion, b.nombres, b.apellidos, c.empresa, d.campana, a.fecha_monitoreo ";
			$query .= "FROM ca_agenda_monitoreo AS a ";
			$query .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
			$query .= "LEFT JOIN ca_empresa AS c ON a.id_empresa = c.id ";
			$query .= "LEFT JOIN ca_campana AS d ON a.id_campana = d.id ";
			$query .= "WHERE a.id_empresa = '".$data->id_empresa."' AND a.id_campana = '".$data->id_campana."' AND a.fecha_monitoreo = '".date('Y-m-d')."' AND a.estado = '0'; ";
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