<?php
include '../../config/business.php';
$business  = new Business();
$validacion = new Validacion();
$post=$business->post;
if(isset($post->action)){
	switch ($post->action){
		case 'estado':
			$result = $validacion->estado();
			$business->return = $result;
		break;
		case 'tipo_servicio':
			$result = $validacion->tipo_servicio();
			$business->return = $result;
		break;
		case 'motivo_principal':
			$result = $validacion->motivo_principal();
			$business->return = $result;
		break;
		case 'validador':
			$result = $validacion->validador();
			$business->return = $result;
		break;
		case 'agent_asesor':
			$result = $validacion->agent_asesor();
			$business->return = $result;
		break;
		case 'nombre_asesor':
			$result = $validacion->nombre_asesor($post);
			$business->return = $result;
		break;
		case 'guardar_validacion':
			$result = $validacion->guardar_validacion($post);
			$business->return = $result;
		break;
		case 'vista_validacion':
			$result = $validacion->vista_validacion($post);
			$business->return = $result;
		break;
	}

}else{
	$business->return->bool=false;
	$business->return->msg='Acción no encontrada';
}
echo json_encode((array) $business->return);
?>