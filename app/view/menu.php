<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <li class="header">MENU PRINCIPAL</li>
    <li class="active treeview">
        <a href="#" onclick="javascript: pageContent('contenido');">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#" onclick="javascript: pageContent('administrador/administrador');">
            <i class="glyphicon glyphicon-cog"></i> <span>ADMINISTRADOR</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#" onclick="javascript: pageContent('administrador/clientes/index');"><i class="glyphicon glyphicon-paperclip"></i> Clientes</a></li>
            <li><a href="#" onclick="javascript: pageContent('administrador/servicios/index');"><i class="glyphicon glyphicon-briefcase"></i> Servicios</a></li>
            <li><a href="#" onclick="javascript: pageContent('administrador/matrices/index');"><i class="glyphicon glyphicon-list"></i> Matrices</a></li>
            <li><a href="#" onclick="javascript: pageContent('administrador/usuarios/index');"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
        </ul>
    </li>

    <!--<li class="treeview">
        <a href="#" onclick="javascript: pageContent('analista/analista');">
            <i class="glyphicon glyphicon-file"></i> <span>ANALISTA</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#" onclick="javascript: pageContent('analista/claro/index');"><img src="../../libs/dist/img/claro.png" class="img-rounded" alt="User Image" align="center" width="45" height="40"> Claro</a>
            <li><a href="#" onclick="javascript: pageContent('analista/sic/index');"> <img src="../../libs/dist/img/sic.png" class="img-rounded" alt="User Image" align="center" width="45" height="40">    SIC</a>
            <li><a href="#" onclick="javascript: pageContent('analista/cruz_verde/index');"><img src="../../libs/dist/img/cruz.png" class="img-rounded" alt="User Image" align="center" width="45" height="40"> Cruz Verde</a>
        </ul>
    </li>-->


</ul>