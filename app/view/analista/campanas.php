<?php
include '../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

isset($get->id_empresa) ? $id_empresa = $get->id_empresa : $id_empresa = '0';

if($id_empresa == '0'){ ?>
	<script type="text/javascript">
		$(function(){
			pageContent('contenido');
		});
	</script>
<?php } else { ?>
	<input type="hidden" name="id_empresa" id="id_empresa" value="<?= $id_empresa; ?>">
<?php } ?>
<section class="content-header">
    <h1>CLIENTE: <b><?= $get->empresa; ?></b></h1>
    <hr>
    <h3><b>CAMPAÑA(S)</b></h3>
</section>
<section class="content">
    <div class="container" id="container_panel"></div>
</section>
<script src="../../js/analista/campanas.js"></script>