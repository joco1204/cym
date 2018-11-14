<?php 
include '../../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}
?>
<section class="content-header">
    <h1>AGREGAR DECLINADAS</h1>
</section>

<section class="content">
    <div class='box box-primary'>
        <div class='box-body'>
            <section class='content'>
                <form id="validacion_form" role="form" autocomplete="off">
                    <div class="row">                        
                        <div class="col-lg-10  col-lg-offset-1 text-center">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <b>
                                        FORMULARIO DECLINADAS
                                    </b>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><label for="Estado">Estado:</label></span>
                                                    <select name="estado" id="estado" class="form-control" required=""></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group has-feedback">
                                                <span class="input-group-text"><label for="fecha_venta">Fecha venta:</label></span>
                                                <div class="input-group date fecha_venta" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                                    <input type="text" name="fecha_venta" id="fecha_venta" class="form-control" value="" required="" placeholder="aaaa-mm-dd">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">                                    
                                            <div class="form-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><label for="fecha_validacion">Fecha De Validación:</label></span>
                                                    <div class="input-group date fecha_validacion" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                                      <input type="text" name="fecha_validacion" id="fecha_validacion" class="form-control" value="" required="" placeholder="aaaa-mm-dd">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>  
                                                    </div>
                                                </div>
                                             </div> 
                                        </div>        
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                    <span class="input-group-text"><label for="agent_asesor">Agent Asesor:</label></span>
                                                    <select name="agent_asesor" id="agent_asesor" class="form-control" required=""></select>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">   
                                                <div class="form-group">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><label for="nombre_agent">Nombre Asesor:</label></span>
                                                        <input type="text" class="form-control" name="nombre_asesor" id="nombre_asesor" placeholder="Nombre Asesor" readonly="" required="">
                                                        <input type="hidden"  name="id_asesor" id="id_asesor">
                                                    </div>                                                
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group has-feedback">
                                                    <span class="input-group-text"><label for="cedula">Cedula o ID Cliente:</label></span>
                                                    <input type="text-center" class="form-control" name="cedula" id="cedula" placeholder="Cedula o ID Cliente" required="">
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>            
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><label for="tipo_servicio">Tipo De Servicio:</label></span>
                                                    <select name="tipo_servicio" id="tipo_servicio" class="form-control" required=""></select>
                                                </div>
                                            </div>
                                        </div>                                                 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group-append">                                            
                                                <span class="input-group-text"><label for="motivo_servicio">Motivo Principal:</label></span>
                                                <select name="motivo_principal" id="motivo_principal" class="form-control" required=""></select>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">      
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group has-feedback">
                                                    <span class="input-group-text"><label for="validador">Validador:</label></span>
                                                    <select name="validador" id="validador" class="form-control" required=""></select>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><label for="observaciones">Observaciones:</label></span>
                                                    <textarea class="form-control" name="observaciones" id="observaciones" required=""></textarea>
                                                </div>                                                
                                            </div>
                                        </div>            
                                    </div>
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group-append">
                                                    <input type="hidden" name="action" id="action">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </form>
            </section>
        </div>
    </div>
</section>                        
 <script src="../../js/validacion/agregar_validacion.js"></script>

 <script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    });
</script>