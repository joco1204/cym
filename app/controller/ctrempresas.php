<?php
include '../../config/business.php';
$business = new Business();
$empresa = new Empresa();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_empresas':
			$result = $empresa->tabla_empresas();
			$business->return = $result;
		break;
		case 'empresas':
			$result = $empresa->empresas();
			$business->return = $result;
		break;
		case 'crear_empresa':
			$result = $empresa->crear_empresa($post);
			$business->return = $result;
		break;
		case 'update_empresa':
			$result = $empresa->update_empresa($post);
			$business->return = $result;
		break;
		case 'empresa_analista':
			$result = $empresa->empresa_analista();
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