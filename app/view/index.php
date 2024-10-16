<?php include '../../config/header.php'; ?>
    <div class="wrapper">
        <header class="main-header">
            <a href="#" onclick="pageContent('contenido');" class="logo">
                <span class="logo-mini">
                    <b>CA</b>
                </span>
                <span class="logo-lg">
                    <b>CYBERACTIVO</b>
                </span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Menu Principal</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Usted no tiene mensajes</li>
                                <li>
                                    <ul class="menu">
                                        <!--<li>
                                            <a href="#">
                                                <h4>
                                                    Persona Mensaje
                                                    <small><i class="fa fa-clock-o"></i>5 min</small>
                                                </h4>
                                                <p>Encabezado Mensaje</p>
                                            </a>
                                        </li>-->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Ver más</a></li>
                            </ul>
                        </li>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Notificaciones</li>
                                <li>
                                    <ul class="menu">
                                        <!--<li>
                                            <a href="#">
                                                Encabezado de notificación
                                            </a>
                                        </li>-->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Ver más</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../../img/logo_img.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $session->getSession('nombre')." ".$session->getSession('apellido1'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="../../img/logo_img.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $session->getSession('nombre')." ".$session->getSession('apellido1'); ?>
                                        <br>
                                        <?php echo $session->getSession('perfil'); ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal_perfil">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" onclick="javascript: logout();" class="btn btn-info btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../img/logo_img.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php echo $session->getSession('nombre'); ?>
                        </p>
                        <a href="#">
                            <i class="fa fa-circle text-success"></i> En Linea
                        </a>
                    </div>
                </div>
                <?php include 'menu.php'; ?> 
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <!-- Título de contenido principal -->
            </section>
            <!---->
            <section class="content" id="contenido-index"></section>
            <!---->
        </div>
        <script type="text/javascript">
            pageContent('contenido');
        </script>
        <div id="modal_perfil" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="form_perfil" autocomplete="off">
                        <div class="modal-header bg-blue">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">PERFIL DE USUARIO</h4>
                            <input type="hidden" name="action" id="action" value="modificar_perfil">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $session->getSession('id_usaurio'); ?>">
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col col-md-4">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="nombres">NOMBRE(S):</label>
                                        <input type="text" id="nombres" name="nombres" class="form-control" value="<?php echo $session->getSession('nombre'); ?>" disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col col-md-4">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="apellidos1">APELLIDO 1:</label>
                                        <input type="text" id="apellidos1" name="apellidos1" class="form-control" value="<?php echo $session->getSession('apellido1'); ?>"  disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col col-md-4">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="apellidos2">APELLIDO 2:</label>
                                        <input type="text" id="apellidos2" name="apellidos2" class="form-control" value="<?php echo $session->getSession('apellido2'); ?>"  disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-4">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="tipo_identificacion">TIPO IDENTIFICAICON:</label>
                                        <input type="text" id="tipo_identificacion" name="tipo_identificacion" class="form-control" value="<?php echo $session->getSession('tipo_identificacion'); ?>"  disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col col-md-4">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="identificacion">NÚMERO DE IDENTIFICACIÓN:</label>
                                        <input type="text" id="identificacion" name="identificacion" class="form-control" value="<?php echo $session->getSession('identificacion'); ?>"  disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col col-md-4">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="email">EMAIL:</label>
                                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $session->getSession('email'); ?>"  disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="usaurio">USUARIO:</label>
                                        <input type="text" id="usaurio" name="usaurio" class="form-control" value="<?php echo $session->getSession('usuario'); ?>"  disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="perfil">PERFIL USAURIO:</label>
                                        <input type="text" id="perfil" name="perfil" class="form-control" required="" data-error="Debe ingresar perfil" value="<?php echo $session->getSession('perfil'); ?>"  disabled="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php include '../../config/footer.php'; ?>