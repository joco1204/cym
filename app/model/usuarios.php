<?php 
class Usuario{
	function __construct(){
		$this->business = new Business();
	}
	
	public function tabla_usuarios(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT a.id AS id_usuario, a.usuario, d.perfil, a.nombre, a.apellido1, a.apellido2, b.tipo_identificacion, a.identificacion, a.email, a.estado ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "LEFT JOIN pa_tipo_identificacion AS b ON a.tipo_identificacion = b.id ";
			$query .= "LEFT JOIN re_usuario_perfil AS c ON a.id = c.id_usuario ";
			$query .= "LEFT JOIN pa_perfiles AS d ON c.id_perfil = d.id ";
			$query .= "WHERE d.id <> '1'; ";
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

	public function tipo_identificacion(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id, tipo_identificacion FROM pa_tipo_identificacion WHERE estado = 'activo';";
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

	public function perfil(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id, perfil FROM pa_perfiles ";
			$query .= "WHERE id <> '1'; ";
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

	public function crear_usuario($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$ident = "SELECT COUNT(*) AS count_identificaicon FROM re_usuarios WHERE identificacion = '".$data->identificacion."';";
			$res_ident = $conn->query($ident);
			$row_ident = $res_ident->fetch(PDO::FETCH_OBJ);
			$usua = "SELECT COUNT(*) AS count_usuario FROM re_usuarios WHERE usuario = '".$data->usaurio."';";
			$res_usua = $conn->query($usua);
			$row_usua = $res_usua->fetch(PDO::FETCH_OBJ);
			if($row_ident->count_identificaicon == '0'){
				if ($row_usua->count_usuario == '0'){
					$pass = sha1($data->contrasena);
					$query  = "INSERT INTO re_usuarios (usuario, password, tipo_identificacion, identificacion, nombre, apellido1, apellido2, email, estado) ";
					$query .= "VALUES ('".$data->usaurio."', '".$pass."', '".$data->tipo_identificacion."', '".$data->identificacion."', '".$data->nombres."', '".$data->apellidos1."', '".$data->apellidos2."', '".$data->email."', 'activo');";
					$result = $conn->query($query);
					if($result){

						//Valida el id de la empresa y la campaña
						isset($data->empresa) ? $empresa = $data->empresa : $empresa = '0';
						isset($data->campana) ? $campana = $data->campana : $campana = '0';
						
						//Inserta en usuarios perfil
						$id_usaurio = $conn->lastInsertId();
						$query_perfil = "INSERT INTO re_usuario_perfil (id_usuario, id_perfil) VALUES ('".$id_usaurio."', '".$data->perfil."'); ";
						$conn->query($query_perfil);
						
						//Inserta en usuarios empresa campaña
						$query_ec = "INSERT INTO re_usaurio_ec (id_usuario, id_perfil, id_empresa, id_campana) VALUES ('".$id_usaurio."', '".$data->perfil."', '".$empresa."', '".$campana."');";
						$conn->query($query_ec);
						
						$this->business->return->bool = true;
						$this->business->return->msg = 'Se creó el usuario correctamente';
					} else {
						$this->business->return->bool = false;
						$this->business->return->msg = 'Error query';
					}
				} else {
					$this->business->return->bool = false;
					$this->business->return->msg = 'El usuario ya fue creado';
				}
			} else {
				$this->business->return->bool = false;
				$this->business->return->msg = 'El número de identificación ya fue creado';
			}
		} else {
			$this->business->return->bool = false;
			$this->business->return->msg = 'Error de conexión de base de datos';
		}
		return $this->business->return;
	}

	public function modificar_perfil($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		isset($data->cambiar_contrasena) ? $cambiar_contrasena = $data->cambiar_contrasena : $cambiar_contrasena = '';
		if($cambiar_contrasena != ''){
			$password = sha1($data->cambiar_contrasena);
		} else {
			$password = '';
		}
		//Valida conexión a base de datos
		if($conn){
			$query  = "UPDATE re_usuarios SET password = '".$password."' WHERE id = '".$data->id_usuario."';";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Perfil de usuario actualizado con éxito';
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

	public function data_usuario($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT a.id, a.usuario, a.tipo_identificacion, a.identificacion, a.nombre, a.apellido1, a.apellido2, b.id_perfil AS perfil, a.email, a.estado, c.id_empresa, c.id_campana ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "LEFT JOIN re_usuario_perfil AS b ON a.id = b.id_usuario ";
			$query .= "LEFT JOIN re_usaurio_ec AS c ON a.id = c.id_usuario ";
			$query .= "WHERE a.id = '".$data->id_usuario."';";
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

	public function modificar_usuario($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//
		isset($data->empresa_m) ? $empresa = $data->empresa_m : $empresa = '0';
		isset($data->campana_m) ? $campana = $data->campana_m : $campana = '0';
		//
		isset($data->contrasena_m) ? $contrasena_m = $data->contrasena_m : $contrasena_m = '';
		if($contrasena_m != ''){
			$password = sha1($contrasena_m);
		} else {
			$password = '';
		}
		//Valida conexión a base de datos
		if($conn){
			if ($password == '') {
				$query  = "UPDATE re_usuarios SET usuario = '".$data->usaurio_m."', tipo_identificacion = '".$data->tipo_identificacion_m."', identificacion = '".$data->identificacion_m."', nombre = '".$data->nombres_m."', apellido1 = '".$data->apellidos1_m."', apellido2 = '".$data->apellidos2_m."', email = '".$data->email_m."', estado = '".$data->estado_m."' WHERE id = '".$data->id_usuario_m."'; ";
			} else {
				$query  = "UPDATE re_usuarios SET usuario = '".$data->usaurio_m."', password = '".$password."', tipo_identificacion = '".$data->tipo_identificacion_m."', identificacion = '".$data->identificacion_m."', nombre = '".$data->nombres_m."', apellido1 = '".$data->apellidos1_m."', apellido2 = '".$data->apellidos2_m."', email = '".$data->email_m."', estado = '".$data->estado_m."' WHERE id = '".$data->id_usuario_m."'; ";	
			}
			$result = $conn->query($query);
			if($result){
				$query_perfil = "UPDATE re_usuario_perfil SET id_perfil = '".$data->perfil_m."' WHERE id_usuario = '".$data->id_usuario_m."';";
				$result_perfil = $conn->query($query_perfil);
				if($result_perfil){

					$query_perfil_ec = "UPDATE re_usaurio_ec SET id_perfil  = '".$data->perfil_m."', id_empresa  = '".$empresa."', id_campana  = '".$campana."' where id_usuario = '".$data->id_usuario_m."';";
					$result_perfil_ec = $conn->query($query_perfil_ec);
					
					if($result_perfil_ec){
						$this->business->return->bool = true;
						$this->business->return->msg = 'Perfil de usuario actualizado con éxito';
					} else {
						$this->business->return->bool = false;
						$this->business->return->msg = 'Error al actualizar empresa y campaña';	
					}
				} else {
					$this->business->return->bool = false;
					$this->business->return->msg = 'Error actualización perfil';
				}
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