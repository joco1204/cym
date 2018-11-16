<?php
class Validacion{
	function __construct(){
		$this->business = new Business();
	}

	public function estado(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id,estado  FROM  va_estado;";
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

	public function tipo_servicio(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id,tipo_servicio FROM  va_tipo_servicio;";
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

	public function motivo_principal(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id,motivo FROM  va_motivo_principal;";
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

	public function validador(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT u.id, u.nombre, u.apellido1 "; 
			$query .= "FROM  re_usuarios as u ";
			$query .= "inner join re_usuario_perfil as p on u.id =p.id ";  
			$query .= "where p.id_perfil=7; ";

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

	public function agent_asesor(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id,agent_matriz FROM va_usuarios_agent"; 

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

	public function nombre_asesor($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT l.id_asesor as id_asesor,concat(nombres,' ',apellidos) as nombre_asesor FROM va_usuarios_agent as l LEFT JOIN ca_asesores as m ON l.id_asesor=m.id where l.id= '".$data->id_asesor."';"; 
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

	public function guardar_validacion($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "INSERT INTO va_validador (id_estado,fecha_venta,fecha_validacion,id_asesor,cedula_cliente,id_tipo_servicio, id_motivo,id_validador,observaciones) "; 
			$query .= "values ('".$data->estado."','".$data->fecha_venta."','".$data->fecha_validacion."','".$data->agent_asesor."','".$data->cedula."','".$data->tipo_servicio."','".$data->motivo_principal."','".$data->validador."','".$data->observaciones."');";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = $conn->lastInsertId();
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT a.id, b.estado, a.fecha_venta, a.fecha_validacion, j.agent_matriz, concat(k.nombres,' ',k.apellidos) as nombre_asesor, a.cedula_cliente, d.tipo_servicio, c.motivo, e.usuario, a.observaciones "; 
			$query .= "FROM va_validador as a "; 
			$query .= "INNER JOIN va_estado as b ON a.id_estado=b.id "; 
			$query .= "INNER JOIN va_motivo_principal as c ON  a.id_estado=c.id "; 
			$query .= "INNER JOIN va_tipo_servicio as d ON  a.id_estado=d.id ";
			$query .= "INNER JOIN re_usuarios as e ON a.id_validador=e.id ";
			$query .= "INNER JOIN va_usuarios_agent as j ON a.id_asesor=j.id ";
			$query .= "INNER JOIN ca_asesores as k ON j.id_asesor=k.id ";
			$query .= "WHERE a.id= '".$data->id_declinada."'; ";
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

	public function tabla_declinadas(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT a.id, d.tipo_servicio, concat (j.agent_matriz,' - ',k.nombres,' ',k.apellidos) as agent, a.fecha_validacion, b.estado "; 
			$query .= "FROM va_validador as a "; 
			$query .= "INNER JOIN va_estado as b ON a.id_estado=b.id "; 
			$query .= "INNER JOIN va_motivo_principal as c ON  a.id_estado=c.id "; 
			$query .= "INNER JOIN va_tipo_servicio as d ON  a.id_tipo_servicio=d.id ";
			$query .= "INNER JOIN re_usuarios as e ON a.id_validador=e.id ";
			$query .= "INNER JOIN va_usuarios_agent as j ON a.id_asesor=j.id ";
			$query .= "INNER JOIN ca_asesores as k ON j.id_asesor=k.id ";
			$query .= "WHERE a.id_estado='1'; ";
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




}
?>