<?php
include '../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

isset($get->id_agenda) ? $id_agenda = $get->id_agenda : $id_agenda = '0' ;
isset($get->id_asesor) ? $id_asesor = $get->id_asesor : $id_asesor = '0';

if($id_asesor == '0'){ ?>
    <script type="text/javascript">
        $(function(){
            pageContent('contenido');
        });
    </script>
<?php } else { ?>
<input type="hidden" name="id_agenda" id="id_agenda" value="<?php echo $id_agenda; ?>">
<input type="hidden" name="id_asesor" id="id_asesor" value="<?php echo $id_asesor; ?>">
<section class="content-header">
    <h1>
        <b>VISTA MONITOREO</b>
    </h1>
</section>
<section class="content">
	<div class='box box-primary'>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                DATOS DE MONITOREO
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>ID MONITOREO:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="id_monitoreo"></span>
                                        <input type="hidden" name="num_monitoreo" id="num_monitoreo">
                                    </div>
                                    <div class="col-md-3">
                                        <b>FECHA DE LLAMADA:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="fecha_llamada"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>CÉDULA:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="cedula"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <b>HORA DE LLAMADA:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="hora_llamada"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>ASESOR:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="asesor"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <b>ANALISTA:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="analista"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>TIPIFICACIÓN:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="tipificacion"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <b>ID LLAMADA:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="id_llamada"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <b>OBSERVACIÓN:</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <span id="observacion"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>SOLUCIÓN:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="solucion"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <b>FALLAS DE AUDIO:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="fallas_audio"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>FECHA DE REGISTRO:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="fecha_registro"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <b>FECHA DE MODIFICACIÓN:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="fecha_modificacion"></span>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-12" id="detalle_monitoreo"></div>
                </div>
                <div class="row">
                    <div class="col col-md-6 col-md-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center"><b>TOTAL MONITOREO</b></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12" id="total_monitoreos"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<script src="../../js/analista/vista_monitoreo.js"></script>
<?php } ?>

