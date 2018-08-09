<?php
include '../../config/business.php';
$business = new Business();
$campana = New Campana();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_campanas':
			$result = $campana->tabla_campanas();
			$business->return = $result;
		break;
		case 'campanas':
			$result = $campana->campanas($post);
			$business->return = $result;
		break;
		case 'crear_campana':
			$result = $campana->crear_campana($post);
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