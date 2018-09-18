<?php 
include '../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}
?>
<section class="content-header">
	<?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2'){ ?>
		<h1><b>LISTA DE EMPRESAS</b></h1>
	<?php } else { ?>
		<h1><b>EMPRESAS</b> <label id="nombre_empresa"></label></h1>
	<?php } ?>
</section>
<section class="content">
    <div class="container" id="container_panel"></div>
</section>
<script src="../../js/analista/analista.js"></script>