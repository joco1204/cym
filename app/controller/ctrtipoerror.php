<?php
include '../../config/business.php';
$business = new Business();
$tipoerror = new tipoError();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_tipoerror':
			$result = $tipoerror->tabla_tipoerror();
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