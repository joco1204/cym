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
    <h1>VALIDACIÓN REDIFERIDOS</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>VENTAS</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        
                        <button type="button" class="btn btn-primary btn-sm" onclick="javascript: pageContent('validacion_citi/validacion_rediferidos');">Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_empresas" style="font-size: 11px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>


<div id="modificar_validacion_rediferido" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_modificar_validacion_rediferido" autocomplete="off">
                <div class="modal-header bg-blue text-center">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h4 class="modal-title"><b>MODIFICAR VENTA ID:</b> <span id="id_empresa"></span></h4>
                    <input type="hidden" id="action" name="action" value="modificar_validacion_rediferido">
                    <input type="hidden" name="id_empresa_m" id="id_empresa_m">
                </div><br>

                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="campana_r">CAMPAÑA:</label>
                                <input type="text" id="campana_r" name="campana_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="tipo_form_r">TIPO FORMULARIO:</label>
                                <input type="text" id="tipo_form_r" name="tipo_form_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_asesor_r">NOMBRE ASESOR:</label>
                                <input type="text" id="nombre_asesor_r" name="nombre_asesor_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="usuario_asesor_r">USUARIO ASESOR:</label>
                                <input type="text" id="usuario_asesor_r" name="usuario_asesor_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="fecha_creacion_r">FECHA:</label>
                                <input type="text" id="fecha_creacion_r" name="fecha_creacion_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="hora_creacion_r">HORA:</label>
                                <input type="text" id="hora_creacion_r" name="hora_creacion_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-header bg-green text-center">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h5 class="modal-title"><b>INFORMACION BASICA DEL CLIENTE:</b> <span id="id_empresa"></span></h5>
                    <input type="hidden" id="action" name="action" value="modificar_validacion_rediferido">
                    <input type="hidden" name="id_empresa_m" id="id_empresa_m">
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="basico_r">BASICO:</label>
                                <input type="text" id="basico_r" name="basico_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="documento_r">NUM. DOCUMENTO:</label>
                                <input type="text" id="documento_r" name="documento_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_cliente_r">NOMBRE:</label>
                                <input type="text" id="nombre_cliente_r" name="nombre_cliente_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="telefono1_r">TELEFONO 1:</label>
                                <input type="text" id="telefono1_r" name="telefono1_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="telefono2_r">TELEFONO 2:</label>
                                <input type="text" id="telefono2_r" name="telefono2_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="telefono3_r">TELEFONO 3:</label>
                                <input type="text" id="telefono3_r" name="telefono3_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="celular_r">CELULAR:</label>
                                <input type="text" id="celular_r" name="celular_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="ciudad_r">CIUDAD:</label>
                                <input type="text" id="ciudad_r" name="ciudad_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-header bg-green text-center">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h5 class="modal-title"><b>PRODUCTOS:</b> <span id="id_empresa"></span></h5>
                    <input type="hidden" id="action" name="action" value="modificar_validacion_rediferido">
                    <input type="hidden" name="id_empresa_m" id="id_empresa_m">
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="num_tarjeta_r">NUM. TARJETA:</label>
                                <input type="text" id="num_tarjeta_r" name="num_tarjeta_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="tipo_tarjeta_r">TIPO TARJETA:</label>
                                <input type="text" id="tipo_tarjeta_r" name="tipo_tarjeta_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="plazo_r">PLAZO:</label>
                                <input type="text" id="plazo_r" name="plazo_r" class="form-control" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm" >GUARDAR</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CERRAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../../js/validacion_rediferidos.js"></script>
<script type="text/javascript">
    $(function(){
        $("select").select2();
    });
</script>