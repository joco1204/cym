<?php 
include '../../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}
?>
<section class="content-header">
		<h1><b>LISTA DE EMPRESAS</b></h1>
</section>
<section class="content">
    <div class="container" id="container_panel"></div>
</section>
<script src="../../js/agenda.js"></script>