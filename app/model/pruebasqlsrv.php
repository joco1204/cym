<?php
class Pruebassqlsrv{
	function __construct(){
		$this->business = new Business();
	}

	public function consultaPruebas(){
		$sqlsrv = $this->business->sqlsrv_val;
		$db_sqlsrv_val = $this->business->db_sqlsrv_val;
		$arrayConsulta = array();
		if($sqlsrv){
			$sql = "SELECT TOP 20 NOM_LISTA, INICIO_LLAMADA FROM CITI_BALCON_RC;";
			$result = $sqlsrv->query($sql);
			if($result){
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					array_push($arrayConsulta, $row);
				}
				$this->business->return->bool = true;
				$this->business->return->msg = json_encode($arrayConsulta);
			} else {
				$this->business->return->bool = false;
				$this->business->return->msg = 'Error query validación';
			}
		} else {
			$this->business->return->bool = false;
			$this->business->return->msg = 'Error de conexión de base de datos de validación';
		}
		return $this->business->return;
	}


}

?>