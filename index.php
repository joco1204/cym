<!DOCTYPE html>
<html>
    <head>
        <!-- Includes html headers -->
        <?php include 'config/plugins.php'; ?>
        <script src="js/login.js"></script>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="img/logo.png" style="width: 50%; height: 50%">
                <br>
                <a href="#"><b>Calidad ICC</b></a>
            </div>
            <div class="row">
                <div class="col-md-12 text-center" style="height: 60px;">
                     <div class="alert alert-danger text-center" id="warning-login" style="display: none;"></div>
                </div>
            </div>
            <div class="login-box-body">
                <form id="login">
                    <div class="form-group has-feedback">
                        <input type="text" name="user" id="user" class="form-control" placeholder="Usuario:">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña:">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
