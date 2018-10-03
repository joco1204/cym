<section class="content-header">
    <h1>EMPRESAS</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE EMPRESAS</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crear_empresa">Crear Empresa</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="javascript: pageContent('administrador/administrador');">Volver</button>
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

<div id="crear_empresa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_crear_empresa" autocomplete="off">
                <div class="modal-header bg-blue text-center">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h4 class="modal-title"><b>CREAR EMPRESA</b></h4>
                    <input type="hidden" id="action" name="action" value="crear_empresa">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_empresa">EMPRESA:</label>
                                <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control" required="" data-error="Debe ingresar empresa">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="logo_empresa">LOGO:</label>
                                <input type="file" id="logo_empresa" name="logo_empresa" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="estado_empresa">ESTADO:</label>
                                <select class="form-control" id="estado_empresa" name="estado_empresa" placeholder="[Seleccione]" style="width: 100%" data-error="Debe seccionar un estado" disabled="">
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

<div id="modificar_empresa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_modificar_empresa" autocomplete="off">
                <div class="modal-header bg-blue text-center">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h4 class="modal-title"><b>MODIFICAR EMPRESA ID:</b> <span id="id_empresa"></span></h4>
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
                                <label class="control-label" for="logo_empresa_m">LOGO:</label>
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