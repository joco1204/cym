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


<div id="modificar_empresa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_modificar_empresa" autocomplete="off">
                <div class="modal-header bg-blue text-center">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h4 class="modal-title"><b>MODIFICAR VENTA ID:</b> <span id="id_empresa"></span></h4>
                    <input type="hidden" id="action" name="action" value="modificar_empresa">
                    <input type="hidden" name="id_empresa_m" id="id_empresa_m">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_empresa_m">EMPRESA:</label>
                                <input type="text" id="nombre_empresa_m" name="nombre_empresa_m" class="form-control" required="" data-error="Debe ingresar empresa">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="logo_empresa_m">LOGOOO:</label>
                                <input type="file" id="logo_empresa_m" name="logo_empresa_m" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="estado_empresa_m">ESTADO:</label>
                                <select class="form-control" id="estado_empresa_m" name="estado_empresa_m" style="width: 100%" data-error="Debe seccionar un estado"></select>
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
<script src="../../js/empresas.js"></script>
<script type="text/javascript">
    $(function(){
        $("select").select2();
    });
</script>