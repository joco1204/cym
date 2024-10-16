<?php 
include '../../config/session.php'; 
$session = new Session();
$session->start();

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}

$arr_empresas = $session->getSession('empresa');
$obj_empresas = ((object) $arr_empresas);
$obj_empresas = new stdClass();

foreach ($arr_empresas as $key => $valor){
	$i = ($key + 1);
	$obj_empresas->$key = $valor;
	echo '<input type="hidden" name="empresa_'.$i.'" id="empresa_'.$i.'" value="'.$obj_empresas->$key.'">';
}

?>