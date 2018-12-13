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
    <input type="hidden" name="id_usaurio"      id="id_usaurio"     value="<?= $session->getSession('id_usaurio'); ?>">
    <input type="hidden" name="identificacion"  id="identificacion" value="<?= $session->getSession('identificacion'); ?>">
    <input type="hidden" name="empresa"         id="empresa"        value="<?= $session->getSession('empresa'); ?>">
    <input type="hidden" name="campana"         id="campana"        value="<?= $session->getSession('campana'); ?>">
</section>
<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Reporte General (Dic 2018)</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group has-feedback">
                                    <span class="input-group-text"><label for="anio">Año:</label></span>
                                    <select name="anio" id="anio" class="form-control">
                                        <option value="">2018</option>
                                        <option value="">2017</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group has-feedback">
                                    <span class="input-group-text"><label for="mes">Mes:</label></span>
                                    <select name="mes" id="mes" class="form-control">
                                        <option value="">Diciembre</option>
                                        <option value="">Noviembre</option>
                                        <option value="">Octubre</option>
                                        <option value="">Septiembre</option>
                                        <option value="">Agosto</option>
                                        <option value="">Julio</option>
                                        <option value="">Junio</option>
                                        <option value="">Mayo</option>
                                        <option value="">Abril</option>
                                        <option value="">Marzo</option>
                                        <option value="">Febrero</option>
                                        <option value="">Enero</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <br>
                            <button type="button" class="btn btn-success" id="buscar">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <input type="text" class="knob" value="80" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="#00a65a" readonly="">
                            <div class="knob-label">ERROR NO CRÍTICO</div>
                        </div>
                        <div class="col-xs-6 col-md-3 text-center">
                            <input type="text" class="knob" value="100" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="#f39c12" readonly="">
                            <div class="knob-label">ERROR CRÍTICO DE SERVICIO</div>
                        </div>

                        <div class="col-md-3 text-center">
                            <input type="text" class="knob" value="100" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="#dd4b39" readonly="">
                            <div class="knob-label">ERROR CRÍTICO DE OPERACIÓN</div>
                        </div>

                        <div class="col-xs-6 col-md-3 text-center">
                            <input type="text" class="knob" value="90" data-width="150" data-height="150" data-bgColor="#e6e6e6" data-fgColor="#3c8dbc" readonly="">
                            <div class="knob-label">ERROR CRÍTICO DE CUMPLIMIENTO</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h5 class="box-title">Reporte Detallado (Dic 2018)</h5>
                </div>
                <div class="box-body chart-responsive">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="input-group-text"><label for="dia">Día:</label></span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="form-group has-feedback">
                                    <select name="dia" id="dia" class="form-control">
                                        <option value="10">10</option>
                                        <option value="04">04</option>
                                        <option value="01">01</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Puntos de entrenamiento:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                            <div class="panel-body">
                                <p>El asesor está preparado para recibir la llamada una vez ingresa ( contesta antes de los 3 segundos).</p>
                            </div>
                            </div>
                        </div>
                    </div>
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
<script src="../../libs/plugins/knob/knob.js"></script>
<script src="../../js/asesor/asesor.js"></script>
