<?php
include '../../config/business.php';
$business = new Business();
$planmonitoreo = New PlanMonitoreo();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'empresa_campana':
			$result = $planmonitoreo->empresa_campana($post);
			$business->return = $result;
		break;
		case 'tabla_asesor':
			$result = $planmonitoreo->tabla_asesor($post);
			$business->return = $result;
		break;
		case 'monitoreos_dia':
			$result = $planmonitoreo->monitoreos_dia($post);
			$business->return = $result;
		break;
		case 'monitoreos_mes':
			$result = $planmonitoreo->monitoreos_mes($post);
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