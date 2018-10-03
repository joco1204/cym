<section class="content-header">
    <h1>USUARIOS</h1>
</section>
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>LISTA DE USUARIOS</h3>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_usuario">Crear Usuarios</button>
                        <button type="button" class="btn btn-primary" onclick="javascript: pageContent('administrador/administrador');">Volver</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_usuarios" style="font-size: 11px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<div id="modal_usuario" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="usuario_form" autocomplete="off">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Crear Usuario</h4>
                    <input type="hidden" name="action" id="action" value="crear_usuario">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombres">NOMBRE(S):</label>
                                <input type="text" id="nombres" name="nombres" class="form-control" required="" data-error="Debe ingresar nombre(s)">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="apellidos1">APELLIDO 1:</label>
                                <input type="text" id="apellidos1" name="apellidos1" class="form-control" required="" data-error="Debe ingresar apellidos 1">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="apellidos2">APELLIDO 2:</label>
                                <input type="text" id="apellidos2" name="apellidos2" class="form-control" required="" data-error="Debe ingresar apellidos 2">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="tipo_identificacion">TIPO IDENTIFICAICON:</label>
                                <select class="form-control" id="tipo_identificacion" name="tipo_identificacion" style="width: 100%" required="" data-error="Debe seccionar tipo de identificaicón"></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="identificacion">NÚMERO DE IDENTIFICACIÓN:</label>
                                <input type="text" id="identificacion" name="identificacion" class="form-control" required="" data-error="Debe ingresar número de identificación">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="email">EMAIL:</label>
                                <input type="email" id="email" name="email" class="form-control" required="" data-error="Debe ingresar email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="usaurio">USUARIO:</label>
                                <input type="text" id="usaurio" name="usaurio" class="form-control" required="" data-error="Debe ingresar usaurio">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="contrasena">CONTRASEÑA:</label>
                                <input type="password" id="contrasena" name="contrasena" class="form-control" required="" data-error="Debe ingresar contraseña">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="perfil">PERFIL USAURIO:</label>
                                <select class="form-control" id="perfil" name="perfil" style="width: 100%" required="" data-error="Debe seccionar perfil"></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="empresa_campana" style="display: none;">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="empresa">EMPRESA:</label>
                                <select class="form-control" id="empresa" name="empresa" style="width: 100%" required="" data-error="Debe seccionar una empresa" disabled=""></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="campana">CAMPAÑA:</label>
                                <select class="form-control" id="campana" name="campana" style="width: 100%" required="" data-error="Debe seccionar una campaña" disabled=""></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div> 
    </div>
</div>
<div id="modal_usuario_modificar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="usuario_form_modificar" autocomplete="off">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Modificar Usuario ID: <span id="id_usuario"></span></h4>
                    <input type="hidden" name="action" id="action" value="modificar_usuario">
                    <input type="hidden" name="id_usuario_m" id="id_usuario_m">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="nombres_m">NOMBRE(S):</label>
                                <input type="text" id="nombres_m" name="nombres_m" class="form-control" required="" data-error="Debe ingresar nombre(s)">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="apellidos1_m">APELLIDO 1:</label>
                                <input type="text" id="apellidos1_m" name="apellidos1_m" class="form-control" required="" data-error="Debe ingresar apellidos 1">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="apellidos2_m">APELLIDO 2:</label>
                                <input type="text" id="apellidos2_m" name="apellidos2_m" class="form-control" required="" data-error="Debe ingresar apellidos 2">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="tipo_identificacion_m">TIPO IDENTIFICAICON:</label>
                                <select class="form-control" id="tipo_identificacion_m" name="tipo_identificacion_m" style="width: 100%" required="" data-error="Debe seccionar tipo de identificaicón"></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="identificacion_m">NÚMERO DE IDENTIFICACIÓN:</label>
                                <input type="text" id="identificacion_m" name="identificacion_m" class="form-control" required="" data-error="Debe ingresar número de identificación">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="email_m">EMAIL:</label>
                                <input type="email" id="email_m" name="email_m" class="form-control" required="" data-error="Debe ingresar email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="usaurio_m">USUARIO:</label>
                                <input type="text" id="usaurio_m" name="usaurio_m" class="form-control" required="" data-error="Debe ingresar usaurio">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="contrasena_m">CONTRASEÑA:</label>
                                <input type="password" id="contrasena_m" name="contrasena_m" class="form-control">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="perfil_m">PERFIL USAURIO:</label>
                                <select class="form-control" id="perfil_m" name="perfil_m" style="width: 100%" required="" data-error="Debe seccionar perfil"></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="estado_m">ESTADO:</label>
                                <select class="form-control" id="estado_m" name="estado_m" style="width: 100%" required="" data-error="Debe seccionar estado"></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="empresa_campana_m" style="display: none;">
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="empresa_m">EMPRESA:</label>
                                <select class="form-control" id="empresa_m" name="empresa_m" style="width: 100%" required="" data-error="Debe seccionar una empresa" disabled=""></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="campana_m">CAMPAÑA:</label>
                                <select class="form-control" id="campana_m" name="campana_m" style="width: 100%" required="" data-error="Debe seccionar una campaña" disabled=""></select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div> 
    </div>
</div>
<script src="../../js/usuarios.js"></script>
<script type="text/javascript">
    $(function(){
        $("select").select2();
    });
</script>