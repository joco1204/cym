<?php 
include '../../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}

isset($get->id_declinada) ? $id_declinada = $get->id_declinada : $id_declinada = '0';
?>
<section class="content-header">
    <h1>AGREGAR DECLINADAS</h1>
</section>
<section class="content">
    <div class='box box-primary'>        
            <div class='box-header with-border'>
                <h3 class='box-title'>VENTAS DECLINADAS</h3>
            </div>           
            <div class='box-body'>
                <section class='content'>
                    <form id="validacion_form" role="form" autocomplete="off">
                        <?php if($id_declinada != '0'){ ?>
                            <input type="hidden" name="id_declinada" id="id_declinada" value="<?php echo $id_declinada; ?>">
                        <?php } ?>
                        <div class="row">                        
                            <div class="col-lg-10  col-lg-offset-1">
                                <div class="panel panel-primary">                                    
                                        <div class="panel-heading">
                                            <b>
                                                <?php if($id_declinada == '0'){ ?>
                                                    FORMULARIO DECLINADAS
                                                <?php } else { ?>
                                                    MODIFICAR VENTA DECLINADA
                                                <?php } ?>
                                                
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
                                                        <input type="text" name="fecha_venta" id="fecha_venta" class="form-control" required="" placeholder="aaaa-mm-dd" value="<?php echo date('Y-m-d'); ?>">
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
                                                        <?php if($id_declinada == '0'){ ?>
                                                            <input type="hidden" name="action" id="action" value="guardar_validacion">
                                                        <?php } else { ?>
                                                            <input type="hidden" name="action" id="action" value="modificar_validacion">
                                                        <?php } ?>                                                 
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
<?php if($id_declinada == '0'){ ?>
    <script src="../../js/validacion/agregar_validacion.js"></script>
<?php } else { ?>
    <script src="../../js/validacion/modificar_validacion.js"></script>
<?php } ?>
    
<script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    });
</script>