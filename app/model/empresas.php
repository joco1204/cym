<?php 
class Empresa{
	function __construct(){
		$this->business = new Business();
	}
	
	public function tabla_empresas(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT id, empresa, imagen, estado FROM ca_empresa;";
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

	public function empresas(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT id, empresa, imagen ";
			$query .= "FROM ca_empresa ";
			$query .= "WHERE estado = 'activo' ";
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

	public function crear_empresa($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$query  = "INSERT INTO ca_empresa (empresa, imagen, estado) VALUES ('".$data->nombre_empresa."', '', 'activo'); ";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha creado el empresa '.$data->nombre_empresa.' correctamente';
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

	public function empresa_analista(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayEmpresa = array();
			$query  = "SELECT id, empresa, imagen, estado FROM ca_empresa; ";
			$result = $mysql->query($query);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					array_push($arrayEmpresa, $row);
				}
				$this->business->return->bool = true;
				$this->business->return->msg = json_encode($arrayEmpresa);
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

	public function data_empresa($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT id, empresa, imagen, estado FROM ca_empresa WHERE id = '".$data->id."';";
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

	public function modificar_empresa($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			isset($data->logo_empresa_m) ? $logo = $data->logo_empresa_m : $logo = '';
			$query = "UPDATE ca_empresa SET empresa = '".$data->nombre_empresa_m."', imagen = '".$logo."', estado = '".$data->estado_empresa_m."' WHERE id = '".$data->id_empresa_m."'; ";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha actualizado el empresa '.$data->nombre_empresa_m.' correctamente';
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