<section class="content-header">
    <h1>CLIENTES</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE CLIENTES</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crear_cliente">Crear Cliente</button>
                        <button type="button" class="btn btn-primary btn-sm" onclick="javascript: pageContent('administrador/administrador');">Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_clientes" style="font-size: 12px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<div id="crear_cliente" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_crear_cliente" autocomplete="off">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h4 class="modal-title">CREAR CLIENTE</h4>
                    <input type="hidden" id="action" name="action" value="crear_cliente">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_cliente">CLIENTE:</label>
                                <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="logo_cliente">LOGO:</label>
                                <input type="file" id="logo_cliente" name="logo_cliente" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="estado_cliente">ESTADO:</label>
                                <select class="form-control" id="estado_cliente" name="estado_cliente" placeholder="[Seleccione]">
                                    <option selected=""></option>
                                    <option value="activo">activo</option>
                                    <option value="inactivo">inactivo</option>
                                </select>
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
<script src="../../js/clientes.js"></script>