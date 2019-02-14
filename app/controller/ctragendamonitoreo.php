<?php
include '../../config/business.php';
$business = new Business();
$agendamonitoreo = New AgendaMonitoreo();
$post = $business->post;
//Validate the existence of the action
if(isset($post->action)){
	switch ($post->action){
		case 'info_asesor':
			$result = $agendamonitoreo->info_asesor($post);
			$business->return = $result;
		break;
		case 'monitoreos_asesor':
			$result = $agendamonitoreo->monitoreos_asesor($post);
			$business->return = $result;
		break;
		case 'count_monitoreos_asesor':
			$result = $agendamonitoreo->count_monitoreos_asesor($post);
			$business->return = $result;
		break;
		case 'guardar_fecha_monitoreo':
			$result = $agendamonitoreo->guardar_fecha_monitoreo($post);
			$business->return = $result;
		break;
		case 'guardar_fecha_monitoreo':
			$result = $agendamonitoreo->guardar_fecha_monitoreo($post);
			$business->return = $result;
		break;
		case 'modifica_fecha_monitoreo':
			$result = $agendamonitoreo->modifica_fecha_monitoreo($post);
			$business->return = $result;
		break;
		case 'anular_monitoreo':
			$result = $agendamonitoreo->anular_monitoreo($post);
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