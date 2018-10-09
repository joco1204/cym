<?php 
class Matriz{
	function __construct(){
		$this->business = new Business();
	}

	//Data tabla de matrices
	public function tabla_matriz(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT a.id, b.empresa, c.campana, a.estado ";
			$query .= "FROM ca_matriz AS a  ";
			$query .= "JOIN ca_empresa AS b ON a.id_empresa = b.id  ";
			$query .= "JOIN ca_campana AS c ON a.id_campana = c.id ";
			$query .= "WHERE a.estado = 'activo' OR a.estado = 'inactivo' OR a.estado = 'anulado'; ";
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

	//Data tabla error 
	public function tabla_error(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query  = "SELECT id, tipo, error, siglas, estado FROM pa_tipo_error;";
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

	//Data información por matriz
	public function data_matriz($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT a.id, a.id_empresa, b.empresa, a.id_campana, c.campana, a.estado ";
			$query .= "FROM ca_matriz AS a  ";
			$query .= "JOIN ca_empresa AS b ON a.id_empresa = b.id  ";
			$query .= "JOIN ca_campana AS c ON a.id_campana = c.id ";
			$query .= "WHERE a.id = '".$data->id."'; ";
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

	//Data información error matriz
	public function data_matriz_error($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayData = array();
			$query  = "SELECT a.id, a.id_matriz, a.tipo_error, a.calculo_valor, b.error, a.estado ";
			$query .= "FROM ca_error AS a ";
			$query .= "LEFT JOIN  pa_tipo_error AS b ON a.tipo_error = b.id ";
			$query .= "WHERE a.id_matriz = '".$data->id_matriz."';";
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

	//Data numero para validación matriz por empresa y campaña
	public function matriz_empresa_campana($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "SELECT COUNT(*) AS num_matriz FROM ca_matriz WHERE id_empresa = '".$data->empresa."' AND id_campana = '".$data->campana."' AND estado = 'activo'; ";
			$result = $conn->query($query);
			if($result){
				$row = $result->fetch(PDO::FETCH_OBJ);
				$this->business->return->bool = true;
				$this->business->return->msg = $row->num_matriz;
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

	//Data monitoreos matriz activos
	public function monitoreos_matriz($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "SELECT COUNT(*) AS num_monitoreo ";
			$query .= "FROM ca_matriz AS a ";
			$query .= "LEFT JOIN ca_agenda_monitoreo AS b ON a.id_empresa =b.id_empresa ";
			$query .= "WHERE a.id = '".$data->id_matriz."' AND b.estado = '1';";
			$result = $conn->query($query);
			if($result){
				$row = $result->fetch(PDO::FETCH_OBJ);
				$this->business->return->bool = true;
				$this->business->return->msg = $row->num_monitoreo ;
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

	//Data tipo de error
	public function tipo_error(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayError = array();
			$query  = "SELECT id, tipo, error, siglas FROM pa_tipo_error WHERE estado = 'activo';";
			$result = $conn->query($query);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					array_push($arrayError, $row);
				}
				$this->business->return->bool = true;
				$this->business->return->msg = json_encode($arrayError);
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

	//Crera matriz
	public function crear_matriz($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			//Insert matriz
			$query  = "INSERT INTO ca_matriz (id_empresa, id_campana, estado) VALUES ('".$data->empresa_form."', '".$data->campana_form."', 'activo');";
			$result = $conn->query($query);
			if($result){
				$id_matriz = $conn->lastInsertId();
				$n_error = $data->tipo_error;
				
				for($i = 1; $i <= $n_error; $i++){
					//Variables error
					$tipo_error = "tipo_error_".$i;
					$calculo_porcentaje = "calculo_porcentaje_".$i;

					//Insert error
					$query_error = "INSERT INTO ca_error (id_matriz, tipo_error, calculo_valor, estado) VALUES ('".$id_matriz."', '".$data->$tipo_error."', '".$data->$calculo_porcentaje."', 'activo');";
					$result_error = $conn->query($query_error);
					
					if($result_error){
						$id_error = $conn->lastInsertId();
						$item_error = "item_error_".$i;
						$n_item = $data->$item_error;
						
						for($j = 1; $j <= $n_item; $j++){
							//Variables item
							$nombre_item_error = "nombre_item_error_".$i."_".$j;
							$valor = "valor_".$i."_".$j;
							
							//Insert item
							$query_item = "INSERT INTO ca_item (id_matriz, id_error, item, valor, estado) VALUES ('".$id_matriz."', '".$id_error."', '".$data->$nombre_item_error."', '".$data->$valor."', 'activo'); ";
							$result_item = $conn->query($query_item);

							if($result_item){
								$id_item = $conn->lastInsertId();
								$punto_entrenamiento = "punto_entrenamiento_".$i."_".$j;
								
								for($k = 1; $k <= $data->$punto_entrenamiento; $k++){
									$desc_punto_entrenamiento = "desc_punto_entrenamiento_".$i."_".$j."_".$k;
									$query_punto = "INSERT INTO ca_punto_entrenamiento (id_item, punto_entrenamiento) VALUES ('".$id_item."', '".$data->$desc_punto_entrenamiento."');";
									$result_punto = $conn->query($query_punto);
								}
							}
						}
					}
				}
				$this->business->return->bool = true;
				$this->business->return->msg = "Se ha creado la matriz correctamente";
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

	//Crear tipo de error
	public function guardar_error($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "INSERT INTO pa_tipo_error (tipo, error, siglas, estado) VALUES ('".$data->nuevo_tipo_error."', '".$data->nuevo_error."', '".$data->siglas_error."', '".$data->estado_tipo_error."'); ";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se guardó el tipo de error con exito';
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

	//Modifica toda la matriz
	public function modificar_matriz($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){ 
			$query  = "UPDATE ca_matriz SET estado = '".$data->estado."' WHERE id = '".$data->id_matriz."';";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = "La matriz se ha actualizado";
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

	//Cambia el estado de la matriz
	public function estado_matriz($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "UPDATE ca_matriz SET estado = '".$data->estado."' WHERE id = '".$data->id."';";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = "La matriz se ha actualizado";
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