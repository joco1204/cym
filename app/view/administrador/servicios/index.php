<section class="content-header">
    <h1>SERVICIOS</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE SERVICIOS</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class='btn btn-primary' data-toggle="modal" data-target="#crear_servicio">Crear Servicio</button>
                        <button type="button" class='btn btn-primary' onclick="javascript: pageContent('administrador/administrador');">Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_servicios" style="font-size: 12px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<div id="crear_servicio" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_crear_servicio" autocomplete="off">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                        <h4 class="modal-title">CREAR SERVICIO</h4>
                    <input type="hidden" id="action" name="action" value="crear_servicio">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_servicio">SERVICIO:</label>
                                <input type="text" id="nombre_servicio" name="nombre_servicio" class="form-control" required="" data-error="Debe ingresar servicio">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="id_cliente">CLIENTE:</label>
                                <select class="form-control" id="id_cliente" name="id_cliente" placeholder="[Seleccione]" style="width: 100%;" required="" data-error="Debe seleccionar un cliente">
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="estado_servicio">ESTADO:</label>
                                <select class="form-control" id="estado_servicio" name="estado_servicio" placeholder="[Seleccione]" style="width: 100%;" required="" data-error="Debe seccionar un estado">
                                    <option selected=""></option>
                                    <option value="activo">activo</option>
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
<script src="../../js/servicios.js"></script>
<script type="text/javascript">
    $(function(){
        $("select").select2();
    });
</script>