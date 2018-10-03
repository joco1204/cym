<section class="content-header">
    <h1>ERROR</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE ERRORES</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class='btn btn-primary' onclick="javascript: nuevoError();">Crear Error</button>
                        <button type="button" class='btn btn-primary' onclick="javascript: pageContent('administrador/administrador');">Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_error" style="font-size: 11px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<div id="nuevo_error" class="modal fade" role="dialog">
    <form id="nuevo_error_form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>NUEVO ERROR</b></h4>
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
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    });
</script>
<script src="../../js/matriz/error.js"></script>
