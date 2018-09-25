<section class="content-header">
    <h1>ASESORES</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE ASESORES</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crear_asesor">Crear Asesor</button>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cargar_asesores">
                            Cargar Asesores
                            <span class="glyphicon glyphicon-file"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="javascript: pageContent('administrador/administrador');">Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_asesor" style="font-size: 11px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<div id="crear_asesor" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_crear_asesor" autocomplete="off">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                    <h4 class="modal-title">CREAR ASESOR</h4>
                    <input type="hidden" id="action" name="action" value="crear_asesor">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="empresa">EMPRESA:</label>
                                <select class="form-control" id="empresa" name="empresa" style="width: 100%" required="" data-error="Debe seccionar una empresa"></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="campana">CAMPAÑA:</label>
                                <select class="form-control" id="campana" name="campana" style="width: 100%" required="" data-error="Debe seccionar una campaña"></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="identificacion">NÚMERO DE IDENTIFICACION:</label>
                                <input type="text" id="identificacion" name="identificacion" class="form-control" required="" data-error="Debe ingresar número de indentificación">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombres">NOMBRE(S):</label>
                                <input type="text" id="nombres" name="nombres" class="form-control" required="" data-error="Debe ingresar nombre(s)">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="apellidos">APELLIDO(S):</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" required="" data-error="Debe ingresar apellidos(s)">
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


<div id="cargar_asesores" class="modal fade" role="dialog">
    <form id="cargar_asesores_form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center bg-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>GARGUE MASIVO DE ASESORES</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label for="archivo_asespres">Seleccione el archivo para cargue masivo de asesores</label>
                                <input type="file" class="form-control" name="archivo_asespres" id="archivo_asespres">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">cargar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="../../js/asesores.js"></script>
<script type="text/javascript">
    $(function(){
        $("select").select2();
    });
</script>