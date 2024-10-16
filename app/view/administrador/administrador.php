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
    <h1><b>ADMINISTRADOR</b></h1>
</section>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '5'){ ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>1</h3>
                        <p>Empresas</p>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="#" onclick="javascript: pageContent('administrador/empresas/index');" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Campañas</p>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="#" onclick="javascript: pageContent('administrador/campanas/index');" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php } ?>
        <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2'){ ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>3</h3>
                        <p>Matrices</p>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="#" onclick="javascript: pageContent('administrador/matrices/index');" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php } ?>
        <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '5'){ ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>4</h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="#" onclick="javascript: pageContent('administrador/usuarios/index');" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>5</h3>
                        <p>Asesores</p>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="#" onclick="javascript: pageContent('administrador/asesores/index');" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php } ?>
        <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '3'){ ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>6</h3>
                        <p>Reportes</p>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="#" onclick="javascript: pageContent('administrador/reportes/index');" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>