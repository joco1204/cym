<?php
class Asesor{
	function __construct(){
		$this->business = new Business();
	}

	public function tabla_asesor(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT a.id, e.tipo_identificacion, a.identificacion, a.nombre, a.apellido1, a.apellido2, d.usuario_red AS usuario, b.empresa, c.campana, a.estado ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "LEFT JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query .= "LEFT JOIN ca_campana AS c ON a.id_campana = c.id ";
			$query .= "LEFT JOIN re_usuarios AS d ON a.identificacion = d.identificacion ";
			$query .= "LEFT JOIN pa_tipo_identificacion AS e ON d.tipo_identificacion = e.id;";
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

	public function crear_asesor($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$query  = "INSERT INTO ca_asesores (nombre, apellido1, apellido2, identificacion, id_empresa, id_campana, estado) VALUES ('".$data->nombre."', '".$data->apellido1."', '".$data->apellido2."', '".$data->identificacion."', '".$data->empresa."', '".$data->campana."', 'activo'); ";
			$result = $mysql->query($query);
			if($result){
				$query_usuario  = "INSERT INTO re_usuarios (usuario_red, tipo_identificacion, identificacion, nombre, apellido1, apellido2, estado) ";
				$query_usuario .= "VALUES ('".$data->usaurio."', '".$data->tipo_identificacion."', '".$data->identificacion."', '".$data->nombre."', '".$data->apellido1."', '".$data->apellido2."', 'activo');";
				$result_usuario = $mysql->query($query_usuario);
				if($result_usuario){
					$id_usaurio = $mysql->lastInsertId();
					//Inserta en usuarios perfil
					$query_perfil = "INSERT INTO re_usuario_perfil (id_usuario, id_perfil) VALUES ('".$id_usaurio."', '8'); ";
					$result_perfil = $mysql->query($query_perfil);
					if($result_perfil){
						//Inserta en usuarios empresa campaña
						$query_ec = "INSERT INTO re_usaurio_ec (id_usuario, id_perfil, id_empresa, id_campana) VALUES ('".$id_usaurio."', '8', '".$data->empresa."', '".$data->campana."');";
						$result_ec = $mysql->query($query_ec);
						if($result_ec){
							$this->business->return->bool = true;
							$this->business->return->msg = 'Se ha creado el asesor '.$data->nombre.' '.$data->apellido1.' correctamente';
						} else {
							$this->business->return->bool = false;
							$this->business->return->msg = 'Error al asociar la campaña al usuario';
						}
					} else {
						$this->business->return->bool = false;
						$this->business->return->msg = 'Error al crear el perfil';
					}
				} else {
					$this->business->return->bool = false;
					$this->business->return->msg = 'Error en la creación de usuario';
				}
			} else {
				$this->business->return->bool = false;
				$this->business->return->msg = 'Error en la creación de asesor';
			}
		} else {
			$this->business->return->bool = false;
			$this->business->return->msg = 'Error de conexión de base de datos';
		}
		return $this->business->return;
	}


	public function cargar_asesores($file){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		if($mysql){
			$fname = $file->name;
			$ext = explode(".",$fname);
			if(strtolower(end($ext)) == "csv" || strtolower(end($ext)) == "txt"){
				$file_tmp_name = $file->tmp_name;
				$handle = fopen($file_tmp_name, "r");
				while($data = fgetcsv($handle, 1000, ";")){
					$query_existencia = "SELECT identificacion FROM ca_asesores WHERE identificacion = '".$data[2]."';";
					$result_existencia = $mysql->query($query_existencia);
					if($result_existencia){
						$num_asesor = $result_existencia->rowCount();
						if($num_asesor == '0'){
							$query  = "INSERT INTO ca_asesores (nombre, apellido1, apellido2, identificacion, id_empresa, id_campana, estado) VALUES ( ";
							$query .= "'".$data[0]."', ";
							$query .= "'".$data[1]."', ";
							$query .= "'".$data[2]."', ";
							$query .= "'".$data[4]."', ";
							$query .= "'".$data[6]."', ";
							$query .= "'".$data[7]."', ";
							$query .= "'".$data[8]."'); ";
							$result = $mysql->query($query);
							if($result){
								$query_usuario  = "INSERT INTO re_usuarios (usuario_red, tipo_identificacion, identificacion, nombre, apellido1, apellido2, estado) ";
								$query_usuario .= "VALUES ('".$data[5]."', '".$data[3]."', '".$data[4]."', '".$data[0]."', '".$data[1]."', '".$data[2]."', 'activo');";
								$result_usuario = $mysql->query($query_usuario);
								if($result_usuario){
									$id_usaurio = $mysql->lastInsertId();
									//Inserta en usuarios perfil
									$query_perfil = "INSERT INTO re_usuario_perfil (id_usuario, id_perfil) VALUES ('".$id_usaurio."', '8'); ";
									$result_perfil = $mysql->query($query_perfil);
									if($result_perfil){
										//Inserta en usuarios empresa campaña
										$query_ec = "INSERT INTO re_usaurio_ec (id_usuario, id_perfil, id_empresa, id_campana) VALUES ('".$id_usaurio."', '8', '".$data[6]."', '".$data[7]."');";
										$result_ec = $mysql->query($query_ec);
										if($result_ec){
											$this->business->return->bool = true;
											$this->business->return->msg = 'Se realizó el cargue del archivo correctamente';
										} else {
											$this->business->return->bool = false;
											$this->business->return->msg = 'Error al asociar la campaña al usuario';
										}
									} else {
										$this->business->return->bool = false;
										$this->business->return->msg = 'Error al crear el perfil';
									}
								} else {
									$this->business->return->bool = false;
									$this->business->return->msg = 'Error en la creación de usuario';
								}
							} else {
								$this->business->return->bool = false;
								$this->business->return->msg = 'Error en la creación de asesor';
							}

						} else {
							$query  = "UPDATE ca_asesores SET nombre = '".$data[0]."', apellido1 = '".$data[1]."', apellido2 = '".$data[2]."', id_empresa = '".$data[6]."', id_campana = '".$data[7]."', estado = '".$data[8]."' WHERE identificacion = '".$data[4]."'; ";
							$result = $mysql->query($query);
							if($result){
								$query_usuario  = "UPDATE re_usuarios SET usuario_red = '".$data[5]."', tipo_identificacion = '".$data[3]."', nombre = '".$data[0]."', apellido1 = '".$data[1]."', apellido2 = '".$data[2]."', estado = '".$data[8]."' WHERE identificacion = '".$data[4]."'; ";
								$result_usuario = $mysql->query($query_usuario);
								if($result_usuario){
									$query_id_usuario = "SELECT id FROM re_usuarios WHERE identificacion = '".$data[4]."';";
									$result_id_usuario = $mysql->query($query_id_usuario);
									if($result_id_usuario){
										$row = $result->fetch(PDO::FETCH_OBJ);
										$query_perfil_ec = "UPDATE re_usaurio_ec SET id_empresa = '".$data[6]."', id_campana = '".$data[7]."' where id_usuario = '".$row->id."';";
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
										$this->business->return->msg = 'Error query';
									}
								} else {
									$this->business->return->bool = false;
									$this->business->return->msg = 'Error query';
								}

							} else {
								$this->business->return->bool = false;
								$this->business->return->msg = 'Error query';
							}
						}
					} else {
						$this->business->return->bool = false;
						$this->business->return->msg = 'Error query';
					}
				}
				fclose($handle);
				$this->business->return->bool = true;
				$this->business->return->msg = "Se cargó los asesores con éxito";
			} else {
				$this->business->return->bool = false;
				$this->business->return->msg = 'La extensión del archivo debe ser csv o tx';
			}
		} else {
			$this->business->return->bool = false;
			$this->business->return->msg = 'Error de conexión de base de datos';
		}
		return $this->business->return;
	}

	public function data_asesor($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT a.id, a.nombre, a.apellido1, a.apellido2, b.tipo_identificacion, a.identificacion, b.usuario_red AS usuario, a.id_empresa, a.id_campana, a.estado ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "LEFT JOIN re_usuarios AS b ON a.identificacion = b.identificacion ";
			$query .= "WHERE a.id = '".$data->id."';";
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

	public function modificar_asesor($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$query  = "UPDATE ca_asesores SET nombre = '".$data->nombre_m."', apellido1 = '".$data->apellido1_m."', apellido2 = '".$data->apellido2_m."', identificacion = '".$data->identificacion_m."', id_empresa = '".$data->empresa_m."', id_campana = '".$data->campana_m."', estado = '".$data->estado_m."' WHERE id = '".$data->id_asesor_m."'; ";
			$result = $mysql->query($query);
			if($result){
				$query_usuario  = "UPDATE re_usuarios SET usuario_red = '".$data->usuario_m."', tipo_identificacion = '".$data->tipo_identificacion_m."', nombre = '".$data->nombre_m."', apellido1 = '".$data->apellido1_m."', apellido2 = '".$data->apellido2_m."', estado = '".$data->estado_m."' WHERE identificacion = '".$data->identificacion_m."'; ";
				$result_usuario = $mysql->query($query_usuario);
				if($result_usuario){
					$query_id_usuario = "SELECT id FROM re_usuarios WHERE identificacion = '".$data->identificacion_m."';";
					$result_id_usuario = $mysql->query($query_id_usuario);
					if($result_id_usuario){
						$row = $result->fetch(PDO::FETCH_OBJ);
						$query_perfil_ec = "UPDATE re_usaurio_ec SET id_empresa  = '".$data->empresa_m."', id_campana  = '".$data->campana_m."' where id_usuario = '".$row->id."';";
						$result_perfil_ec = $mysql->query($query_perfil_ec);
						if($result_perfil_ec){
							$this->business->return->bool = true;
							$this->business->return->msg = 'Se ha modificado al asesor '.$data->nombre_m.' '.$data->apellido1_m.' correctamente';
						} else {
							$this->business->return->bool = false;
							$this->business->return->msg = 'Error al actualizar empresa y campaña';	
						}
					} else {
						$this->business->return->bool = false;
						$this->business->return->msg = 'Error query';
					}
				} else {
					$this->business->return->bool = false;
					$this->business->return->msg = 'Error query';
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

	public function informe_general_asesor($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query_asesor  = "SELECT id FROM ca_asesores WHERE identificacion = '".$data->identificacion."' AND id_empresa = '".$data->empresa."' AND id_campana = '".$data->campana."'; ";
			$result_asesor = $mysql->query($query_asesor);
			if($result_asesor){
				while($row_asesor = $result_asesor->fetch(PDO::FETCH_OBJ)){
					$query_num = "SELECT COUNT(*) AS num_monitoreos FROM ca_monitoreo_asesor WHERE id_asesor = '".$row_asesor->id."' AND fecha_registro BETWEEN '".$data->desde."' AND '".$data->hasta."';";
					$result_num = $mysql->query($query_num);
					while($row_num = $result_num->fetch(PDO::FETCH_OBJ)){
						$query_total  = "SELECT a.id_asesor,  b.id_error, d.error, c.calculo_valor, FORMAT(SUM(b.valor_porcentaje_cumplimiento)/".$row_num->num_monitoreos.",0) AS valor_porcentaje_cumplimiento ";
						$query_total .= "FROM ca_monitoreo_asesor AS a ";
						$query_total .= "INNER JOIN ca_monitoreo_asesor_detallado AS b ON a.id = b.id_monitoreo_asesor ";
						$query_total .= "INNER JOIN ca_error AS c ON b.id_error = c.id ";
						$query_total .= "INNER JOIN pa_tipo_error AS d ON c.tipo_error = d.id ";
						$query_total .= "WHERE a.id_asesor = '".$row_asesor->id."' AND a.fecha_registro BETWEEN '".$data->desde."' AND '".$data->hasta."' AND c.calculo_valor = 'sum' ";
						$query_total .= "GROUP BY a.id_asesor,  b.id_error, d.error, c.calculo_valor; ";

					}
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
}
?>