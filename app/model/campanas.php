<?php 
class Campana{
	function __construct(){
		$this->business = new Business();
	}
	
	public function tabla_campanas(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query   = "SELECT a.id, a.campana, b.empresa, a.estado ";
			$query  .= "FROM ca_campana AS a ";
			$query  .= "JOIN ca_empresa AS b ON a.id_empresa = b.id"; 
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

	public function campanas($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query   = "SELECT id, campana ";
			$query  .= "FROM ca_campana ";
			$query  .= "WHERE estado = 'activo' ";
			$query  .= "AND id_empresa = '".$data->id_empresa."'; ";
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
	
	public function crear_campana($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$query  = "INSERT INTO ca_campana (campana, id_empresa, estado) VALUES ('".$data->nombre_campana."', '".$data->id_empresa."', 'activo')";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha creado el campana '.$data->nombre_campana.' correctamente';
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

	public function campanas_analista($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayCampana = array();
			$query   = "SELECT id, campana FROM ca_campana WHERE id_empresa = '".$data->id_empresa."'; "; 
			$result = $mysql->query($query);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					array_push($arrayCampana, $row);
				}
				$this->business->return->bool = true;
				$this->business->return->msg = json_encode($arrayCampana);
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

	public function data_campana($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query   = "SELECT id, campana, id_empresa, estado ";
			$query  .= "FROM ca_campana ";
			$query  .= "WHERE id = '".$data->id."'; ";
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

	public function modificar_campana($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$query = "UPDATE ca_campana SET campana = '".$data->nombre_campana_m."', id_empresa = '".$data->id_empresa_m."', estado = '".$data->estado_campana_m."' WHERE id = '".$data->id_empresa_m."'; ";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha actualizado la campaña '.$data->nombre_campana_m.' correctamente';
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