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