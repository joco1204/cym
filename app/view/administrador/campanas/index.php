<section class="content-header">
    <h1>CAMPAÑAS</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE CAMPAÑAS</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class='btn btn-primary' data-toggle="modal" data-target="#crear_campana">Crear Campaña</button>
                        <button type="button" class='btn btn-primary' onclick="javascript: pageContent('administrador/administrador');">Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_campanas" style="font-size: 11px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<div id="crear_campana" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_crear_campana" autocomplete="off">
                <div class="modal-header bg-blue text-center">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                        <h4 class="modal-title"><b>CREAR CAMPAÑA</b></h4>
                    <input type="hidden" id="action" name="action" value="crear_campana">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="id_empresa">EMPRESA:</label>
                                <select class="form-control" id="id_empresa" name="id_empresa" placeholder="[Seleccione]" style="width: 100%;" required="" data-error="Debe seleccionar un empresa">
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_campana">CAMPAÑA:</label>
                                <input type="text" id="nombre_campana" name="nombre_campana" class="form-control" required="" data-error="Debe ingresar campana">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="estado_campana">ESTADO:</label>
                                <select class="form-control" id="estado_campana" name="estado_campana" placeholder="[Seleccione]" style="width: 100%;" required="" data-error="Debe seccionar un estado" disabled="">
                                    <option value="activo" selected="">activo</option>
                                    <option value="inactivo">inactivo</option>
                                </select>
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
<div id="modificar_campana" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_modificar_campana" autocomplete="off">
                <div class="modal-header bg-blue text-center">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h4 class="modal-title"><b>MODIFICAR CAMPAÑA ID:</b> <span id="id_campana"></span></h4>
                    <input type="hidden" id="action" name="action" value="modificar_campana">
                    <input type="hidden" name="id_campana_m" id="id_campana_m">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="id_empresa_m">EMPRESA:</label>
                                <select class="form-control" id="id_empresa_m" name="id_empresa_m" style="width: 100%;" required="" data-error="Debe seleccionar un empresa">
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_campana_m">CAMPAÑA:</label>
                                <input type="text" id="nombre_campana_m" name="nombre_campana_m" class="form-control" required="" data-error="Debe ingresar campana">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="estado_campana_m">ESTADO:</label>
                                <select class="form-control" id="estado_campana_m" name="estado_campana_m" style="width: 100%;" required="" data-error="Debe seccionar un estado">
                                </select>
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
<script src="../../js/campanas.js"></script>
<script type="text/javascript">
    $(function(){
        $("select").select2();
    });
</script>