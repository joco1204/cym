<section class="content-header">
    <h1>SEGMENTOS</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE SEGMENTOS</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class='btn btn-primary' data-toggle="modal" data-target="#crear_segmento">Crear Segmento</button>
                        <button type="button" class='btn btn-primary' onclick="javascript: pageContent('administrador/administrador');">Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_segmentos" style="font-size: 12px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<div id="crear_segmento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_crear_segmento" autocomplete="off">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                        <h4 class="modal-title">CREAR SEGMENTO</h4>
                    <input type="hidden" id="action" name="action" value="crear_segmento">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombre_segmento">SEGMENTO:</label>
                                <input type="text" id="nombre_segmento" name="nombre_segmento" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="id_cliente">CLIENTE:</label>
                                <select class="form-control" id="id_cliente" name="id_cliente" placeholder="[Seleccione]">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="id_servicio">SERVICIO:</label>
                                <select class="form-control" id="id_servicio" name="id_servicio" placeholder="[Seleccione]">
                                </select>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="estado_segmento">ESTADO:</label>
                                <select class="form-control" id="estado_segmento" name="estado_segmento" placeholder="[Seleccione]">
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
<script src="../../js/segmentos.js"></script>