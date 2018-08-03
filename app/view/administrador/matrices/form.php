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
                <form id="matriz_form">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="cliente" class="control-label">Clientes</label>
                                        <select name="cliente" id="cliente" class="form-control" style="width: 100%;" required data-error="Debe seleccionar cliente"></select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="servicio" class="control-label">Servicios</label>
                                        <select name="servicio" id="servicio" class="form-control" style="width: 100%;" required data-error="Debe seleccionar servicio"></select>
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
                                        <b>CLIENTE:</b>
                                    </p>
                                </div>
                                <div class="col-md-3 text-left">
                                    <p id="cliente_matriz"></p>
                                    <input type="hidden" id="cliente_form" name="cliente_form">
                                </div>
                                <div class="col-md-3 text-left">
                                    <p>
                                        <b>SERVICIO:</b>
                                    </p>
                                </div>
                                <div class="col-md-3 text-left">
                                    <p id="servicio_matriz"></p>
                                    <input type="hidden" id="servicio_form" name="servicio_form">
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
<script src="../../js/matriz/crearMatriz.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    });
</script>
