<?php include '../../config/header.php'; ?>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="#" onclick="pageContent('contenido');" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
                <b>C</b>
            </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <b>Calidad</b>
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Menu Principal</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-danger">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Usted tiene 1 mensaje</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <!-- start message -->
                                    <li>
                                        <a href="#">
                                            <h4>
                                                Persona Mensaje
                                                <small><i class="fa fa-clock-o"></i>5 min</small>
                                            </h4>
                                            <p>Encabezado Mensaje</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">Ver más</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Notificaciones</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            Encabezado de notificación
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">Ver más</a></li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../../libs/dist/img/avatar5.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $session->getSession('username')." ".$session->getSession('lastname'); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../libs/dist/img/avatar5.png" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo $session->getSession('username')." ".$session->getSession('lastname'); ?>
                                    <br>
                                    <?php echo $session->getSession('userprofile');  ?>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#perfil_modal">Perfil</button>
                                    <input type="hidden" value="<?php echo $_SESSION['iduser'];?>"  id="userID"/>
                                    <!--<a href="#" class="btn btn-default btn-flat">Perfil</a>-->
                                </div>
                                <div class="pull-right">
                                    <a href="#" onclick="javascript: logout();" class="btn btn-default btn-flat">Salir</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../../libs/dist/img/avatar5.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $session->getSession('username')." ".$session->getSession('lastname'); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
                </div>
            </div>
            <?php include 'menu.php'; ?>    
        </section>
        <!-- /.sidebar -->
    </aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>INTERACTIVO CONTACT CENTER</h1>
    </section>
    <section class="content" id="contenido-index"></section>
</div>
<?php include '../../config/footer.php'; ?>
<script type="text/javascript">
    pageContent('contenido');
</script>


<div id="perfil_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_crear_cliente" autocomplete="off">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>
                <h4 class="modal-title">PERFIL</h4>
                <input type="hidden" id="action" name="action" value="perfil_modal">
            </div>
            <div class="modal-body"  id="ctr_perfil">
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm" >GUARDAR</button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CERRAR</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="../../js/perfil.js"></script>