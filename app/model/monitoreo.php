<?php
class Monitoreo{
	function __construct(){
		$this->business = new Business();
	}

	public function matriz_monitoreo($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query   = "SELECT id FROM ca_matriz ";
			$query  .= "WHERE id_empresa = '".$data->id_empresa."' AND id_campana = '".$data->id_campana."' AND estado = 'activo';";
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

	public function tipificacion(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id, nombre FROM ca_tipificacion WHERE estado = 'activo';";
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

	public function solucion(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id, tipos FROM ca_solucion WHERE estado = 'activo';";
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

	public function audio(){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id, audio FROM ca_audio WHERE estado = 'activo';";
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

	public function tipo_error($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query   = "SELECT a.id AS id_error, b.error AS tipo_error, a.calculo_valor ";
			$query  .= "FROM ca_error AS a ";
			$query  .= "JOIN pa_tipo_error AS b ON a.tipo_error = b.id ";
			$query  .= "WHERE a.id_matriz = '".$data->id_matriz."' AND a.estado = 'activo';";

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

	public function item_error($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query   = "SELECT id, item, valor, strike FROM ca_item WHERE id_matriz = '".$data->id_matriz."' AND id_error = '".$data->id_error."' AND estado = 'activo'; ";
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

	public function punto_entrenamiento($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query   = "SELECT id, punto_entrenamiento FROM ca_punto_entrenamiento WHERE id_item = '".$data->id_item."';";
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

	public function data_monitoreo($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT a.id AS id_asesor, b.id AS id_agenda, a.identificacion, a.nombre, a.apellido1, a.apellido2, b.fecha_monitoreo ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "JOIN ca_agenda_monitoreo AS b ON a.id = b.id_asesor ";
			$query .= "WHERE b.id = '".$data->id_agenda."' AND b.id_empresa = '".$data->id_empresa."' AND b.id_campana = '".$data->id_campana."' AND b.id_asesor = '".$data->id_asesor."'; ";
			$result = $mysql->query($query);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					$queryId = "SELECT MAX(id) AS id_monitoreo FROM ca_monitoreo_asesor;";
					$resultId = $mysql->query($queryId);
					$rowId = $resultId->fetch(PDO::FETCH_OBJ);

					if($rowId->id_monitoreo == null){
						$row->id_monitoreo = 1;
					} else {
						$row->id_monitoreo = $rowId->id_monitoreo;
					}
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

	public function inserta_monitoreo($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		$email_analista = $this->business->email;
		$email_lider = $this->business->email;
		$email_formador = $this->business->email;
		//Valida conexión a base de datos
		if($mysql){
			$query  = "INSERT INTO ca_monitoreo_asesor (id_agenda_monitoreo, id_asesor, id_analista, fecha_llamada, hora_llamada, tipificacion, id_llamada, observacion, solucion, fallas_audio) VALUES ('".$data->id_agenda."', '".$data->id_asesor."', '".$data->id_analista."', '".$data->fechas_llamada."', '".$data->hora_llamada."', '".$data->tipificacion."', '".$data->id_llamada."', '".$data->observacion."', '".$data->solucion."', '".$data->audio."'); ";
			$result = $mysql->query($query);
			//Obtiene el id del último monitoreo insertado
			$id_monitoreo = $mysql->lastInsertId();
			//Actualiza el estado del monitoreo realizado
			$query_agenda = "UPDATE ca_agenda_monitoreo SET estado = '1' WHERE id = '".$data->id_agenda."';";
			$mysql->query($query_agenda);
			if($result){
				$num_error = $data->num_error;
				for($i = 1; $i <= $num_error; $i++){
					$item 		= 'num_item_'.$i;
					$id_error 	= 'id_num_error_'.$i;
					$num_item 	= $data->$item;
					for($j = 1; $j <= $num_item; $j++){
						$id_num_item					= 'id_num_item_'.$i.'_'.$j;
						$valor_cumplimiento 			= 'valor_cumplimiento_'.$i.'_'.$j;
						$valor_porcentaje_cumplimiento 	= 'valor_porcentaje_cumplimiento_'.$i.'_'.$j;
						$punto_item 					= 'punto_item_'.$i.'_'.$j;
						
						isset($data->$valor_cumplimiento) ? $valor_cumplimiento = $data->$valor_cumplimiento : $valor_cumplimiento = '0';
						isset($data->$valor_porcentaje_cumplimiento) ? $valor_porcentaje = $data->$valor_porcentaje_cumplimiento : $valor_porcentaje = '0';
						isset($data->$punto_item) ? $punto_entrenamiento = $data->$punto_item : $punto_entrenamiento = '0';

						$query_item = "INSERT INTO ca_monitoreo_asesor_detallado (id_monitoreo_asesor, id_error, id_item, valor_cumplimiento, valor_porcentaje_cumplimiento, id_punto_entrenamiento) VALUES ('".$id_monitoreo."', '".$data->$id_error."', '".$data->$id_num_item."', '".$valor_cumplimiento."', '".$valor_porcentaje."', '".$punto_entrenamiento."');";
						$result_item = $mysql->query($query_item);
					}
				}
				$query_historico  = "SELECT DISTINCT a.id_monitoreo, a.id_asesor, b.id_empresa, b.id_campana, b.id_lider, b.id_formador, a.porcentaje, a.fecha_registro ";
				$query_historico .= "FROM ca_monitoreo_asesor_detallado_general AS a ";
				$query_historico .= "LEFT JOIN ca_asesores_ec AS b ON a.id_asesor = b.id_asesor ";
				$query_historico .= "WHERE a.id_asesor = '".$data->id_asesor."' AND a.fecha_registro BETWEEN '".$this->periodo_tiempo_inicio()."' AND '".$this->periodo_tiempo_fin()."' AND a.porcentaje = '0';";
				$result_historico = $mysql->query($query_historico);
				while($row_historico = $result_historico->fetch(PDO::FETCH_OBJ)){
					$query_num_alarma  = "SELECT COUNT(*) AS num_alarma ";
					$query_num_alarma .= "FROM ca_alarma_monitoreo WHERE id_monitoreo = '".$row_historico->id_monitoreo."'; ";
					$result_num_alarma = $mysql->query($query_num_alarma);
					$row_num_alarma = $result_num_alarma->fetch(PDO::FETCH_OBJ);
					if($row_num_alarma->num_alarma == 0){
						$query_insert_alarma  = "INSERT INTO ca_alarma_monitoreo (id_monitoreo, id_asesor, id_empresa, id_campana, id_analista, id_lider, id_formador, fecha_registro, estado) ";
						$query_insert_alarma .= "VALUES ('".$row_historico->id_monitoreo."', '".$row_historico->id_asesor."', '".$row_historico->id_empresa."', '".$row_historico->id_campana."', '".$data->id_analista."', '".$row_historico->id_lider."', '".$row_historico->id_formador."', '".$row_historico->fecha_registro."', 'registrado');";
						$mysql->query($query_insert_alarma);
					}
				}

				$query_alarma_monitoreo  = "SELECT a.id, a.id_monitoreo, a.id_empresa, a.id_campana, a.fecha_registro, a.estado, ";
				$query_alarma_monitoreo .= "a.id_asesor, CONCAT(b.nombre,' ',b.apellido1,' ',b.apellido2) AS asesor, b.identificacion AS identificacion_asesor, ";
				$query_alarma_monitoreo .= "a.id_analista, CONCAT(c.nombre,' ',c.apellido1,' ',c.apellido2) AS analista, c.email AS email_analista, ";
				$query_alarma_monitoreo .= "a.id_lider, CONCAT(d.nombre,' ',d.apellido1,' ',d.apellido2) AS lider, d.email AS email_lider, ";
				$query_alarma_monitoreo .= "a.id_formador, CONCAT(e.nombre,' ',e.apellido1,' ',e.apellido2) AS formador, e.email AS email_formador ";
				$query_alarma_monitoreo .= "FROM ca_alarma_monitoreo AS a ";
				$query_alarma_monitoreo .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
				$query_alarma_monitoreo .= "LEFT JOIN re_usuarios AS c ON a.id_analista = c.id ";
				$query_alarma_monitoreo .= "LEFT JOIN re_usuarios AS d ON a.id_lider = d.id ";
				$query_alarma_monitoreo .= "LEFT JOIN re_usuarios AS e ON a.id_formador = e.id ";
				$query_alarma_monitoreo .= "WHERE a.id_asesor = '".$data->id_asesor."'; ";				
				$result_alarma_monitoreo = $mysql->query($query_alarma_monitoreo);

				$i = 0;
				
				while($row_alarma_monitoreo = $result_alarma_monitoreo->fetch(PDO::FETCH_OBJ)){
					$i++;
					$query_count_alarma = "SELECT COUNT(*) AS num_monitoreos FROM ca_alarma_monitoreo WHERE id_asesor = '".$data->id_asesor."' AND fecha_registro BETWEEN '".$this->periodo_tiempo_inicio()."' AND '".$this->periodo_tiempo_fin()."'; ";
					$result_count_alarma = $mysql->query($query_count_alarma);
					$row_count_alarma = $result_count_alarma->fetch(PDO::FETCH_OBJ);

					if($i == '1'){
						if(($i == $row_count_alarma->num_monitoreos) && ($row_alarma_monitoreo->estado == 'registrado')){
							
							//Email de alarma del analista
							$correo1  = $row_alarma_monitoreo->email_analista;
							$nombre1  = $row_alarma_monitoreo->analista;
							$archivo1 = '';
							$subject1 = 'Notificación de Alarma Cyberactivo (Primera vez)';
							$body1  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' el d&iacute;a '.$row_alarma_monitoreo->fecha_registro.' quien tuvo afectaci&oacute;n  en '; 
										$query_error1 = "SELECT b.error FROM ca_monitoreo_asesor_detallado AS a LEFT JOIN pa_tipo_error AS b ON a.id_error = b.id  AND a.id_monitoreo_asesor = '".$row_alarma_monitore->id_monitoreo."'; ";
										$result_error1 = $mysql->query($query_error1);
										while($row_error1 = $result_error1->fetch(PDO::FETCH_OBJ)){
											$body1  	 .= $row_error1->error.'';
										}
							$body1  	 .= '</p>
										<p>Se realizar&aacute; feedback dentro de las pr&oacute;ximas 24 Hrs.</p>
										<p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_analista->send($correo1, $nombre1, $subject1, $body1, $archivo1);
							
							//Email de alarma del lider
							$correo2  = $row_alarma_monitoreo->email_lider;
							$nombre2  = $row_alarma_monitoreo->lider;
							$archivo2 = '';
							$subject2 = 'Notificación de Alarma Cyberactivo (Primera vez)';
							$body2  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' el d&iacute;a '.$row_alarma_monitoreo->fecha_registro.' quien tuvo afectaci&oacute;n  en '; 
										$query_error2 = "SELECT b.error FROM ca_monitoreo_asesor_detallado AS a LEFT JOIN pa_tipo_error AS b ON a.id_error = b.id  AND a.id_monitoreo_asesor = '".$row_alarma_monitore->id_monitoreo."'; ";
										$result_error2 = $mysql->query($query_error2);
										while($row_error2 = $result_error1->fetch(PDO::FETCH_OBJ)){
											$body2  	 .= $row_error2->error.'';
										}
							$body2  	 .= '</p>
										<p>Se realizar&aacute; feedback dentro de las pr&oacute;ximas 24 Hrs.</p>
										<p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_lider->send($correo2, $nombre2, $subject2, $body2, $archivo2);
							
							//Email de alarma del formador
							$correo3  = $row_alarma_monitoreo->email_formador;
							$nombre3  = $row_alarma_monitoreo->formador;
							$archivo3 = '';
							$subject3 = 'Notificación de Alarma Cyberactivo (Segunda Vez)';
							$body3  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' el d&iacute;a '.$row_alarma_monitoreo->fecha_registro.' quien tuvo afectaci&oacute;n  en '; 
										$query_error3 = "SELECT b.error FROM ca_monitoreo_asesor_detallado AS a LEFT JOIN pa_tipo_error AS b ON a.id_error = b.id  AND a.id_monitoreo_asesor = '".$row_alarma_monitore->id_monitoreo."'; ";
										$result_error3 = $mysql->query($query_error3);
										while($row_error3 = $result_error3->fetch(PDO::FETCH_OBJ)){
											$body3  	 .= $row_error3->error.'';
										}
							$body3  	 .= '</p>
										<p>Se realizar&aacute; feedback dentro de las pr&oacute;ximas 24 Hrs.</p>
										<p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_formador->send($correo3, $nombre3, $subject3, $body3, $archivo3);
						}
					}

					if($i == '2'){
						if(($i == $row_count_alarma->num_monitoreos) && ($row_alarma_monitoreo->estado == 'registrado')){
							
							//Email de alarma del analista
							$correo1  = $row_alarma_monitoreo->email_analista;
							$nombre1  = $row_alarma_monitoreo->analista;
							$archivo1 = '';
							$subject1 = 'Notificación de Alarma Cyberactivo (Segunda Vez)';
							$body1  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' el d&iacute;a '.$row_alarma_monitoreo->fecha_registro.' quien tuvo afectaci&oacute;n  en '; 
										$query_error1 = "SELECT b.error FROM ca_monitoreo_asesor_detallado AS a LEFT JOIN pa_tipo_error AS b ON a.id_error = b.id  AND a.id_monitoreo_asesor = '".$row_alarma_monitore->id_monitoreo."'; ";
										$result_error1 = $mysql->query($query_error1);
										while($row_error1 = $result_error1->fetch(PDO::FETCH_OBJ)){
											$body1  	 .= $row_error1->error.'';
										}
							$body1  	 .= '</p>
										<p>Se realizar&aacute; feedback dentro de las pr&oacute;ximas 24 Hrs.</p>
										<p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_analista->send($correo1, $nombre1, $subject1, $body1, $archivo1);
							
							//Email de alarma del lider
							$correo2  = $row_alarma_monitoreo->email_lider;
							$nombre2  = $row_alarma_monitoreo->lider;
							$archivo2 = '';
							$subject2 = 'Notificación de Alarma Cyberactivo (Segunda Vez)';
							$body2  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' el d&iacute;a '.$row_alarma_monitoreo->fecha_registro.' quien tuvo afectaci&oacute;n  en '; 
										$query_error2 = "SELECT b.error FROM ca_monitoreo_asesor_detallado AS a LEFT JOIN pa_tipo_error AS b ON a.id_error = b.id  AND a.id_monitoreo_asesor = '".$row_alarma_monitore->id_monitoreo."'; ";
										$result_error2 = $mysql->query($query_error2);
										while($row_error2 = $result_error2->fetch(PDO::FETCH_OBJ)){
											$body2  	 .= $row_error2->error.'';
										}
							$body2  	 .= '</p>
										<p>Se realizar&aacute; feedback dentro de las pr&oacute;ximas 24 Hrs.</p>
										<p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_lider->send($correo2, $nombre2, $subject2, $body2, $archivo2);
							
							//Email de alarma del formador
							$correo3  = $row_alarma_monitoreo->email_formador;
							$nombre3  = $row_alarma_monitoreo->formador;
							$archivo3 = '';
							$subject3 = 'Notificación de Alarma Cyberactivo (Segunda vez)';
							$body3  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' el d&iacute;a '.$row_alarma_monitoreo->fecha_registro.' quien tuvo afectaci&oacute;n  en '; 
										$query_error3 = "SELECT b.error FROM ca_monitoreo_asesor_detallado AS a LEFT JOIN pa_tipo_error AS b ON a.id_error = b.id  AND a.id_monitoreo_asesor = '".$row_alarma_monitore->id_monitoreo."'; ";
										$result_error3 = $mysql->query($query_error3);
										while($row_error3 = $result_error3->fetch(PDO::FETCH_OBJ)){
											$body3  	 .= $row_error3->error.'';
										}
							$body3  	 .= '</p>
										<p>Se realizar&aacute; feedback dentro de las pr&oacute;ximas 24 Hrs.</p>
										<p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_formador->send($correo3, $nombre3, $subject3, $body3, $archivo3);
						}
					}

					if($i >= '3'){
						if(($i == $row_count_alarma->num_monitoreos) && ($row_alarma_monitoreo->estado == 'registrado')){
							//Email de alarma del analista
							$correo1  = $row_alarma_monitoreo->email_analista;
							$nombre1  = $row_alarma_monitoreo->analista;
							$archivo1 = '';
							$subject1 = 'Notificación de Alarma Cyberactivo (Tercera vez)';
							$body1  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' quien tuvo una tercera afectaci&oacute;n  en EC, motivo por el cual se solicita Aplicar proceso Jur&iacute;dico en caso tal que el asesor lleve m&aacute;s de 2 meses de vinculaci&oacute;n en la Campa&ntilde;a.</p>
										<p>Fechas de afectaci&oacute;n: ';
										$query_fechas1 = "SELECT fecha_registro FROM ca_alarma_monitoreo WHERE id_asesor = '".$data->id_asesor."' AND fecha_registro BETWEEN '".$this->periodo_tiempo_inicio()."' AND '".$this->periodo_tiempo_fin()."' AND estado = 'notificado'; ";
										$result_fechas1 = $mysql->query($query_fechas1);
										while($row_fecha1 = $result_fechas1->fetch(PDO::FETCH_OBJ)){
											$body1  .= $row_fecha1->fecha_registro.', ';
											
										}
							$body1 		.= '</p><p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_analista->send($correo1, $nombre1, $subject1, $body1, $archivo1);
							
							//Email de alarma del lider
							$correo2  = $row_alarma_monitoreo->email_lider;
							$nombre2  = $row_alarma_monitoreo->lider;
							$archivo2 = '';
							$subject2 = 'Notificación de Alarma Cyberactivo (Tercera vez)';
							$body2  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' quien tuvo una tercera afectaci&oacute;n  en EC, motivo por el cual se solicita Aplicar proceso Jur&iacute;dico en caso tal que el asesor lleve m&aacute;s de 2 meses de vinculaci&oacute;n en la Campa&ntilde;a.</p>
										<p>Fechas de afectaci&oacute;n: ';
										$query_fechas2 = "SELECT fecha_registro FROM ca_alarma_monitoreo WHERE id_asesor = '".$data->id_asesor."' AND fecha_registro BETWEEN '".$this->periodo_tiempo_inicio()."' AND '".$this->periodo_tiempo_fin()."' AND estado = 'notificado'; ";
										$result_fechas2 = $mysql->query($query_fechas2);
										while($row_fecha2 = $result_fechas2->fetch(PDO::FETCH_OBJ)){
											$body2  .= $row_fecha2->fecha_registro.', ';
											
										}
							$body2 		.= '</p><p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_lider->send($correo2, $nombre2, $subject2, $body2, $archivo2);

							//Email de alarma del formador
							$correo3  = $row_alarma_monitoreo->email_formador;
							$nombre3  = $row_alarma_monitoreo->formador;
							$archivo3 = '';
							$subject3 = 'Notificación de Alarma Cyberactivo (Tercera vez)';
							$body3  	 = '
								<!DOCTYPE html>
									<html>
										<head>
											<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
											<meta name="author" content="Interactivo Contact Center"/>
											<meta name="description" content="Interactivo Contact Center"/>
											<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
											<title>Notificación de alarma</title>
										</head>
									<body>
										<p>Buen d&iacute;a, se realiza auditor&iacute;a al asesor '.$row_alarma_monitoreo->asesor.' con identificaci&oacute;n '.$row_alarma_monitoreo->identificacion_asesor.' quien tuvo una tercera afectaci&oacute;n  en EC, motivo por el cual se solicita Aplicar proceso Jur&iacute;dico en caso tal que el asesor lleve m&aacute;s de 2 meses de vinculaci&oacute;n en la Campa&ntilde;a.</p>
										<p>Fechas de afectaci&oacute;n: ';
										$query_fechas3 = "SELECT fecha_registro FROM ca_alarma_monitoreo WHERE id_asesor = '".$data->id_asesor."' AND fecha_registro BETWEEN '".$this->periodo_tiempo_inicio()."' AND '".$this->periodo_tiempo_fin()."' AND estado = 'notificado'; ";
										$result_fechas3 = $mysql->query($query_fechas3);
										while($row_fecha3 = $result_fechas3->fetch(PDO::FETCH_OBJ)){
											$body3  .= $row_fecha3->fecha_registro.', ';
											
										}
							$body3 		.= '</p><p>Cordialmente, '.$row_alarma_monitoreo->analista.'</p>
										<table>
											<tr>
												<td><img src="http://www.interactivo.com.co/logo.png"></td>
												<td><p><h3>Calidad ICC</h3><a href="www.interctivo.com.co ">www.interctivo.com.co </a></p></td>
											</tr>
										</table>
										<p>NOTA CONFIDENCIAL: La informaci&oacute;n contenida en este e-mail y en todos sus archivos anexos, es confidencial y constituye un secreto empresarial de INTERACTIVO CONTACT CENTER S.A. Por lo tanto solo es  ara uso individual del destinatario o entidad a quienes est&aacute; dirigido. Si usted no es el destinatario, cualquier almacenamiento, distribuci&oacute;n, divulgaci&oacute;n o copia de este mensaje est&aacute; estrictamente prohibida y sancionada por la ley. Si por error recibe este mensaje, presentamos disculpas, por favor elim&iacute;nelo de inmediato y notifique a la persona que lo envi&oacute;, absteni&eacute;ndose de divulgar su contenido o anexos.</p>
										<p>Por favor piense en el medio ambiente ante de imprimir este mensaje</p>
									</body>
								</html>';
							$email_formador->send($correo3, $nombre3, $subject3, $body3, $archivo3);
						}
					}
					//Actualiza el estado de la alarma a notificado
					$query_update_alarma = "UPDATE ca_alarma_monitoreo SET estado = 'notificado' WHERE id = '".$row_alarma_monitoreo->id."';";
					$mysql->query($query_update_alarma);
				}

				$this->business->return->bool = true;
				$this->business->return->msg = $id_monitoreo;
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

	public function total_monitoreo($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT c.error, MIN(a.valor_porcentaje_cumplimiento) AS valor_porcentaje_cumplimiento ";
			$query .= "FROM ca_monitoreo_asesor_detallado AS a ";
			$query .= "LEFT JOIN ca_error AS b ON a.id_error = b.id ";
			$query .= "LEFT JOIN pa_tipo_error AS c ON b.tipo_error = c.id ";
			$query .= "WHERE a.id_monitoreo_asesor = '".$data->id_mon."' AND b.calculo_valor = 'por' ";
			$query .= "GROUP BY c.error ";
			$query .= "UNION ";
			$query .= "SELECT c.error, SUM(a.valor_porcentaje_cumplimiento) AS valor_porcentaje_cumplimiento ";
			$query .= "FROM ca_monitoreo_asesor_detallado AS a ";
			$query .= "LEFT JOIN ca_error AS b ON a.id_error = b.id ";
			$query .= "LEFT JOIN pa_tipo_error AS c ON b.tipo_error = c.id ";
			$query .= "WHERE a.id_monitoreo_asesor = '".$data->id_mon."' AND b.calculo_valor = 'sum' ";
			$query .= "GROUP BY c.error;";
			$result = $mysql->query($query);
			if($result){
				$resultado = "";
				while ($row = $result->fetch(PDO::FETCH_OBJ)){
					$resultado .= $row->error." ".$row->valor_porcentaje_cumplimiento." % \n ";
				}
				$this->business->return->bool = true;
				$this->business->return->msg = $resultado;
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

	public function vista_monitoreo($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT ";
			$query .= "a.id AS id_monitoreo, ";
			$query .= "a.fecha_llamada, ";
			$query .= "b.identificacion, ";
			$query .= "a.hora_llamada, ";
			$query .= "CONCAT(b.nombre,' ',b.apellido1,' ',b.apellido2) AS asesor, ";
			$query .= "CONCAT(c.nombre,' ',c.apellido1,' ',c.apellido2) AS analista, ";
			$query .= "f.nombre AS tipificacion, ";
			$query .= "a.id_llamada, ";
			$query .= "a.observacion, ";
			$query .= "d.tipos AS solucion, ";
			$query .= "e.audio AS fallas_audio, ";
			$query .= "a.fecha_registro, ";
			$query .= "a.fecha_modificaicon AS fecha_modificacion ";
			$query .= "FROM ca_monitoreo_asesor AS a ";
			$query .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
			$query .= "LEFT JOIN re_usuarios AS c ON a.id_analista = c.id ";
			$query .= "LEFT JOIN ca_solucion AS d ON a.solucion = d.id ";
			$query .= "LEFT JOIN ca_audio AS e ON a.fallas_audio = e.id ";
			$query .= "LEFT JOIN ca_tipificacion AS f ON a.tipificacion = f.id ";
			$query .= "WHERE a.id_agenda_monitoreo = '".$data->id_agenda."' AND a.id_asesor = '".$data->id_asesor."';";
			$result = $mysql->query($query);
			if($result){
				while ($row = $result->fetch(PDO::FETCH_OBJ)){
					$row->analista = $row->analista;
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

	public function vista_monitoreo_error($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT DISTINCT a.id_error, c.error AS tipo_error ";
			$query .= "FROM ca_monitoreo_asesor_detallado AS a ";
			$query .= "LEFT JOIN ca_error AS b ON a.id_error = b.id ";
			$query .= "LEFT JOIN pa_tipo_error AS c ON b.tipo_error = c.id ";
			$query .= "WHERE a.id_monitoreo_asesor = '".$data->id_monitoreo."';";
			$result = $mysql->query($query);
			if($result){
				while ($row = $result->fetch(PDO::FETCH_OBJ)){
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

	public function vista_monitoreo_items($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT ";
			$query .= "b.item AS item_error, ";
			$query .= "a.valor_porcentaje_cumplimiento, ";
			$query .= "CASE ";
			$query .= "WHEN a.id_punto_entrenamiento = 0 THEN \"\" ";
			$query .= "ELSE c.punto_entrenamiento ";
			$query .= "END AS punto_entrenamiento ";
			$query .= "FROM ca_monitoreo_asesor_detallado AS a ";
			$query .= "LEFT JOIN ca_item AS b ON a.id_item = b.id ";
			$query .= "LEFT JOIN ca_punto_entrenamiento AS c ON a.id_punto_entrenamiento = c.id ";
			$query .= "WHERE a.id_monitoreo_asesor = '".$data->id_monitoreo."' AND a.id_error = '".$data->id_error."';";
			$result = $mysql->query($query);
			if($result){
				while ($row = $result->fetch(PDO::FETCH_OBJ)){
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

	public function total_monitoreo_vista($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT c.error, MIN(a.valor_porcentaje_cumplimiento) AS valor_porcentaje_cumplimiento ";
			$query .= "FROM ca_monitoreo_asesor_detallado AS a ";
			$query .= "LEFT JOIN ca_error AS b ON a.id_error = b.id ";
			$query .= "LEFT JOIN pa_tipo_error AS c ON b.tipo_error = c.id ";
			$query .= "WHERE a.id_monitoreo_asesor = '".$data->id_mon."' AND b.calculo_valor = 'por' ";
			$query .= "GROUP BY c.error ";
			$query .= "UNION ";
			$query .= "SELECT c.error, SUM(a.valor_porcentaje_cumplimiento) AS valor_porcentaje_cumplimiento ";
			$query .= "FROM ca_monitoreo_asesor_detallado AS a ";
			$query .= "LEFT JOIN ca_error AS b ON a.id_error = b.id ";
			$query .= "LEFT JOIN pa_tipo_error AS c ON b.tipo_error = c.id ";
			$query .= "WHERE a.id_monitoreo_asesor = '".$data->id_mon."' AND b.calculo_valor = 'sum' ";
			$query .= "GROUP BY c.error;";
			$result = $mysql->query($query);
			if($result){
				while ($row = $result->fetch(PDO::FETCH_OBJ)){
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

	public function periodo_tiempo_inicio(){
		$month = date('m');
		$year = date('Y');
		return date('Y-m-d', mktime(0,0,0, $month-1, 1, $year));
	}

	public function periodo_tiempo_fin(){ 
		$month = date('m');
		$year = date('Y');
		$day = date("d", mktime(0,0,0, $month+1, 0, $year));
		return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
	}
}
?>