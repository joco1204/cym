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
    <h1>REPORTES</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE REPORTES</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <lu>
                            <li>
                                <b>REPORTE GENERAL:</b>
                            </li>
                        </lu>
                        <br>
                    </div>
                    <div class="col col-md-2">
                        <div class="form-group has-feedback">
                            <label for="empresa" class="control-label">Empresas</label>
                            <select name="empresa" id="empresa" class="form-control" style="width: 100%;" required data-error="Debe seleccionar empresa"></select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="form-group has-feedback">
                            <label for="campana" class="control-label">Campañas</label>
                            <select name="campana" id="campana" class="form-control" style="width: 100%;" required data-error="Debe seleccionar campana"></select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group has-feedback">
                            <label for="desde_general" class="control-label">Desde:</label>
                            <div class="input-group date fecha_general" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <input type="text" name="desde_general" id="desde_general" class="form-control" value="<?= date('Y-m-d'); ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group has-feedback">
                            <label for="hasta_general" class="control-label">Hasta:</label>
                            <div class="input-group date fecha_general" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <input type="text" name="hasta_general" id="hasta_general" class="form-control" value="<?= date('Y-m-d'); ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success text-center" id="descargar_general">Descargar</button>
                    </div>
                </div>
                <hr>
                 <div class="row">
                    <div class="col-md-6">
                        <lu>
                            <li>
                                <b>REPORTE VENTAS DECLINADAS:</b>
                            </li>
                        </lu>                            
                    </div>
                    <div class="col-md-2">
                        <div class="form-group has-feedback">
                            <label for="desde_declinada" class="control-label">Desde:</label>
                            <div class="input-group date fecha_general" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <input type="text" name="desde_declinada" id="desde_declinada" class="form-control" value="<?= date('Y-m-d'); ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group has-feedback">
                            <label for="hasta_declinada" class="control-label">Hasta:</label>
                            <div class="input-group date fecha_general" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                 <input type="text" name="hasta_declinada" id="hasta_declinada" class="form-control" value="<?= date('Y-m-d'); ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success text-center" id="descargar_declinada">Descargar</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<script src="../../js/reportes.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    });
</script>
