<?php 
include 'business.php';
$business = new Business();
$session = $business->session;
$post = $business->post;
$get = $business->get;
$session->start();

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- definición de las metas para el sitio de SMART SOLUTION SERVICE-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="author" content="Interactivo Contact Center"/>
        <meta name="description" content="Interactivo Contact Center"/>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- librerías js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <script src="../../libs/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="../../libs/plugins/jQueryUI/jquery-ui.min.js"></script>
        <script src="../../libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../libs/plugins/chartjs/Chart.js"></script>
        <script src="../../libs/plugins/morris/morris.min.js"></script>
        <script src="../../libs/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="../../libs/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../../libs/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../../libs/plugins/knob/jquery.knob.js"></script>
        <script src="../../libs/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="../../libs/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="../../libs/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="../../libs/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="../../libs/plugins/fastclick/fastclick.js"></script>
        <script src="../../libs/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../libs/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

        <script src="../../libs/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../../libs/plugins/sweetalert/dist/sweetalert-dev.js"></script>
        <script src="../../libs/plugins/autonumeric/autonumeric.js" ></script>
        <script src="../../libs/plugins/validator/validator.js" ></script>
        <script src="../../libs/dist/js/app.js"></script>
        <script src="../../libs/dist/js/demo.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- librerias css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="../../libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../libs/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../../libs/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="../../libs/plugins/iCheck/flat/_all.css">
        <link rel="stylesheet" href="../../libs/plugins/morris/morris.css">
        <link rel="stylesheet" href="../../libs/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="../../libs/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="../../libs/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../../libs/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="../../libs/plugins/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../../libs/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../../libs/plugins/sweetalert/dist/sweetalert.css">
        <!--Select-->
        <link href="../../libs/plugins/select2/select2.min.css" rel="stylesheet"/>
        <script src="../../libs/plugins/select2/select2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("select").select2();
            });
        </script>
        <!-- Titulo de aplicación -->
        <title>CYBERACTIVO</title>
        <!-- js globales -->
        <script src="../../js/business.js"></script>
    </head>
    <!--<body class="hold-transition skin-blue sidebar-mini" onload="startTimeOut();" onkeypress="stopTimeOut();" onclick="stopTimeOut();">-->
    <body class="hold-transition skin-blue sidebar-mini">