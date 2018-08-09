<?php 
class Matriz{
	function __construct(){
		$this->business = new Business();
	}

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

								/*for($k = 1; $k <= $punto_entrenamiento; $k++){
									$desc_punto_entrenamiento = "desc_punto_entrenamiento_".$i."_".$j."_".$k;

									$query_punto = "INSERT INTO ca_punto_entrenamiento (id_item, punto_entrenamiento) VALUES ('".$id_item."', '".$data->$desc_punto_entrenamiento."');";
									$result_punto = $conn->query($query_punto);
								}*/
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
}
?>