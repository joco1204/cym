<?php
include '../../config/business.php';
$business = new Business();
$cliente = new Cliente();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_clientes':
			$result = $cliente->tabla_clientes();
			$business->return = $result;
		break;
		case 'clientes':
			$result = $cliente->clientes();
			$business->return = $result;
		break;
		case 'crear_cliente':
			$result = $cliente->crear_cliente($post);
			$business->return = $result;
		break;
		case 'update_cliente':
			$result = $cliente->update_cliente($post);
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