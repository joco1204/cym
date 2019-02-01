<?php
error_reporting(0);
class Loginldap{
	function __construct(){
		$this->business = new Business();
	}
	//Método de lógin
	public function login($data){
		$ldap = $this->business->ldap;
		$mysql = $this->business->mysql;
		$session = $this->business->session;
		if($ldap){
			$login_user = $ldap->userldap($data->user, $data->pass);
			if($login_user){
				if($mysql){
					$query  = "SELECT id, estado FROM re_usuarios WHERE usuario_red = '".$data->user."';";
					$result = $mysql->query($query);
					if($result){
						if($result->rowCount() > 0){
							$row = $result->fetch(PDO::FETCH_OBJ);
							if($row->estado == 'activo'){
								$get_user = array(
									'id_user' => $row->id,
									'token' => $session->token()
								);
								$this->business->return->bool = true;
								$this->business->return->msg = json_encode($get_user);
							} else {
								$this->business->return->bool = false;
								$this->business->return->msg = 'El usuario está inactivo';
							}
						} else {
							$this->business->return->bool = false;
							$this->business->return->msg = 'Usuario no registrado en la plataforma';
						}
					} else {
						$this->business->return->bool = false;
						$this->business->return->msg = 'Error de consulta (Comuníquese con el área de desarrollo)';
					}
				} else {
					$this->business->return->bool = false;
					$this->business->return->msg = 'Error de conexión de base de datos (Comuníquese con el área de desarrollo)';
				}
			} else {
				$this->business->return->bool = false;
				$this->business->return->msg = 'Usuario y/o contraseña incorrecto';
			}
		} else {
			$this->business->return->bool = false;
			$this->business->return->msg = 'Error de conexión con el directorio activo (Comuníquese con el área de desarrollo)';
		}
		return $this->business->return;
	}

	//Session method
	public function session($id_user, $token){
		$mysql = $this->business->mysql;
		$session = $this->business->session;
		$array_empresa = array();
		$array_campana = array();
		if ($mysql){
			$query  = "SELECT a.id AS id_usuario, a.usuario_red AS usuario, d.id AS id_perfil, d.perfil, a.nombre, a.apellido1, a.apellido2, b.tipo_identificacion, a.identificacion, a.email, a.estado ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "LEFT JOIN pa_tipo_identificacion AS b ON a.tipo_identificacion = b.id ";
			$query .= "LEFT JOIN re_usuario_perfil AS c ON a.id = c.id_usuario ";
			$query .= "LEFT JOIN pa_perfiles AS d ON c.id_perfil = d.id ";
			$query .= "WHERE a.estado = 'activo' AND a.id = '".$id_user."'; ";
			$result = $mysql->query($query);
			if($result){
				if($result->rowCount() == '1'){
					$query_e = "SELECT DISTINCT id_empresa FROM re_usaurio_ec WHERE id_usuario = '".$id_user."' AND estado = 'activo';";
					$result_e = $mysql->query($query_e);
					$num_empresas = $result_e->rowCount();
					$num_campanas = 0;
					while($row_e = $result_e->fetch(PDO::FETCH_OBJ)){
						array_push($array_empresa, $row_e->id_empresa);
						$query_c = "SELECT id_campana FROM re_usaurio_ec WHERE id_usuario = '".$id_user."' AND id_empresa = '".$row_e->id_empresa."' AND estado = 'activo';";
						$result_c = $mysql->query($query_c);
						$num_campanas = ($num_campanas + $result_c->rowCount());
						while($row_c = $result_c->fetch(PDO::FETCH_OBJ)){
							array_push($array_campana, $row_c->id_campana);
						}							
					}
					//Ser sessión
					while($row = $result->fetch(PDO::FETCH_OBJ)){
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
						$session->setSession('token', $row->token);
						$session->setSession('num_empresas', $num_empresas);
						$session->setSession('num_campanas', $num_campanas);
						$session->setSession('empresa', $array_empresa);
						$session->setSession('campana', $array_campana);
					}
					//array get sessión
					$get_session = array(
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
						'token' => $session->getSession('token'),
						'num_empresas' => $session->getSession('num_empresas'),
						'num_campanas' => $session->getSession('num_campanas'),
						'empresa' => $session->getSession('empresa'),
						'campana' => $session->getSession('campana'),
					);
					$this->business->return->bool = true;
					$this->business->return->msg = json_encode($get_session);
				} else {
					$this->business->return->bool = false;
					$this->business->return->msg = "No se ha iniciado sessión (Comuníquese con el área de desarrollo)";
				}
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