<?php 
include '../../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}

if ($get->id_declinada == ''){
    header('location: ../../index.php');
}
?>
<section class="content-header">
    <h1>VALIDACION VENTAS DECLINADAS</h1>
</section>
<input type="hidden" name="id_declinada" id="id_declinada" value="<?php echo $get->id_declinada; ?>">
<section class="content">
    <div class='box box-primary'>
        <div class='box-header with-border'>
            <h3 class='box-title'>VENTA DECLINADA</h3>
        </div>
        <div class='box-body'>
                <div class="row">
                    <div class="col col-md-12 text-center">
                        <button type="button" class="btn btn-danger" onclick="javascript: pageContent('validacion/consultar_declinadas/index'); ">Volver</button>
                    </div>
                </div>
                <br>        
                <div class="row">                        
                    <div class="col-lg-10  col-lg-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>
                                    VISTA DE VENTA DECLINADA
                                </b>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div  class="col-md-3">
                                        <b>Estado:</b>
                                    </div>
                                    <div  class="col-md-3">
                                        <span id="estado"></span>    
                                    </div>
                                    <div  class="col-md-3">
                                        <b>Fecha venta:</b>
                                    </div>
                                    <div  class="col-md-3">
                                        <span id="fecha_venta"></span>    
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div  class="col-md-3">
                                        <b>Fecha De Validación:</b>
                                    </div>
                                    <div  class="col-md-3">
                                        <span id="fecha_validacion"></span>
                                    </div>
                                    <div  class="col-md-3">
                                        <b>Agent Asesor:</b>
                                    </div>
                                    <div  class="col-md-3">
                                        <span id="agent_asesor"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div  class="col-md-3">
                                        <b>Nombre Asesor:</b>
                                    </div>
                                    <div  class="col-md-3">
                                        <span id="nombre_asesor"></span>
                                    </div>
                                    <div  class="col-md-3">
                                        <b>Cedula o ID Cliente:</b>
                                    </div>
                                    <div  class="col-md-3">
                                        <span id="cedula"></span>
                                    </div>
                                </div>
                                <br>      
                                <div class="row">
                                    <div  class="col-md-3">
                                        <b>Tipo De Servicio:</b>
                                    </div>
                                    <div  class="col-md-3">
                                        <span id="tipo_servicio"></span>
                                    </div>
                                    <div  class="col-md-3">
                                        <b>Motivo Principal:</b>
                                    </div>
                                    <div  class="col-md-3">
                                        <span id="motivo_principal"></span>
                                    </div>                                           
                                </div>
                                <br>
                                <div class="row">      
                                    <div class="col-md-3">
                                        <b>Validador:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <span id="validador"></span>
                                    </div> 
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <b>OBSERVACIÓN:</b>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <p>
                                                    <span id="observaciones"></span>    
                                                </p>
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
 <script src="../../js/validacion/consulta_declinada.js"></script>

