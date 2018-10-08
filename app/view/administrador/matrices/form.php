<?php
include '../../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

if(isset($get->accion_matriz)){
    if($get->accion_matriz == 'modificar'){
        isset($get->id_matriz) ? $id_matriz = $get->id_matriz : $id_matriz = '0';
    } else {
        $id_matriz = '0';
    }
} else {
    header('location: ../../index.php');
}

?>
<section class="content-header">
    <h1>MATRICES</h1>
</section>
<form id="matriz_form" autocomplete="off">
    <section class="content">
        <div class='box box-primary'>
            <?php if($id_matriz == '0'){ ?>
                <div class='box-header with-border'>
                    <h3 class='box-title'>AÑADIR MATRIZ</h3>
                </div>
            <?php } else { ?>
                <div class='box-header with-border'>
                    <div class="row">
                        <div class="col col-md-3">
                            <input type="hidden" name="id_matriz" id="id_matriz" value="<?php echo $id_matriz; ?>">
                            <h3 class='box-title'>MATRIZ ID : <span id="id"></span></h3>    
                        </div>
                        <div class="col col-md-1">
                            <h3 class='box-title'>ESTADO :</h3>    
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group has-feedback">
                                <select name="estado" id="estado" class="form-control" style="width: 100%;" required data-error="Debe seleccionar estado de la matriz"></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class='box-body'>
                <section class='content'>
                    <?php if($id_matriz == '0'){ ?>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <div class="form-group has-feedback">
                                            <label for="empresa" class="control-label">Empresas</label>
                                            <select name="empresa" id="empresa" class="form-control" style="width: 100%;" required data-error="Debe seleccionar empresa"></select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col col-md-3">
                                        <div class="form-group has-feedback">
                                            <label for="campana" class="control-label">Campañas</label>
                                            <select name="campana" id="campana" class="form-control" style="width: 100%;" required data-error="Debe seleccionar campana"></select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col col-md-3">
                                        <button type="button" id="add_matriz" class="btn btn-primary btn-sm" onclick="javascript: addMatriz();">
                                            Crear Matriz <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary" id="matriz_pannel" style="display: none;">
                    <?php } else { ?>
                        <div class="panel panel-primary" id="matriz_pannel">
                    <?php } ?>
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-3 text-left">
                                    <p>
                                        <b>EMPRESA:</b>
                                    </p>
                                </div>
                                <div class="col-md-3 text-left">
                                    <p id="empresa_matriz"></p>
                                    <input type="hidden" id="empresa_form" name="empresa_form">
                                </div>
                                <div class="col-md-3 text-left">
                                    <p>
                                        <b>CAMPAÑA:</b>
                                    </p>
                                </div>
                                <div class="col-md-3 text-left">
                                    <p id="campana_matriz"></p>
                                    <input type="hidden" id="campana_form" name="campana_form">
                                </div>
                            </div>                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col col-md-12">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="javascript: addError();">
                                        Tipo de Error <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                    <input type="hidden" id="tipo_error" name="tipo_error">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col col-md-12" id="canvas_matriz"></div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <input type="hidden" id="action" name="action">
                                <div class="col col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</form>
<?php if($id_matriz == '0'){ ?>
    <script src="../../js/matriz/crearMatriz.js"></script>
<?php } else { ?>
    <script src="../../js/matriz/modificarMatriz.js"></script>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    });
</script>