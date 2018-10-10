<?php
class AgendaMonitoreo{
	function __construct(){
		$this->business = new Business();
	}
	
	public function info_asesor($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT a.id, a.identificacion, a.nombres, a.apellidos, b.empresa, c.campana ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query .= "JOIN ca_campana AS c ON a.id_campana = c.id ";
			$query .= "WHERE a.id = '".$data->id_asesor."'; ";
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

	public function monitoreos_asesor($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id, fecha_monitoreo, estado ";
			$query .= "FROM ca_agenda_monitoreo ";
			$query .= "WHERE id_empresa = '".$data->id_empresa."' AND id_campana = '".$data->id_campana."' AND id_asesor = '".$data->id_asesor."' ";
			$query .= "AND fecha_monitoreo BETWEEN '".$this->primer_dia()."' AND '".$this->ultimo_dia()."' ";
			$query .= "ORDER BY fecha_monitoreo, estado;";
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

	public function count_monitoreos_asesor($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT COUNT(*) AS num_monitores ";
			$query .= "FROM ca_agenda_monitoreo ";
			$query .= "WHERE id_empresa = '".$data->id_empresa."' AND id_campana = '".$data->id_campana."' AND id_asesor = '".$data->id_asesor."' ";
			$query .= "AND fecha_monitoreo BETWEEN '".$this->primer_dia()."' AND '".$this->ultimo_dia()."';";
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

	//
	public function guardar_fecha_monitoreo($data){	
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "INSERT INTO ca_agenda_monitoreo (id_empresa, id_campana, id_asesor, fecha_monitoreo, estado) VALUES ('".$data->id_empresa."', '".$data->id_campana."', '".$data->id_asesor."', '".$data->fecha_monitoreo."', '0'); ";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se agendó el monitoreo para la fecha '.$data->fecha_monitoreo;
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

	public function primer_dia(){
		$month = date('m');
		$year = date('Y');
		return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
	}

	public function ultimo_dia(){ 
		$month = date('m');
		$year = date('Y');
		$day = date("d", mktime(0,0,0, $month+1, 0, $year));
		return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
	}

	public function anular_monitoreo($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "UPDATE ca_agenda_monitoreo SET estado = '2' WHERE id = '".$data->id_genda."'; ";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se anuló monitoreo correctamente';
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