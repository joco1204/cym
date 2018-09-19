<?php
include '../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

$fecha_hoy = date('Y-m-d');
$fecha_ini = date('Y-m-01');
$fecha_fin = date('Y-m-08');

$get = ((object) $_GET);
isset($get->id_empresa) ? $id_empresa = $get->id_empresa : $id_empresa = '0';
isset($get->id_campana) ? $id_campana = $get->id_campana : $id_campana = '0';
isset($get->id_asesor) ? $id_asesor = $get->id_asesor : $id_asesor = '0';
if($id_asesor == '0'){ ?>
	<script type="text/javascript">
		$(function(){
			pageContent('contenido');
		});
	</script>
<?php } else { ?>
	<input type="hidden" name="id_empresa" id="id_empresa" value="<?= $id_empresa; ?>">
    <input type="hidden" name="id_campana" id="id_campana" value="<?= $id_campana; ?>">
    <input type="hidden" name="id_asesor" id="id_asesor" value="<?= $id_asesor; ?>">
    <input type="hidden" name="id_perfil" id="id_perfil" value="<?php echo $session->getSession('id_perfil'); ?>">
    <input type="hidden" name="mes" id="mes" value="<?= date('m'); ?>">
    <input type="hidden" name="anio" id="anio" value="<?= date('Y'); ?>">
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
                        <button type="button" class="btn btn-success" onclick="javascript: addFechaMonitoreo();">Añadir fecha</button> 
                        <button type="button" class="btn btn-primary" onclick="javascript: pageContent('analista/plan_monitoreo','id_empresa=<?= $id_empresa; ?>&id_campana=<?= $id_campana; ?>');">Volver Atras</button>
                        <input type="hidden" name="count_fechas" id="count_fechas" value="0">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col col-lg-12">
                        <div id=""></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col col-md-6 col-md-offset-3">
                        <div id="canvas_fechas"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<script src="../../js/analista/agenda_monitoreo.js"></script>
