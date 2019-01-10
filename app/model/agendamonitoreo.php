<?php
class AgendaMonitoreo{
	function __construct(){
		$this->business = new Business();
	}
	
	public function info_asesor($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT a.id, a.identificacion, a.nombre, a.apellido1, a.apellido2, b.empresa, c.campana ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query .= "JOIN ca_campana AS c ON a.id_campana = c.id ";
			$query .= "WHERE a.id = '".$data->id_asesor."'; ";
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

	public function monitoreos_asesor($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT id, fecha_monitoreo, estado ";
			$query .= "FROM ca_agenda_monitoreo ";
			$query .= "WHERE id_empresa = '".$data->id_empresa."' AND id_campana = '".$data->id_campana."' AND id_asesor = '".$data->id_asesor."' ";
			$query .= "AND fecha_monitoreo BETWEEN '".$this->primer_dia()."' AND '".$this->ultimo_dia()."' AND estado IN ('0', '1') ";
			$query .= "ORDER BY fecha_monitoreo, estado;";
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

	public function count_monitoreos_asesor($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$arrayData = array();
			$query  = "SELECT COUNT(*) AS num_monitores ";
			$query .= "FROM ca_agenda_monitoreo ";
			$query .= "WHERE id_empresa = '".$data->id_empresa."' AND id_campana = '".$data->id_campana."' AND id_asesor = '".$data->id_asesor."' ";
			$query .= "AND fecha_monitoreo BETWEEN '".$this->primer_dia()."' AND '".$this->ultimo_dia()."';";
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

	//
	public function guardar_fecha_monitoreo($data){	
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		$email = $this->business->email;
		$session = $this->business->session;
		//Valida conexión a base de datos
		if($mysql){
			$query  = "INSERT INTO ca_agenda_monitoreo (id_empresa, id_campana, id_asesor, fecha_monitoreo, estado) VALUES ('".$data->id_empresa."', '".$data->id_campana."', '".$data->id_asesor."', '".$data->fecha_monitoreo."', '0'); ";
			$result = $mysql->query($query);
			if($result){
				$id_agenda = $mysql->lastInsertId();
				$query_agenda  = "SELECT a.id, b.empresa, c.campana, d.identificacion, d.nombre, d.apellido1, a.fecha_monitoreo ";
				$query_agenda .= "FROM ca_agenda_monitoreo AS a ";
				$query_agenda .= "LEFT JOIN ca_empresa AS b ON a.id_empresa = b.id ";
				$query_agenda .= "LEFT JOIN ca_campana AS c ON a.id_campana = c.id ";
				$query_agenda .= "LEFT JOIN ca_asesores AS d ON a.id_asesor = d.id ";
				$query_agenda .= "WHERE a.id = '".$id_agenda."' AND a.id_asesor = '".$data->id_asesor."'; ";
				$result_agenda = $mysql->query($query_agenda);

				while ($row_agenda = $result_agenda->fetch(PDO::FETCH_OBJ)){
					//Datos de email
					$correo  = $data->email;
					$nombre  = $data->nombre;
					$archivo = '';
					$subject = 'Agenda de monitoreo';
					$body  	 = '
						<!DOCTYPE html>
							<html>
								<head>
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
									<meta name="author" content="Interactivo Contact Center"/>
									<meta name="description" content="Interactivo Contact Center"/>
									<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
									<title>Agenda de monitoreo</title>
								</head>
							<body>
							<h2>Buen d&iacute;a</h2>
							<p>Usted ha agendado el siguiente monitoreo: </p>
							<ul>
								<li>Nombre Asesor: '.$row_agenda->nombre.' '.$row_agenda->apellido1.'</li>
								<li>Empresa: '.$row_agenda->empresa.'</li>
								<li>Campa&ntilde;a: '.$row_agenda->campana.'</li>
								<li>Fecha monitoreo: '.$row_agenda->fecha_monitoreo.'</li>
							</ul>
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
					//Envío de email
					$email->send($correo, $nombre, $subject, $body, $archivo);
				}

				$this->business->return->bool = true;
				$this->business->return->msg = 'Se agendó el monitoreo para la fecha '.$data->fecha_monitoreo;
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

	public function anular_monitoreo($data){
		$mysql = $this->business->mysql;
		$db_mysql = $this->business->db_mysql;
		//Valida conexión a base de datos
		if($mysql){
			$query  = "UPDATE ca_agenda_monitoreo SET estado = '2' WHERE id = '".$data->id_genda."'; ";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se anuló monitoreo correctamente';
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