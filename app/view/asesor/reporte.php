<?php 
include '../../../config/session.php';
date_default_timezone_set('America/Bogota');
$session = new Session();
$session->start();
$get = ((object) $_GET);

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}

$arr_empresas = $session->getSession('empresa');
$obj_empresas = ((object) $arr_empresas);
$obj_empresas = new stdClass();

$anio = date('Y');
$mes = date('m');
$dia_fin = date("d", mktime(0,0,0, $mes+1, 0, $anio));
$fecha_fin = date('F Y', mktime(0,0,0, $mes, $dia_fin, $anio));

?>
<section class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Reporte General <?php echo $fecha_fin; ?></h3>
                    <input type="hidden" name="identificacion" id="identificacion" value="<?php echo $session->getSession('identificacion'); ?>">
                    <input type="hidden" name="empresa" id="empresa" value="<?php echo $get->empresa; ?>">
                    <input type="hidden" name="campana" id="campana" value="<?php echo $get->campana; ?>">
                </div>
                <div class="box-body chart-responsive" id="reporte_general"></div>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h5 class="box-title">Reporte Detallado: <?php echo $fecha_fin; ?></h5>
                </div>
                <div class="box-body chart-responsive">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="input-group-text"><label for="dia">Fecha:</label></span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="form-group has-feedback">
                                    <select name="fecha" id="fecha" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="errores_detallados"></div>
                </div>
            </div>
        </div>
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-body chart-responsive">
                    <div class="row">
                        <div class="col-lg-12">
					       <div class="chart" id="repo_detallado"></div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="../../js/asesor/reporte.js"></script>
