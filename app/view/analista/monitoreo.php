<?php
include '../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

isset($get->id_empresa) ? $id_empresa = $get->id_empresa : $id_empresa = '0';
isset($get->id_campana) ? $id_campana = $get->id_campana : $id_campana = '0';
isset($get->id_asesor) ? $id_asesor = $get->id_asesor : $id_asesor = '0';
isset($get->id_agenda) ? $id_agenda = $get->id_agenda : $id_agenda = '0' ;
if($id_empresa == '0'){ ?>
    <script type="text/javascript">
        $(function(){
            pageContent('contenido');
        });
    </script>
<?php } else { ?>
    <form id="monitoreo_form" role="form">
        <input type="hidden" name="id_empresa" id="id_empresa" value="<?= $id_empresa; ?>">
        <input type="hidden" name="id_campana" id="id_campana" value="<?= $id_campana; ?>">
        <input type="hidden" name="id_asesor" id="id_asesor" value="<?= $id_asesor; ?>">
        <input type="hidden" name="id_agenda" id="id_agenda" value="<?= $id_agenda; ?>">
        <section class="content-header">
            <h1>	
            	<b>MONITOREO </b>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">DATOS DE MONITOREO <input type="hidden" name="action"  id="action" value="inserta_monitoreo"></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2 ">
                                    <b>ID MONITOREO:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <input type="text" name="id_monitoreo" id="id_monitoreo" class="form-control" value="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <b>FECHA DE LLAMADA/REGISTRO:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <div class="input-group date fechas_monitoreos" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                            <input type="text" name="fechas_llamada" id="fechas_llamada" class="form-control" value="" required="">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <b>CÉDULA:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <input type="text" name="cedula_asesor" id="cedula_asesor" class="form-control" value="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <b>HORA DE LLAMADA:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <input type="time" name="hora_llamada" id="hora_llamada" class="form-control" value="" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <b>ASESOR:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <input type="text" name="nombre_asesor" id="nombre_asesor" class="form-control" value="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <b>ANALISTA:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <input type="hidden" name="id_analista" id="id_analista" class="form-control" value="<?php echo $session->getSession('id_usaurio'); ?>">
                                        <input type="text" name="nombre_analista" id="nombre_analista" class="form-control" value="<?php echo $session->getSession('nombre').' '.$session->getSession('apellido1').' '.$session->getSession('apellido2'); ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <b>TIPIFICACIÓN:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <select name="tipificacion" id="tipificacion" class="form-control" required=""></select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <b>ID LLAMADA:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <input type="text" name="id_llamada" id="id_llamada" class="form-control" value="" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="observacion">OBSERVACIÓN:</label>
                                        <textarea name="observacion" id="observacion" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <b>SOLUCIÓN:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <select name="solucion" id="solucion" class="form-control" required=""></select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <b>FALLAS DE AUDIO:</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <select name="audio" id="audio" class="form-control" required=""></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="panel_monitoreo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </div>
            </div>
        </section>
    </form>
    <script src="../../js/analista/monitoreo.js"></script>
<?php } ?>