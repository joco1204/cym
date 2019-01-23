<?php 
include '../../../config/session.php'; 
$session = new Session();
$session->start();

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}
?>
<section class="content-header">
    <h1><b>VALIDACIÓN REDIFERIDOSSSS</b></h1>
</section>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '7'){ ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>1</h3>
                        <p>VALIDACIÓN REDIFERIDOS</p>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="#" onclick="javascript: pageContent('validacion/consultar_declinadas/index');" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>



