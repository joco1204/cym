<?php 
include '../../../../config/session.php'; 
$session = new Session();
$session->start();

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}
?>
<section class="content-header">
    <h1><b>VALIDACIÓN REDIFERIDOS</b></h1>
</section>
<section class="content">

    <div class="row">
        <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '7'){ ?>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>1</h3>
                        <p>Validación</p>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="#" onclick="javascript: pageContent('validacion/rediferidos/index');" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php } ?>
    </div>
    <hr>
    <div class="row">
        <!-- Aquí debe seguir el código -->
    </div>
</section>
<script src="../../js/validacion/rediferidos/rediferidos.js"></script>



