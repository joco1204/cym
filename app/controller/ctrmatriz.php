<?php
include '../../config/business.php';
$business = new Business();
$matriz = New Matriz();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_matriz':
			$result = $matriz->tabla_matriz();
			$business->return = $result;
		break;
		case 'data_matriz':
			$result = $matriz->data_matriz($post);
			$business->return = $result;
		break;
		case 'matriz_empresa_campana':
			$result = $matriz->matriz_empresa_campana($post);
			$business->return = $result;
		break;
		case 'tipo_error':
			$result = $matriz->tipo_error();
			$business->return = $result;
		break;
		case 'crear_matriz':
			$result = $matriz->crear_matriz($post);
			$business->return = $result;
		break;
		case 'guardar_error':
			$result = $matriz->guardar_error($post);
			$business->return = $result;
		break;
		case 'tabla_error':
			$result = $matriz->tabla_error();
			$business->return = $result;
		break;
		case 'monitoreos_matriz':
			$result = $matriz->monitoreos_matriz($post);
			$business->return = $result;
		break;
		case 'estado_matriz':
			$result = $matriz->estado_matriz($post);
			$business->return = $result;
		break;
		case 'modificar_matriz':
			$result = $matriz->modificar_matriz($post);
			$business->return = $result;
		break;
		case 'data_matriz_error':
			$result = $matriz->data_matriz_error($post);
			$business->return = $result;
		break;
		case 'data_matriz_item':
			$result = $matriz->data_matriz_item($post);
			$business->return = $result;
		break;
		case 'data_matriz_punto':
			$result = $matriz->data_matriz_punto($post);
			$business->return = $result;
		break;
		default:
			$business->return->bool = false;
			$business->return->msg = 'Acción No Encontrada';
		break;
	}
} else {
	$business->return->bolean = false;
	$business->return->msg = 'Acción No Encontrada';		
}
echo json_encode((array) $business->return);
?>