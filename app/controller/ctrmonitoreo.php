<?php
include '../../config/business.php';
$business = new Business();
$monitoreo = New Monitoreo();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'matriz_monitoreo':
			$result = $monitoreo->matriz_monitoreo($post);
			$business->return = $result;
		break;
		case 'tipo_error':
			$result = $monitoreo->tipo_error($post);
			$business->return = $result;
		break;
		case 'item_error':
			$result = $monitoreo->item_error($post);
			$business->return = $result;
		break;
		case 'punto_entrenamiento':
			$result = $monitoreo->punto_entrenamiento($post);
			$business->return = $result;
		break;
		case 'data_monitoreo':
			$result = $monitoreo->data_monitoreo($post);
			$business->return = $result;
		break;
		case 'inserta_monitoreo':
			$result = $monitoreo->inserta_monitoreo($post);
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