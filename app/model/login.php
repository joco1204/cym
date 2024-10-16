<?php
class Login{
	function __construct(){
		$this->business = new Business();
	}
	//Login method
	public function login($user, $pass){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		$session = $this->business->session;
		//Validate the connection of db_mysql
		if($mysql){
			$password = sha1($pass);
			$query  = "SELECT id, password, estado FROM re_usuarios WHERE usuario = '".$user."' LIMIT 1;";
			$result = $mysql->query($query);
			if($result){
				if($result->rowCount() > 0){
					while($row = $result->fetch(PDO::FETCH_OBJ)){
						if($row->password != $password){
							$bool = false;
							$msg = 'Contraseña incorrecta';
						} else {
							if($row->estado == 'activo'){
								$getUser = array(
									'iduser' => $row->id,
									'token' => $session->token()
								);
								$bool = true;
								$msg = json_encode($getUser);
							} else {
								$bool = false;
								$msg = 'El usuario está inactivo';
							}
						}
					}
					$bool = $bool;
					$response = $msg;
				} else {
					$bool = false;
					$response = 'Usuario incorrecto';
				}
				$this->business->return->bool = $bool;
				$this->business->return->msg = $response;
			} else {
				$this->business->return->bool = false;
				$this->business->return->msg = 'Error de consulta (Comuníquese con el área de desarrollo)';
			}
		} else {
			$this->business->return->bool = false;
			$this->business->return->msg = 'Error de conexión de base de datos (Comuníquese con el área de desarrollo)';
		}
		return $this->business->return;
	}
	//Session method
	public function session($iduser, $token){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		$session = $this->business->session;
		if ($mysql){
			$query  = "SELECT a.id AS id_usuario, a.usuario, d.id AS id_perfil, d.perfil, a.nombre, a.apellido1, a.apellido2, b.tipo_identificacion, a.identificacion, a.email, a.estado , e.id_empresa AS empresa, e.id_campana AS campana ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "LEFT JOIN pa_tipo_identificacion AS b ON a.tipo_identificacion = b.id ";
			$query .= "LEFT JOIN re_usuario_perfil AS c ON a.id = c.id_usuario ";
			$query .= "LEFT JOIN pa_perfiles AS d ON c.id_perfil = d.id ";
			$query .= "LEFT JOIN re_usaurio_ec AS e ON c.id = e.id_usuario ";
			$query .= "WHERE a.estado = 'activo' AND a.id = '".$iduser."' ";
			$query .= "LIMIT 1; ";
			$result = $mysql->query($query);
			if($result){
				if($result->rowCount() > 0){
					while ($row = $result->fetch(PDO::FETCH_OBJ)){
						$row->token = $token;
						$session->start();
						$session->setSession('id_usaurio', $row->id_usuario);
						$session->setSession('usuario', $row->usuario);
						$session->setSession('id_perfil', $row->id_perfil);
						$session->setSession('perfil', $row->perfil);
						$session->setSession('nombre', $row->nombre);
						$session->setSession('apellido1', $row->apellido1);
						$session->setSession('apellido2', $row->apellido2);
						$session->setSession('tipo_identificacion', $row->tipo_identificacion);
						$session->setSession('identificacion', $row->identificacion);
						$session->setSession('email', $row->email);
						$session->setSession('estado', $row->estado);
						$session->setSession('empresa', $row->empresa);
						$session->setSession('campana', $row->campana);
						$session->setSession('token', $row->token);
					}

					//array get sessión
					$getSession = array(
						'id_usaurio' => $session->getSession('id_usaurio'),
						'usuario' => $session->getSession('usuario'),
						'id_perfil' => $session->getSession('id_perfil'),
						'perfil' => $session->getSession('perfil'),
						'nombre' => $session->getSession('nombre'),
						'apellido1' => $session->getSession('apellido1'),
						'apellido2' => $session->getSession('apellido2'),
						'tipo_identificacion' => $session->getSession('tipo_identificacion'),
						'identificacion' => $session->getSession('identificacion'),
						'email' => $session->getSession('email'),
						'estado' => $session->getSession('estado'),
						'empresa' => $session->getSession('empresa'),
						'campana' => $session->getSession('campana'),
						'token' => $session->getSession('token')
					);

					$bool = true;
					$msg = json_encode($getSession);
				} else {
					$bool = false;
					$msg = "No se ha iniciado sessión (Comuníquese con el área de desarrollo)";
				}
				$this->business->return->bool = $bool;
				$this->business->return->msg = $msg;
			} else {
				$this->business->return->bool = false;
				$this->business->return->msg = 'Error de consulta (Comuníquese con el área de desarrollo)';
			}

		}else{
			$this->business->return->bool = false;
			$this->business->return->msg = 'Error de conexión de base de datos (Comuníquese con el área de desarrollo)';
		}
		return $this->business->return;
	}
}
?>