<?php
class Validacion{
	function __construct(){
		$this->business = new Business();
	}

	public function estado(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id,estado  FROM  va_estado;";
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

	public function tipo_servicio(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id,tipo_servicio FROM  va_tipo_servicio;";
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

	public function motivo_principal(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id,motivo FROM  va_motivo_principal;";
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

	public function validador(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT u.id, u.nombre, u.apellido1 "; 
			$query .= "FROM  re_usuarios as u ";
			$query .= "inner join re_usuario_perfil as p on u.id =p.id ";  
			$query .= "where p.id_perfil=7; ";

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

	public function agent_asesor(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id, agent_matriz FROM va_usuarios_agent"; 

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

	public function nombre_asesor($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT l.id_asesor as id_asesor,concat(nombre,' ',apellido1,' ',apellido2) as nombre_asesor FROM va_usuarios_agent as l LEFT JOIN ca_asesores as m ON l.id_asesor=m.id where l.id= '".$data->id_asesor."';"; 
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

	public function guardar_validacion($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$query  = "INSERT INTO va_validador (id_estado,fecha_venta,fecha_validacion,id_asesor,cedula_cliente,id_tipo_servicio, id_motivo,id_validador,observaciones) "; 
			$query .= "values ('".$data->estado."','".$data->fecha_venta."','".$data->fecha_validacion."','".$data->agent_asesor."','".$data->cedula."','".$data->tipo_servicio."','".$data->motivo_principal."','".$data->validador."','".$data->observaciones."');";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = $mysql->lastInsertId();
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

	public function vista_validacion($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT a.id, b.id as id_estado, b.estado, a.fecha_venta, a.fecha_validacion, j.id as id_agent, j.agent_matriz, concat(k.nombre,' ',k.apellido1,' ',k.apellido2) as nombre_asesor, a.cedula_cliente, d.id as id_tipo_servicio, d.tipo_servicio, c.id as id_motivo, c.motivo, e.id as id_usuario, e.usuario_red, a.observaciones "; 
			$query .= "FROM va_validador as a "; 
			$query .= "INNER JOIN va_estado as b ON a.id_estado=b.id "; 
			$query .= "INNER JOIN va_motivo_principal as c ON  a.id_estado=c.id "; 
			$query .= "INNER JOIN va_tipo_servicio as d ON  a.id_estado=d.id ";
			$query .= "INNER JOIN re_usuarios as e ON a.id_validador=e.id ";
			$query .= "INNER JOIN va_usuarios_agent as j ON a.id_asesor=j.id ";
			$query .= "INNER JOIN ca_asesores as k ON j.id_asesor=k.id ";
			$query .= "WHERE a.id= '".$data->id_declinada."'; ";
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

	public function tabla_declinadas(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT a.id, d.tipo_servicio, concat (j.agent_matriz,' - ',k.nombre,' ',k.apellido1,' ',k.apellido2) as agent, a.fecha_validacion, b.estado "; 
			$query .= "FROM va_validador as a "; 
			$query .= "INNER JOIN va_estado as b ON a.id_estado=b.id "; 
			$query .= "INNER JOIN va_motivo_principal as c ON  a.id_estado=c.id "; 
			$query .= "INNER JOIN va_tipo_servicio as d ON  a.id_tipo_servicio=d.id ";
			$query .= "INNER JOIN re_usuarios as e ON a.id_validador=e.id ";
			$query .= "INNER JOIN va_usuarios_agent as j ON a.id_asesor=j.id ";
			$query .= "INNER JOIN ca_asesores as k ON j.id_asesor=k.id ";
			$query .= "WHERE a.id_estado='1'; ";
			//var_dump($query);
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

	public function modificar_validacion($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){ 
			$query  = "UPDATE va_validador SET id_estado = '".$data->estado."' WHERE id = '".$data->id_declinada."';";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = "Actualizado";
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