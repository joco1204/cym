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
			$query  = "SELECT id, password, empresa_id, estado FROM re_usuarios WHERE usuario = '".$user."' LIMIT 1;";
			$result = $conn->query($query);
			if($result){
				if($result->rowCount() > 0){
					while($row = $result->fetch(PDO::FETCH_OBJ)){
						if($row->password != $password){
							$bool = false;
							$msg = 'Incorrect password';
						} else {
							if($row->estado == 'activo'){
								$getUser = array(
									'iduser' => $row->id,
									'idcompany' => $row->empresa_id,
									'token' => $session->token()
								);
								$bool = true;
								$msg = json_encode($getUser);
							} else {
								$bool = false;
								$msg = 'The user is inactive';
							}
						}
					}
					$bool = $bool;
					$response = $msg;
				} else {
					$bool = false;
					$response = 'Wrong user';
				}
				$this->bsn->return->bool = $bool;
				$this->bsn->return->msg = $response;
			} else {
				$this->bsn->return->bool = false;
				$this->bsn->return->msg = 'Erroneous query';
			}
		} else {
			$this->bsn->return->bool = false;
			$this->bsn->return->msg = 'Database connection error';
		}
		return $this->bsn->return;
	}
	//Session method
	public function session($iduser, $idcompany, $token){
		$conn = $this->bsn->conn;
		$db = $this->bsn->db;
		$session = $this->bsn->session;
		if ($conn){
			$query  = "SELECT a.id AS idusuario, e.id AS idperfil, e.perfil AS perfilusuario, b.nombre, b.apellido1 AS apellido, c.nit, c.razon_social AS empresa, c.web AS webempresa, c.logo AS logoempresa, g.sede AS sedeempresa, i.pais, h.ciudad, f.cargo ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "INNER JOIN re_personas AS b ON a.id = b.id_usuario ";
			$query .= "INNER JOIN re_empresa AS c ON a.empresa_id = c.id ";
			$query .= "INNER JOIN re_usuario_perfil AS d ON a.id = d.id_usuario ";
			$query .= "INNER JOIN pa_perfiles AS e ON d.id_perfil = e.id ";
			$query .= "INNER JOIN re_cargo AS f ON b.cargo = f.id ";
			$query .= "INNER JOIN re_sede_empresa AS g ON f.id_sede = g.id AND c.id = g.id_empresa ";
			$query .= "INNER JOIN pa_ciudad AS h ON g.id_ciudad = g.id_empresa ";
			$query .= "INNER JOIN pa_pais AS i ON g.id_pais = i.id ";
			$query .= "WHERE a.id = '".$iduser."' AND a.empresa_id = '".$idcompany."' ";
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
						$session->setSession('ncompany', $row->nit);
						$session->setSession('company', $row->empresa);
						$session->setSession('companyweb', $row->webempresa);
						$session->setSession('companylogo', $row->logoempresa);
						$session->setSession('headquarters', $row->sedeempresa);
						$session->setSession('country', $row->pais);
						$session->setSession('city', $row->ciudad);
						$session->setSession('position', $row->cargo);
						$session->setSession('token', $row->token);
					}
					//array get sessión
					$getSession = array(
						'iduser' => $session->getSession('iduser'),
						'idprofile' => $session->getSession('idprofile'),
						'userprofile' => $session->getSession('userprofile'),
						'username' => $session->getSession('username'),
						'lastname' => $session->getSession('lastname'),
						'ncompany' => $session->getSession('ncompany'),
						'company' => $session->getSession('company'),
						'companyweb' => $session->getSession('companyweb'),
						'companylogo' => $session->getSession('companylogo'),
						'headquarters' => $session->getSession('headquarters'),
						'country' => $session->getSession('country'),
						'city' => $session->getSession('city'),
						'position' => $session->getSession('position'),
						'token' => $session->getSession('token')
					);
					$bool = true;
					$msg = json_encode($getSession);
				} else {
					$bool = false;
					$msg = "No se ha iniciado sessión";
				}
				$this->bsn->return->bool = $bool;
				$this->bsn->return->msg = $msg;
			} else {
				$this->bsn->return->bool = false;
				$this->bsn->return->msg = 'Error query';
			}

		}else{
			$this->bsn->return->bool = false;
			$this->bsn->return->msg = 'No conecta base de datos';
		}
		return $this->bsn->return;
	}
}
?>