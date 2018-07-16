<?php
include '../../config/business.php';
$business = new Business();
$segmento = new Segmento();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_segmentos':
			$result = $segmento->tabla_segmentos();
			$business->return = $result;
		break;
		case 'crear_segmento':
			$result = $segmento->crear_segmento($post);
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