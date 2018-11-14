<?php 
include '../../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);
?>
<section class="content-header">
    <h1>VALIDACION VENTAS DECLINADAS</h1>
</section>
<input type="hidden" name="id_declinada" id="id_declinada" value="<?php echo $get->id_declinada; ?>">
<section class="content">
    <div class="row">        
    </div>
    <div class='box box-primary'>
            <div class="col col-md-12 text-center">
            <button type="button" class="btn btn-danger" onclick="javascript: pageContent('validacion/validacion');">Volver</button>
         </div>
        <div class='box-body'>
            <section class='content'>               
                    <div class="row">                        
                        <div class="col-lg-10  col-lg-offset-1">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <b>
                                        VISTA FORMULARIO DECLINADAS
                                    </b>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group-append">
                                                    <label for="Estado">Estado:</label>
                                                     <span id="estado"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group has-feedback">
                                                <label for="fecha_venta">Fecha venta:</label>
                                                   <span id="fecha_venta"></span>                                                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">                                    
                                            <div class="form-group">
                                                <div class="input-group-append">
                                                    <label for="fecha_validacion">Fecha De Validación:</label>
                                                    <span id="fecha_validacion"></span>
                                                </div>
                                             </div> 
                                        </div>        
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                    <span class="input-group-text"><label for="agent_asesor">Agent Asesor:</label></span>
                                                    <span id="agent_asesor"></span>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">   
                                                <div class="form-group">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><label for="nombre_agent">Nombre Asesor:</label></span>
                                                        <span id="nombre_asesor"></span>
                                                    </div>                                                
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group has-feedback">
                                                    <span class="input-group-text"><label for="cedula">Cedula o ID Cliente:</label></span>
                                                    <span id="cedula"></span>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><label for="tipo_servicio">Tipo De Servicio:</label></span>
                                                    <span id="tipo_servicio"></span>
                                                </div>
                                            </div>
                                        </div>                                                 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group-append">                                            
                                                <span class="input-group-text"><label for="motivo_servicio">Motivo Principal:</label></span>
                                                <span id="motivo_principal"></span>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                   <div class="row">      
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group has-feedback">
                                                    <span class="input-group-text"><label for="validador">Validador:</label></span>
                                                    <span id="validador"></span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>OBSERVACIÓN:</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-body">
                                                    <span id="observaciones"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</section>                        
 <script src="../../js/validacion/agregar_validacion.js"></script>

