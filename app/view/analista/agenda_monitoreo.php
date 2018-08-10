<?php
$get = ((object) $_GET);
isset($get->id_asesor) ? $id_asesor = $get->id_asesor : $id_asesor = '0';
if($id_asesor == '0'){ ?>
	<script type="text/javascript">
		$(function(){
			pageContent('contenido');
		});
	</script>
<?php } else { ?>
	<input type="hidden" name="id_asesor" id="id_asesor" value="<?= $id_asesor; ?>">
<?php } ?>

<section class="content-header">
    <h1>AGENDA POR ASESOR</h1>
</section>
<section class="content">
	<div class='box box-primary'>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-3">
                        <span><b>NOMBRE:</b></span>
                    </div>
                    <div class="col col-md-3">
                        <span id="nombre_asesor"></span>
                    </div>
                    <div class="col col-md-3">
                        <span><b>IDENTIFICAICÓN:</b></span>
                    </div>
                    <div class="col col-md-3">
                        <span id="identificacion_asesor"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col col-md-3">
                        <span><b>CAMPAÑA:</b></span>
                    </div>
                    <div class="col col-md-3">
                        <span id="campana_asesor"></span>
                    </div>

                    <div class="col col-md-3">
                        <span><b>MES MONITOREO:</b></span>
                    </div>
                    <div class="col col-md-3">
                        <span><?= date("m")." de ".date("Y"); ?></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col col-lg-12 text-center">
                        <button type="button" class="btn btn-success">Añadir fecha</button>    
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-12">
                        <div id="consulta_fecha"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-12">
                        <div id="add_fecha"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<script src="../../js/analista/agenda_monitoreo.js"></script>