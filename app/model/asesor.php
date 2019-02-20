<?php
error_reporting(1);
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
			$query  = "SELECT a.id, e.tipo_identificacion, a.identificacion, a.nombre, a.apellido1, a.apellido2, d.usuario_red AS usuario, a.estado ";
			$query .= "FROM ca_asesores AS a ";
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
			$query_asesor  = "INSERT INTO ca_asesores (nombre, apellido1, apellido2, identificacion, estado) VALUES ('".$data->nombre."', '".$data->apellido1."', '".$data->apellido2."', '".$data->identificacion."', 'activo'); ";
			$result_asesor = $mysql->query($query_asesor);
			if($result_asesor){
				$id_asesor = $mysql->lastInsertId();
				for ($i=1; $i <= $data->numero_campanas; $i++){
					$empresa = 'empresa_'.$i;
					$campana = 'campana_'.$i;
					$lider = 'lider_'.$i;
					$formador = 'formador_'.$i;
					$estado = 'estado_campana_'.$i;
					//Inserta en asesor empresa campaña
					$query_asesor_ec = "INSERT INTO ca_asesores_ec (id_asesor, id_empresa, id_campana, id_lider, id_formador, estado) VALUES ('".$id_asesor."', '".$data->$empresa."', '".$data->$campana."', '".$data->$lider."', '".$data->$formador."', '".$data->$estado."');";
					$mysql->query($query_asesor_ec);
				}
				$query_usuario  = "INSERT INTO re_usuarios (usuario_red, tipo_identificacion, identificacion, nombre, apellido1, apellido2, email, estado) ";
				$query_usuario .= "VALUES ('".$data->usuario."', '".$data->tipo_identificacion."', '".$data->identificacion."', '".$data->nombre."', '".$data->apellido1."', '".$data->apellido2."', '', 'activo');";
				$result_usuario = $mysql->query($query_usuario);
				if($result_usuario){
					$id_usaurio = $mysql->lastInsertId();
					//Inserta en usuarios perfil
					$query_perfil = "INSERT INTO re_usuario_perfil (id_usuario, id_perfil) VALUES ('".$id_usaurio."', '8'); ";
					$result_perfil = $mysql->query($query_perfil);
					if($result_perfil){
						for ($i=1; $i <= $data->numero_campanas; $i++){
							$empresa = 'empresa_'.$i;
							$campana = 'campana_'.$i;
							//Inserta en usuarios empresa campaña
							$query_ec = "INSERT INTO re_usaurio_ec (id_usuario, id_perfil, id_empresa, id_campana, estado) VALUES ('".$id_usaurio."', '8', '".$data->$empresa."', '".$data->$campana."', 'activo');";
							$result_ec = $mysql->query($query_ec);
							if($result_ec){
								$this->business->return->bool = true;
								$this->business->return->msg = 'Se ha creado el asesor '.$data->nombre.' '.$data->apellido1.' correctamente';
							} else {
								$this->business->return->bool = false;
								$this->business->return->msg = 'Error al asociar la campaña al usuario';
							}
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
				while($data = fgetcsv($handle, 10000, ";")){
					$query_existencia = "SELECT id, identificacion FROM ca_asesores WHERE identificacion = '".$data[3]."';";
					$result_existencia = $mysql->query($query_existencia);
					if($result_existencia){
						$num_asesor = $result_existencia->rowCount();
						if($num_asesor == '0'){
							$query = "INSERT INTO ca_asesores (nombre, apellido1, apellido2, identificacion, estado) VALUES ('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."', '".$data[7]."');";
							$result = $mysql->query($query);
							if($result){
								$id_asesor = $mysql->lastInsertId();
								$query_campana = "INSERT INTO ca_asesores_ec (id_asesor, id_empresa, id_campana, id_lider, id_formador, estado) VALUES ('".$id_asesor."', '".$data[5]."', '".$data[6]."', '".$data[8]."', '".$data[9]."', '".$data[7]."');";
								$result_campana = $mysql->query($query_campana);
								if($result_campana){
									$query_usuario  = "INSERT INTO re_usuarios (usuario_red, tipo_identificacion, identificacion, nombre, apellido1, apellido2, email, estado) ";
									$query_usuario .= "VALUES ('".$data[4]."', '1', '".$data[3]."', '".$data[0]."', '".$data[1]."', '".$data[2]."', '', '".$data[7]."');";
									$result_usuario = $mysql->query($query_usuario);
									if($result_usuario){
										$id_usuario = $mysql->lastInsertId();
										$query_perfil = "INSERT INTO re_usuario_perfil (id_usuario, id_perfil) VALUES ('".$id_usuario."', '8'); ";
										$result_perfil = $mysql->query($query_perfil);
										if($result_perfil){
											$query_ec = "INSERT INTO re_usaurio_ec (id_usuario, id_perfil, id_empresa, id_campana, estado) VALUES ('".$id_usuario."', '8', '".$data[5]."', '".$data[6]."', '".$data[7]."');";
											$result_ec = $mysql->query($query_ec);
											if($result_ec){
												$this->business->return->bool = true;
												$this->business->return->msg = 'Se realizó el cargue del archivo correctamente';
											} else {
												$this->business->return->bool = false;
												$this->business->return->msg = 'Error al asociar la campaña al usuario del asesor';
											}
										} else {
											$this->business->return->bool = false;
											$this->business->return->msg = 'Error al asociar el perfil al usuario';
										}
									} else {
										$this->business->return->bool = false;
										$this->business->return->msg = 'Error al crear el usuario';
									}
								} else {
									$this->business->return->bool = false;
									$this->business->return->msg = 'Error asociar la campaña al asesor';
								}
							} else {
								$this->business->return->bool = false;
								$this->business->return->msg = 'Error en la creación de asesor';
							}
						} else {
							while($row_existencia = $result_existencia->fetch(PDO::FETCH_OBJ)){
								$query  = "UPDATE ca_asesores SET nombre = '".$data[0]."', apellido1 = '".$data[1]."', apellido2 = '".$data[2]."', estado = '".$data[7]."' WHERE identificacion = '".$row_existencia->identificacion."'; ";
								$result = $mysql->query($query);
								if($result){
									$query_ec = "SELECT id FROM ca_asesores_ec WHERE id_asesor = '".$row_existencia->id."';";
									$result_ec = $mysql->query($query_ec);
									while($row_ec = $result_ec->fetch(PDO::FETCH_OBJ)){
										$query_update_ec = "UPDATE ca_asesores_ec SET id_empresa = '".$data[5]."', id_campana = '".$data[6]."', id_lider = '".$data[8]."', id_formador = '".$data[9]."', estado = '".$data[7]."' WHERE id = '".$row_ec->id."' AND id_asesor = '".$row_existencia->id."';";
										$result_update_ec = $mysql->query($query_update_ec);
										if($result_update_ec){
											$query_usuario  = "UPDATE re_usuarios SET usuario_red = '".$data[4]."', nombre = '".$data[0]."', apellido1 = '".$data[1]."', apellido2 = '".$data[2]."', estado = '".$data[7]."' WHERE identificacion = '".$row_existencia->identificacion."'; ";
											$result_usuario = $mysql->query($query_usuario);
											if($result_usuario){
												$query_usuario_c = "SELECT id FROM re_usuarios WHERE identificacion = '".$row_existencia->identificacion."';";
												$result_usuario_c = $mysql->query($query_usuario_c);
												while($row_usuario_c = $result_usuario_c->fetch(PDO::FETCH_OBJ)){
													$query_ec = "SELECT id FROM re_usaurio_ec WHERE id_usuario = '".$row_usuario_c->id."'";
													$result_ec = $mysql->query($query_ec);
													while($row_ec = $result_ec->fetch(PDO::FETCH_OBJ)){
														$query_perfil_ec = "UPDATE re_usaurio_ec SET id_empresa = '".$data[5]."', id_campana = '".$data[6]."', estado = '".$data[7]."' WHERE id = '".$row_ec->id."' AND id_usuario = '".$row_usuario_c->id."';";
														$result_perfil_ec = $mysql->query($query_perfil_ec);
														if($result_perfil_ec){
															$this->business->return->bool = true;
															$this->business->return->msg = 'Perfil de usuario actualizado con éxito';
														} else {
															$this->business->return->bool = false;
															$this->business->return->msg = 'Error al actualizar empresa y campaña';	
														}
													}
												}
											} else {
												$this->business->return->bool = false;
												$this->business->return->msg = 'Error al actualziar el usaurio del asesor';
											}
										} else {
											$this->business->return->bool = false;
											$this->business->return->msg = 'Error al actualizar la campaña del asesor';
										}
									}
								} else {
									$this->business->return->bool = false;
									$this->business->return->msg = 'Error al actualizar al asesor';
								}
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
			$query  = "SELECT a.id, a.nombre, a.apellido1, a.apellido2, b.tipo_identificacion, a.identificacion, b.usuario_red AS usuario, a.estado ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "LEFT JOIN re_usuarios AS b ON a.identificacion = b.identificacion ";
			$query .= "WHERE a.id = '".$data->id."'; ";
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


	public function asesor_ec($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayTabla = array();
			$query  = "SELECT a.id_asesor, a.id_empresa, b.empresa, a.id_campana, c.campana, a.estado, a.id_lider, CONCAT(d.nombre,' ',d.apellido1,' ',d.apellido2) AS nombre_lider, a.id_formador, CONCAT(e.nombre,' ',e.apellido1,' ',e.apellido2) AS nombre_lider ";
			$query .= "FROM ca_asesores_ec AS a ";
			$query .= "LEFT JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query .= "LEFT JOIN ca_campana AS c ON a.id_campana = c.id ";
			$query .= "LEFT JOIN re_usuarios AS d ON a.id_lider = d.id ";
			$query .= "LEFT JOIN re_usuarios AS e ON a.id_formador = e.id ";
			$query .= "WHERE a.id_asesor = '".$data->id."';";
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
			//Consulta que muestra el id del asesor
			$query_asesor  = "SELECT DISTINCT a.id FROM ca_asesores AS a LEFT JOIN ca_asesores_ec AS b ON a.id = b.id_asesor WHERE a.identificacion = '".$data->identificacion."' AND b.id_empresa = '".$data->empresa."' AND b.id_campana = '".$data->campana."';";
			$result_asesor = $mysql->query($query_asesor);
			if($result_asesor){
				while($row_asesor = $result_asesor->fetch(PDO::FETCH_OBJ)){
					//Consulta que muestra los numeros de monitoreos
					$query_num = "SELECT COUNT(*) AS num_monitoreos FROM ca_monitoreo_asesor WHERE id_asesor = '".$row_asesor->id."' AND fecha_registro BETWEEN '".$this->primer_dia()."' AND '".$this->ultimo_dia()."';";
					$result_num = $mysql->query($query_num);
					while ($row_num = $result_num->fetch(PDO::FETCH_OBJ)){
						//Consulta que muestra la información del monitoreo
						$query_total  = "SELECT a.id_asesor, a.id_error, a.error, a.siglas, a.tipo_error, a.color_informe, FORMAT((SUM(a.porcentaje)/".$row_num->num_monitoreos."), 0) AS porcentaje ";
						$query_total .= "FROM ca_monitoreo_asesor_detallado_general AS a ";
						$query_total .= "WHERE id_asesor = '".$row_asesor->id."' AND a.fecha_llamada BETWEEN '".$this->primer_dia()."' AND '".$this->ultimo_dia()."' ";
						$query_total .= "GROUP BY a.id_asesor, a.id_error, a.error, a.siglas, a.tipo_error, a.color_informe; ";
						$result_total = $mysql->query($query_total);
						while($row_total = $result_total->fetch(PDO::FETCH_OBJ)){
							array_push($arrayTabla, $row_total);
						}
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
	
	//
	public function fechas_monitoreo($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayFechas = array();
			//Consulta reporte detallado
			$query  = "SELECT a.fecha_registro ";
			$query .= "FROM ca_monitoreo_asesor AS a ";
			$query .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
			$query .= "WHERE b.identificacion = '".$data->identificacion."' ";
			$query .= "ORDER BY a.id ASC;";
			$result = $mysql->query($query);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){	
					array_push($arrayFechas, $row);
				}
				$this->business->return->bool = true;
				$this->business->return->msg = json_encode($arrayFechas);
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

	public function lider_info($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			//Consulta reporte detallado
			$query  = "SELECT a.id AS id_usuario, CONCAT(a.nombre, ' ',a.apellido1,' ',a.apellido2) AS nombre_usuario ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "LEFT JOIN re_usaurio_ec AS b ON a.id = b.id_usuario ";
			$query .= "WHERE b.id_perfil IN (1, 2, 4) AND b.id_campana IN (0, 0, ".$data->id_campana.") AND a.estado = 'activo';";
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

	public function formador_info($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			//Consulta reporte detallado
			$query  = "SELECT a.id AS id_usuario, CONCAT(a.nombre, ' ',a.apellido1,' ',a.apellido2) AS nombre_usuario ";
			$query .= "FROM re_usuarios AS a ";
			$query .= "LEFT JOIN re_usaurio_ec AS b ON a.id = b.id_usuario ";
			$query .= "WHERE b.id_perfil IN (1, 2, 6) AND b.id_campana IN (0, ".$data->id_campana.") AND a.estado = 'activo';";
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

	public function primer_dia(){
		$month = date('m');
		$year = date('Y');
		return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
	}

	public function ultimo_dia(){ 
		$month = date('m');
		$year = date('Y');
		$day = date("d", mktime(0,0,0, $month+1, 0, $year));
		return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
	}

}
?>