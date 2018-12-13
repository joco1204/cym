<?php
class Asesor{
	function __construct(){
		$this->business = new Business();
	}

	public function tabla_asesor(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT a.id, a.identificacion, a.nombres, a.apellidos, b.empresa, c.campana, a.estado ";
			$query .= "FROM ca_asesores AS a ";
			$query .= "JOIN ca_empresa AS b ON a.id_empresa = b.id ";
			$query .= "JOIN ca_campana AS c ON a.id_campana = c.id;";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "INSERT INTO ca_asesores (id_empresa, id_campana, identificacion, nombres, apellidos, estado) VALUES ('".$data->empresa."', '".$data->campana."', '".$data->identificacion."', '".$data->nombres."', '".$data->apellidos."', 'activo'); ";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha creado el asesor '.$data->nombres.' '.$data->apellidos.' correctamente';
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		if($conn){
			$fname = $file->name;
			$ext = explode(".",$fname);
			if(strtolower(end($ext)) == "csv" || strtolower(end($ext)) == "txt"){
				$file_tmp_name = $file->tmp_name;
				$handle = fopen($file_tmp_name, "r");
				while($data = fgetcsv($handle, 1000, ";")){
					$query_existencia = "SELECT identificacion FROM ca_asesores WHERE identificacion = '".$data[2]."';";
					$result_existencia = $conn->query($query_existencia);
					if($result_existencia){
						$num_asesor = $result_existencia->rowCount();
						if($num_asesor == '0'){
							$query  = "INSERT INTO ca_asesores (id_empresa, id_campana, identificacion, nombres, apellidos, estado) VALUES ( ";
							$query .= "'".$data[0]."', ";
							$query .= "'".$data[1]."', ";
							$query .= "'".$data[2]."', ";
							$query .= "'".$data[3]."', ";
							$query .= "'".$data[4]."', ";
							$query .= "'".$data[5]."'); ";
							$result = $conn->query($query);
						} else {
							$query  = "UPDATE ca_asesores SET id_empresa = '".$data[0]."', id_campana = '".$data[1]."', nombres = '".$data[3]."', apellidos = '".$data[4]."', estado = '".$data[5]."' WHERE identificacion = '".$data[2]."'; ";
							$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT id, id_empresa, id_campana, identificacion, nombres, apellidos, estado FROM ca_asesores WHERE id = '".$data->id."';";
			$result = $conn->query($query);
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "UPDATE ca_asesores SET id_empresa = '".$data->empresa_m."', id_campana = '".$data->campana_m."', nombres = '".$data->nombres_m."', apellidos = '".$data->apellidos_m."', identificacion = '".$data->identificacion_m."', estado = '".$data->estado_m."' WHERE id = '".$data->id_asesor_m."'; ";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha modificado al asesor '.$data->nombres_m.' '.$data->apellidos_m.' correctamente';
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
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query_asesor  = "SELECT id FROM ca_asesores WHERE identificacion = '".$data->identificacion."' AND id_empresa = '".$data->empresa."' AND id_campana = '".$data->campana."'; ";
			$result_asesor = $conn->query($query_asesor);
			if($result_asesor){
				while($row_asesor = $result_asesor->fetch(PDO::FETCH_OBJ)){
					$query_num = "SELECT COUNT(*) AS num_monitoreos FROM ca_monitoreo_asesor WHERE id_asesor = '".$row_asesor->id."' AND fecha_registro BETWEEN '".$data->desde."' AND '".$data->hasta."';";
					$result_num = $conn->query($query_num);





					
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