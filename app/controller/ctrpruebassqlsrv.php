<?php
include '../../config/business.php';
$business = new Business();
$pruebassqlsrv = new Pruebassqlsrv();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'consultaPruebas':
			$result = $pruebassqlsrv->consultaPruebas();
			$business->return = $result;
		break;
		default:
			$business->return->bool = false;
			$business->return->msg = 'Acción No Encontrada';
		break;
	}
} else {
	$business->return->bool = false;
	$business->return->msg = 'Acción No Encontrada';		
}
echo json_encode((array) $business->return);
?>