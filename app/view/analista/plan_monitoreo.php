<?php
$get = ((object) $_GET);
isset($get->id_empresa) ? $id_empresa = $get->id_empresa : $id_empresa = '0';
isset($get->id_campana) ? $id_campana = $get->id_campana : $id_campana = '0';

if($id_empresa == '0'){ ?>
	<script type="text/javascript">
		$(function(){
			pageContent('contenido');
		});
	</script>
<?php } else { ?>
	<input type="hidden" name="id_empresa" id="id_empresa" value="<?= $id_empresa; ?>">
	<input type="hidden" name="id_campana" id="id_campana" value="<?= $id_campana; ?>">
<?php } ?>

<section class="content-header">
    <h1>PLAN DE MONITOREO: <b></b></h1>
</section>
<section class="content">
    <div class="container" id="container_panel"></div>
</section>
<script src="../../js/analista/plan_monitoreo.js"></script>