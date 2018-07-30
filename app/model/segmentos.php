<?php 
class Segmento{
	function __construct(){
		$this->business = new Business();
	}
	
	public function tabla_segmentos(){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$arrayTabla = array();
			$query   = "SELECT a.id, a.segmento, b.cliente, c.servicio, a.estado ";
			$query  .= "FROM ca_segmento AS a ";
			$query  .= "JOIN ca_cliente AS b ON a.id_cliente = b.id ";
			$query  .= "JOIN ca_servicio AS c ON a.id_servicio = c.id;";
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

	public function crear_segmento($data){
		$conn = $this->business->conn;
		$db = $this->business->db;
		//Valida conexión a base de datos
		if($conn){
			$query  = "INSERT INTO ca_segmento (segmento, id_cliente, id_servicio, estado) VALUES ('".$data->nombre_segmento."', '".$data->id_cliente."', '".$data->id_servicio."', '".$data->estado_segmento."'); ";
			$result = $conn->query($query);
			if($result){
				$this->business->return->bool = true;
				$this->business->return->msg = 'Se ha creado el segmento '.$data->nombre_segmento.' correctamente';
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