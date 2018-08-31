<!DOCTYPE html>
<html>
    <head>
        <!-- Includes html headers -->
        <?php include 'config/plugins.php'; ?>
        <script src="js/login.js"></script>
    </head>
    <body class="hold-transition skin-blue layout-top-nav" onload="javascript: sessionStorage.removeItem('tockent');">
        <div class="container">
            <div class="row">
                <div style="height: 60px;"></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4" align="center">
                    <img src="img/logo.png" alt="Interactivo Contact Center" class="img-rounded">  
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center" style="height: 60px;">
                     <div class="alert alert-danger text-center" id="warning-login" style="display: none;"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <form id="login" autocomplete="off">
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <b>CALIDAD</b>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group has-feedback">
                                    <input type="text" name="user" id="user" class="form-control" placeholder="Usuario:">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña:">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <p class="text-center">
                                    <button type="submit" class="btn btn-success btn-block btn-flat">Entrar</button>
                                </p>
                                <p class="text-center">
                                    <button type="button" class="btn btn-primary btn-block btn-flat" data-toggle="modal" data-target="#recuperar_contrasena">¿Olvido su contraseña?</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="row">
                <div style="height: 60px;"></div>
            </div>
        </div>
    </body>
</html>
<div id="recuperar_contrasena" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="contrasena_form" autocomplete="off">
                <div class="modal-header btn-primary">
                    <button type="button" class="close" data-dismiss="modal" style="color: #fff">x</button>
                    <h4 class="modal-title">Recuperar Contraseña</h4>
                </div>
                <div class="modal-body">

                    <div class="col_full">
                        <div class="form-group has-feedback">
                            <label for="email" class="form-label">
                                Ingrese su email para realizar la recuperación de su contraseña <small class="text-danger">(*)</small>: 
                            </label>
                            <input type="text" name="email" id="email" class="form-control">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cambiar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>
