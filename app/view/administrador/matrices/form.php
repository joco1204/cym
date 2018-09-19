<section class="content-header">
    <h1>MATRICES</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>AÑADIR MATRIZ</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <form id="matriz_form" autocomplete="off">
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
                                    <button type="button" id="add_matriz" class="btn btn-primary btn-sm" onclick="javascript: addError();">
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
                </form>
            </section>
        </div>
    </div>
</section>
<form id="nuevo_error_form">
    <div id="nuevo_error" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">NUEVO ERROR</h4>
                    <input type="hidden" name="action" value="guardar_error">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="nuevo_tipo_error">Tipo:</label>
                                <select name="nuevo_tipo_error" id="nuevo_tipo_error" class="form-control" style="width: 100%;" required="">
                                    <option value="CRITICO">Crítico</option>
                                    <option value="NO_CRITICO">No Crítico</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="nuevo_error">Error:</label>
                                <input type="text" name="nuevo_error" id="nuevo_error" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="siglas_error">Siglas:</label>
                                <input type="text" name="siglas_error" id="siglas_error" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="estado_tipo_error">Estado:</label>
                                <input type="hidden" name="estado_tipo_error" id="estado_tipo_error" value="activo" required="">
                                <select  class="form-control" style="width: 100%;" disabled="">
                                    <option value="activo" selected="">activo</option>
                                    <option value="inactivo">inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="../../js/matriz/crearMatriz.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    });
</script>