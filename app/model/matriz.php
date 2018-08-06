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
			$query  = "SELECT a.id, b.cliente, c.servicio, a.estado ";
			$query .= "FROM ca_matriz AS a  ";
			$query .= "JOIN ca_cliente AS b ON a.id_cliente = b.id  ";
			$query .= "JOIN ca_servicio AS c ON a.id_servicio = c.id ";
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
			$query  = "INSERT INTO ca_matriz (id_cliente, id_servicio, estado) VALUES ('".$data->cliente_form."', '".$data->servicio_form."', 'activo');";
			$result = $conn->query($query);
			if($result){
				$id_matriz = $conn->lastInsertId();
				$n_error = $data->tipo_error;
				
				for($i = 1; $i <= $n_error; $i++){

					//Variables error
					$tipo_error = "tipo_error_".$i;
					$calculo_porcentaje = "calculo_porcentaje_".$i;
					$estado = "estado_".$i;

					//Insert error
					$query_error = "INSERT INTO ca_error (id_matriz, tipo_error, calculo_valor, estado) VALUES ('".$id_matriz."', '".$data->$tipo_error."', '".$data->$calculo_porcentaje."', '".$data->$estado."');";
					$result_error = $conn->query($query_error);
					
					if($result_error){
						$id_error = $conn->lastInsertId();
						$item_error = "item_error_".$i;
						$n_item = $data->$item_error;
						
						for($j = 1; $j <= $n_item; $j++){

							//Variables item
							$nombre_item_error = "nombre_item_error_".$i."_".$j;
							$valor = "valor_".$i."_".$j;
							$valor_no = "valor_no_".$i."_".$j;
							$estado_item = "estado_item_".$i."_".$j;
							
							//Insert item
							$query_item = "INSERT INTO ca_item (id_matriz, id_error, item, valor, valor_no, estado) VALUES ('".$id_matriz."', '".$id_error."', '".$data->$nombre_item_error."', '".$data->$valor."', '".$data->$valor_no."', '".$data->$estado_item."'); ";
							$result_item = $conn->query($query_item);
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