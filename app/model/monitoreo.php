<?php
class Monitoreo{
	function __construct(){
		$this->business = new Business();
	}

	public function matriz_monitoreo($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query   = "SELECT id FROM ca_matriz ";
			$query  .= "WHERE id_empresa = '".$data->id_empresa."' AND id_campana = '".$data->id_campana."' AND estado = 'activo';";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id, nombre FROM ca_tipificacion WHERE estado = 'activo';";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id, tipos FROM ca_solucion WHERE estado = 'activo';";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT id, audio FROM ca_audio WHERE estado = 'activo';";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query   = "SELECT a.id AS id_error, b.error AS tipo_error, a.calculo_valor ";
			$query  .= "FROM ca_error AS a ";
			$query  .= "JOIN pa_tipo_error AS b ON a.tipo_error = b.id ";
			$query  .= "WHERE a.id_matriz = '".$data->id_matriz."' AND a.estado = 'activo';";

			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query   = "SELECT id, item, valor FROM ca_item WHERE id_matriz = '".$data->id_matriz."' AND id_error = '".$data->id_error."' AND estado = 'activo'; ";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query   = "SELECT id, punto_entrenamiento FROM ca_punto_entrenamiento WHERE id_item = '".$data->id_item."';";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT a.id AS id_asesor, b.id AS id_agenda, a.identificacion, a.nombres, a.apellidos, b.fecha_monitoreo ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "JOIN ca_agenda_monitoreo AS b ON a.id = b.id_asesor ";
			$query .= "WHERE b.id = '".$data->id_agenda."' AND b.id_empresa = '".$data->id_empresa."' AND b.id_campana = '".$data->id_campana."' AND b.id_asesor = '".$data->id_asesor."'; ";
			$result = $conn->query($query);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					$queryId = "SELECT MAX(id) AS id_monitoreo FROM ca_monitoreo_asesor;";
					$resultId = $conn->query($queryId);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "INSERT INTO ca_monitoreo_asesor (id_agenda_monitoreo, id_asesor, id_analista, fecha_llamada, hora_llamada, tipificacion, id_llamada, observacion, solucion, fallas_audio) VALUES ('".$data->id_agenda."', '".$data->id_asesor."', '".$data->id_analista."', '".$data->fechas_llamada."', '".$data->hora_llamada."', '".$data->tipificacion."', '".$data->id_llamada."', '".$data->observacion."', '".$data->solucion."', '".$data->audio."'); ";
			$result = $conn->query($query);
			
			//Obtiene el id del último monitoreo insertado
			$id_monitoreo = $conn->lastInsertId();

			//Actualiza el estado del monitoreo realizado
			$query_agenda = "UPDATE ca_agenda_monitoreo SET estado = '1' WHERE id = '".$data->id_agenda."';";
			$conn->query($query_agenda);
			if($result){
				$num_error = $data->num_error;
				for($i = 1; $i <= $num_error; $i++){
					//
					$item 		= 'num_item_'.$i;
					$id_error 	= 'id_num_error_'.$i;
					$num_item 	= $data->$item;
					//
					for($j = 1; $j <= $num_item; $j++){
						
						//
						$id_num_item					= 'id_num_item_'.$i.'_'.$j;
						$valor_cumplimiento 			= 'valor_cumplimiento_'.$i.'_'.$j;
						$valor_porcentaje_cumplimiento 	= 'valor_porcentaje_cumplimiento_'.$i.'_'.$j;
						$punto_item 					= 'punto_item_'.$i.'_'.$j;
						
						//
						isset($data->$valor_cumplimiento) ? $valor_cumplimiento = $data->$valor_cumplimiento : $valor_cumplimiento = '0';
						isset($data->$valor_porcentaje_cumplimiento) ? $valor_porcentaje = $data->$valor_porcentaje_cumplimiento : $valor_porcentaje = '0';
						isset($data->$punto_item) ? $punto_entrenamiento = $data->$punto_item : $punto_entrenamiento = '0';

						//
						$query_item = "INSERT INTO ca_monitoreo_asesor_detallado (id_monitoreo_asesor, id_error, id_item, valor_cumplimiento, valor_porcentaje_cumplimiento, id_punto_entrenamiento) VALUES ('".$id_monitoreo."', '".$data->$id_error."', '".$data->$id_num_item."', '".$valor_cumplimiento."', '".$valor_porcentaje."', '".$punto_entrenamiento."');";
						$result_item = $conn->query($query_item);
					}
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
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
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT ";
			$query .= "a.id AS id_monitoreo, ";
			$query .= "a.fecha_llamada, ";
			$query .= "b.identificacion, ";
			$query .= "a.hora_llamada, ";
			$query .= "CONCAT(b.nombres,' ',b.apellidos) AS asesor, ";
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
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT DISTINCT a.id_error, c.error AS tipo_error ";
			$query .= "FROM ca_monitoreo_asesor_detallado AS a ";
			$query .= "LEFT JOIN ca_error AS b ON a.id_error = b.id ";
			$query .= "LEFT JOIN pa_tipo_error AS c ON b.tipo_error = c.id ";
			$query .= "WHERE a.id_monitoreo_asesor = '".$data->id_monitoreo."';";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
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
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
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
			$result = $conn->query($query);
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
}
?>