<?php 
class PlanMonitoreo{
	function __construct(){
		$this->business = new Business();
	}
	
	public function empresa_campana($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query   = "SELECT b.empresa, a.campana ";
			$query  .= "FROM ca_campana AS a ";
			$query  .= "JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query  .= "WHERE b.id = '".$data->id_empresa."' ";
			$query  .= "AND a.id = '".$data->id_campana."';";
			$result = $mysql->query($query);
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
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT a.id, a.identificacion, a.nombre, a.apellido1, a.apellido2, c.empresa, d.campana, a.estado ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "LEFT JOIN ca_asesores_ec AS b ON a.id = b.id_asesor ";
			$query .= "LEFT JOIN ca_empresa AS c ON b.id_empresa = c.id ";
			$query .= "LEFT JOIN ca_campana AS d ON b.id_campana = d.id ";
			$query .= "WHERE b.id_empresa = '".$data->id_empresa."' ";
			$query .= "AND b.id_campana = '".$data->id_campana."' ";
			$query .= "AND a.estado = 'activo' ";
			$query .= "ORDER BY c.empresa, d.campana;";
			$result = $mysql->query($query);
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
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT a.id_empresa, a.id_campana, a.id_asesor, a.id AS id_agenda, b.identificacion, b.nombre, b.apellido1, b.apellido2, c.empresa, d.campana, a.fecha_monitoreo ";
			$query .= "FROM ca_agenda_monitoreo AS a ";
			$query .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
			$query .= "LEFT JOIN ca_empresa AS c ON a.id_empresa = c.id ";
			$query .= "LEFT JOIN ca_campana AS d ON a.id_campana = d.id ";
			$query .= "WHERE a.id_empresa = '".$data->id_empresa."' AND a.id_campana = '".$data->id_campana."' AND a.fecha_monitoreo = '".date('Y-m-d')."' AND a.estado = '0'; ";
			$result = $mysql->query($query);
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

	public function monitoreos_mes($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT a.id_empresa, a.id_campana, a.id_asesor, a.id AS id_agenda, b.identificacion, b.nombre, b.apellido1, b.apellido2, c.empresa, d.campana, a.fecha_monitoreo ";
			$query .= "FROM ca_agenda_monitoreo AS a ";
			$query .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
			$query .= "LEFT JOIN ca_empresa AS c ON a.id_empresa = c.id ";
			$query .= "LEFT JOIN ca_campana AS d ON a.id_campana = d.id ";
			$query .= "WHERE a.id_empresa = '".$data->id_empresa."' AND a.id_campana = '".$data->id_campana."' AND a.fecha_monitoreo BETWEEN '".$this->primer_dia()."' AND '".$this->ultimo_dia()."' AND a.estado = '1'; ";
			$result = $mysql->query($query);
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
}
?>