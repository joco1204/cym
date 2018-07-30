<?php
include '../../config/business.php';
$business = new Business();
$calificacion = new Calificacion();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_calificacion':
			$result = $calificacion->tabla_calificacion();
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