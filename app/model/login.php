<?php
class Login{
	function __construct(){
		$this->bsn = new Business();
	}
	//Login method
	public function login($user, $pass){
		$conn = $this->bsn->conn;
		$db = $this->bsn->db;
		$session = $this->bsn->session;
		//Validate the connection of db
		if($conn){
			$password = sha1($pass);
			$query  = "SELECT id, password, estado FROM re_usuarios WHERE usuario = '".$user."' LIMIT 1;";
			$result = $conn->query($query);
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
				$this->bsn->return->bool = $bool;
				$this->bsn->return->msg = $response;
			} else {
				$this->bsn->return->bool = false;
				$this->bsn->return->msg = 'Error de consulta (Comuníquese con el área de desarrollo)';
			}
		} else {
			$this->bsn->return->bool = false;
			$this->bsn->return->msg = 'Error de conexión de base de datos (Comuníquese con el área de desarrollo)';
		}
		return $this->bsn->return;
	}
	//Session method
	public function session($iduser, $token){
		$conn = $this->bsn->conn;
		$db = $this->bsn->db;
		$session = $this->bsn->session;
		if ($conn){
			$query  = "SELECT a.id AS idusuario, e.id AS idperfil, e.perfil AS perfilusuario, b.nombre, b.apellido1 AS apellido  ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "INNER JOIN re_personas AS b ON a.id = b.id_usuario ";
			$query .= "INNER JOIN re_usuario_perfil AS d ON a.id = d.id_usuario ";
			$query .= "INNER JOIN pa_perfiles AS e ON d.id_perfil = e.id ";
			$query .= "WHERE a.id = '".$iduser."' ";
			$query .= "LIMIT 1; ";
			$result = $conn->query($query);
			if($result){
				if($result->rowCount() > 0){
					while ($row = $result->fetch(PDO::FETCH_OBJ)){
						$row->token = $token;
						$session->start();
						$session->setSession('iduser', $row->idusuario);
						$session->setSession('idprofile', $row->idperfil);
						$session->setSession('userprofile', $row->perfilusuario);
						$session->setSession('username', $row->nombre);
						$session->setSession('lastname', $row->apellido);
						$session->setSession('token', $row->token);
					}
					//array get sessión
					$getSession = array(
						'iduser' => $session->getSession('iduser'),
						'idprofile' => $session->getSession('idprofile'),
						'userprofile' => $session->getSession('userprofile'),
						'username' => $session->getSession('username'),
						'lastname' => $session->getSession('lastname'),
						'token' => $session->getSession('token')
					);
					$bool = true;
					$msg = json_encode($getSession);
				} else {
					$bool = false;
					$msg = "No se ha iniciado sessión (Comuníquese con el área de desarrollo)";
				}
				$this->bsn->return->bool = $bool;
				$this->bsn->return->msg = $msg;
			} else {
				$this->bsn->return->bool = false;
				$this->bsn->return->msg = 'Error de consulta (Comuníquese con el área de desarrollo)';
			}

		}else{
			$this->bsn->return->bool = false;
			$this->bsn->return->msg = 'Error de conexión de base de datos (Comuníquese con el área de desarrollo)';
		}
		return $this->bsn->return;
	}
}
?>