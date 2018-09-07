<?php
include '../../config/business.php';
$business = new Business();
$asesor = New Asesor();
$post = $business->post;
$files = $business->files;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'tabla_asesor':
			$result = $asesor->tabla_asesor();
			$business->return = $result;
		break;
		case 'crear_asesor':
			$result = $asesor->crear_asesor($post);
			$business->return = $result;
		break;
		case 'cargar_asesores':
			$file = ((object) $files->file);
			$result = $asesor->cargar_asesores($file);
			$business->return = $result;
		break;
		case 'crear_asesor':
			$result = $asesor->crear_asesor($post);
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