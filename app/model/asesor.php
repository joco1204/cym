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
			$query  = "INSERT INTO ca_asesores (id_empresa, id_campana, identificacion, nombre, apellido1, apellido2, estado) VALUES ('".$data->empresa."', '".$data->campana."', '".$data->identificacion."', '".$data->nombre."', '".$data->apellido1."', '".$data->apellido2."', 'activo'); ";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha creado el asesor '.$data->nombre.' '.$data->apellido1.' correctamente';
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
							$query  = "INSERT INTO ca_asesores (id_empresa, id_campana, identificacion, nombre, apellido1, apellido2, estado) VALUES ( ";
							$query .= "'".$data[0]."', ";
							$query .= "'".$data[1]."', ";
							$query .= "'".$data[2]."', ";
							$query .= "'".$data[3]."', ";
							$query .= "'".$data[4]."', ";
							$query .= "'".$data[5]."', ";
							$query .= "'".$data[6]."'); ";
							$result = $mysql->query($query);
						} else {
							$query  = "UPDATE ca_asesores SET id_empresa = '".$data[0]."', id_campana = '".$data[1]."', nombre = '".$data[3]."', apellido1 = '".$data[4]."', apellido2 = '".$data[5]."', estado = '".$data[6]."' WHERE identificacion = '".$data[2]."'; ";
							$result = $mysql->query($query);
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
			$query  = "SELECT id, id_empresa, id_campana, identificacion, nombre, apellido1, apellido2, estado FROM ca_asesores WHERE id = '".$data->id."';";
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
			$query  = "UPDATE ca_asesores SET id_empresa = '".$data->empresa_m."', id_campana = '".$data->campana_m."', nombre = '".$data->nombre_m."', apellido1 = '".$data->apellido1_m."', apellido2 = '".$data->apellido2_m."', identificacion = '".$data->identificacion_m."', estado = '".$data->estado_m."' WHERE id = '".$data->id_asesor_m."'; ";
			$result = $mysql->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha modificado al asesor '.$data->nombre_m.' '.$data->apellido1_m.' correctamente';
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