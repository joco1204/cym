<?php
include '../../config/business.php';
$business = new Business();
$usuario = new Usuario();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_usuarios':
			$result = $usuario->tabla_usuarios();
			$business->return = $result;
		break;
		case 'tipo_identificacion':
			$result = $usuario->tipo_identificacion();
			$business->return = $result;
		break;
		case 'perfil':
			$result = $usuario->perfil();
			$business->return = $result;
		break;
		case 'perfil_usuario':
			$result = $usuario->perfil_usuario();
			$business->return = $result;
		break;
		case 'crear_usuario':
			$result = $usuario->crear_usuario($post);
			$business->return = $result;
		break;
		case 'crear_usuario':
			$result = $usuario->crear_usuario($post);
			$business->return = $result;
		break;
		case 'modificar_perfil':
			$result = $usuario->modificar_perfil($post);
			$business->return = $result;
		break;
		case 'modificar_usuario':
			$result = $usuario->modificar_usuario($post);
			$business->return = $result;
		break;
		case 'data_usuario':
			$result = $usuario->data_usuario($post);
			$business->return = $result;
		break;
		case 'usuario_ec':
			$result = $usuario->usuario_ec($post);
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