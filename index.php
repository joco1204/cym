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
                                <h5 class="text-center">
                                    <b>CYBERACTIVO ICC</b>
                                </h5>
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
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
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
