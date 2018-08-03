<?php
include '../../config/business.php';
$business = new Business();
$servicio = New Servicio();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_servicios':
			$result = $servicio->tabla_servicios();
			$business->return = $result;
		break;
		case 'servicios':
			$result = $servicio->servicios($post);
			$business->return = $result;
		break;
		case 'crear_servicio':
			$result = $servicio->crear_servicio($post);
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