<?php 
class Usuario{
	function __construct(){
		$this->business = new Business();
	}
	
	public function tabla_usuarios(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT a.id AS id_usuario, a.usuario_red AS usuario, d.perfil, a.nombre, a.apellido1, a.apellido2, b.tipo_identificacion, a.identificacion, a.email, a.estado ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "LEFT JOIN pa_tipo_identificacion AS b ON a.tipo_identificacion = b.id ";
			$query .= "LEFT JOIN re_usuario_perfil AS c ON a.id = c.id_usuario ";
			$query .= "LEFT JOIN pa_perfiles AS d ON c.id_perfil = d.id ";
			$query .= "WHERE d.id <> '1'; ";
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

	public function tipo_identificacion(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id, tipo_identificacion FROM pa_tipo_identificacion WHERE estado = 'activo';";
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

	public function perfil(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id, perfil FROM pa_perfiles ";
			$query .= "WHERE id <> '1'; ";
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

	public function perfil_usuario(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id, perfil FROM pa_perfiles ";
			$query .= "WHERE id NOT IN ('1', '8'); ";
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

	public function crear_usuario($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		$email = $this->business->email;
		$url = $this->business->url;
		//Valida conexión a base de datos
		if($mysql){
			$ident = "SELECT COUNT(*) AS count_identificaicon FROM re_usuarios WHERE identificacion = '".$data->identificacion."';";
			$res_ident = $mysql->query($ident);
			$row_ident = $res_ident->fetch(PDO::FETCH_OBJ);
			$usua = "SELECT COUNT(*) AS count_usuario FROM re_usuarios WHERE usuario_red = '".$data->usaurio."';";
			$res_usua = $mysql->query($usua);
			$row_usua = $res_usua->fetch(PDO::FETCH_OBJ);
			if($row_ident->count_identificaicon == '0'){
				if ($row_usua->count_usuario == '0'){
					$query  = "INSERT INTO re_usuarios (usuario_red, tipo_identificacion, identificacion, nombre, apellido1, apellido2, email, estado) ";
					$query .= "VALUES ('".$data->usaurio."', '".$data->tipo_identificacion."', '".$data->identificacion."', '".$data->nombres."', '".$data->apellidos1."', '".$data->apellidos2."', '".$data->email."', 'activo');";
					$result = $mysql->query($query);
					if($result){
						//Id de usuario
						$id_usaurio = $mysql->lastInsertId();
						//Inserta en usuarios perfil
						$query_perfil = "INSERT INTO re_usuario_perfil (id_usuario, id_perfil) VALUES ('".$id_usaurio."', '".$data->perfil."'); ";
						$result_perfil = $mysql->query($query_perfil);
						if($result_perfil){
							if ($data->numero_campanas == '0'){
								$query_ec = "INSERT INTO re_usaurio_ec (id_usuario, id_perfil, id_empresa, id_campana) VALUES ('".$id_usaurio."', '".$data->perfil."', '0', '0');";
								$mysql->query($query_ec);
							} else {
								for ($i=1; $i <= $data->numero_campanas; $i++){
									$empresa = 'empresa_'.$i;
									$campana = 'campana_'.$i;
									$estado = 'estado_campana_'.$i;
									$query_ec = "INSERT INTO re_usaurio_ec (id_usuario, id_perfil, id_empresa, id_campana, estado) VALUES ('".$id_usaurio."', '".$data->perfil."', '".$data->$empresa."', '".$data->$campana."', '".$data->$estado."');";
									$mysql->query($query_ec);
								}
							}
							//Datos de email
							$correo  = $data->email;
							$nombre  = $data->nombres.' '.$data->apellidos1.' '.$data->apellidos2;
							$archivo = '';
							$subject = 'Creación de Usuario - Portal Cyberactivo';
							$body  	 = '<!DOCTYPE html>
										<html>
											<head>
												<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
												<meta name="author" content="Interactivo Contact Center"/>
												<meta name="description" content="Interactivo Contact Center"/>
												<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
												<title>Creaci&oacute;n de Usuario</title>
											</head>
											<body>
												<h2>Buen d&iacute;a</h2>
												<p>Usted ha sido registrado en el portal de Ciberactivo de Interactivo Contact Center.</p>
												<p>A continuaci&oacute;n se indicar&aacute;n las credenciales de acceso:</p>
												<ul>
													<li>Link de acceso: <a href="'.$url.'">'.$url.'</a></li>
													<li>Nombre: '.$data->nombres.' '.$data->apellidos1.' '.$data->apellidos2.'</li>
													<li>Usuario de acceso: '.$data->usaurio.'</li>
												</ul>
												<p>El usuario y la contraseña de acceso a la plataforma es el mismo usuario y contraseña de red asignado.</p>
												<table>
													<tr>
														<td><img src="https://www.interactivo.com.co/logo.png"></td>
														<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co">www.interctivo.com.co</a></p></td>
													</tr>
												</table>
												<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
												<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
											</body>
										</html>';
							//Envío de email
							if($correo != ''){
								$email->send($correo, $nombre, $subject, $body, $archivo);
							}
							$this->business->return->bool = true;
							$this->business->return->msg = 'Se creó el usuario correctamente';
						} else {
							$this->business->return->bool = false;
							$this->business->return->msg = 'Error en la creación del perfil';
						}
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

	public function data_usuario($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT a.id, a.usuario_red AS usuario, a.tipo_identificacion, a.identificacion, a.nombre, a.apellido1, a.apellido2, b.id_perfil AS perfil, a.email, a.estado, c.id_empresa, c.id_campana ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "LEFT JOIN re_usuario_perfil AS b ON a.id = b.id_usuario ";
			$query .= "LEFT JOIN re_usaurio_ec AS c ON a.id = c.id_usuario ";
			$query .= "WHERE a.id = '".$data->id_usuario."';";
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

	public function modificar_usuario($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//valida que campo empresa y campaña no esté vacío
		isset($data->empresa_m) ? $empresa = $data->empresa_m : $empresa = '0';
		isset($data->campana_m) ? $campana = $data->campana_m : $campana = '0';
		//Valida conexión a base de datos
		if($mysql){
			$query  = "UPDATE re_usuarios SET usuario_red = '".$data->usaurio_m."', tipo_identificacion = '".$data->tipo_identificacion_m."', identificacion = '".$data->identificacion_m."', nombre = '".$data->nombres_m."', apellido1 = '".$data->apellidos1_m."', apellido2 = '".$data->apellidos2_m."', email = '".$data->email_m."', estado = '".$data->estado_m."' WHERE id = '".$data->id_usuario_m."'; ";
			$result = $mysql->query($query);
			if($result){
				$query_perfil = "UPDATE re_usuario_perfil SET id_perfil = '".$data->perfil_m."' WHERE id_usuario = '".$data->id_usuario_m."';";
				$result_perfil = $mysql->query($query_perfil);
				if($result_perfil){
					$query_perfil_ec = "UPDATE re_usaurio_ec SET id_perfil = '".$data->perfil_m."', id_empresa  = '".$empresa."', id_campana  = '".$campana."' where id_usuario = '".$data->id_usuario_m."';";
					$result_perfil_ec = $mysql->query($query_perfil_ec);
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