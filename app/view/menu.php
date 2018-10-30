<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <li class="header">MENU PRINCIPAL</li>
    <li class="active treeview">
        <a href="#" onclick="javascript: pageContent('contenido');">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
        </a>
    </li>
    <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '5'){ ?>
    <li class="treeview">
        <a href="#" onclick="javascript: pageContent('administrador/administrador');">
            <i class="glyphicon glyphicon-cog"></i> <span>ADMINISTRADOR</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '5'){ ?>
                <li><a href="#" onclick="javascript: pageContent('administrador/empresas/index');"><i class="glyphicon glyphicon-paperclip"></i> Empresas</a></li>
                <li><a href="#" onclick="javascript: pageContent('administrador/campanas/index');"><i class="glyphicon glyphicon-briefcase"></i> Campañas</a></li>
            <?php } ?>
            <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2'){ ?>
                <li class="treeview">
                    <a href="#"><i class="glyphicon glyphicon-th"></i> Matrices</a>
                    <ul class="treeview-menu">
                        <li><a href="#" onclick="javascript: pageContent('administrador/matrices/index');"><i class="glyphicon glyphicon-th-list"></i> Matriz</a></li>
                        <li><a href="#" onclick="javascript: pageContent('administrador/matrices/tipo_error');"><i class="glyphicon glyphicon-remove"></i> Tipo Error</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '5'){ ?>
                <li><a href="#" onclick="javascript: pageContent('administrador/usuarios/index');"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
                <li><a href="#" onclick="javascript: pageContent('administrador/asesores/index');"><i class="glyphicon glyphicon-earphone"></i> Asesores</a></li>
            <?php } ?>
            <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2'){ ?>
                <li><a href="#" onclick="javascript: pageContent('administrador/reportes/index');"><i class="glyphicon glyphicon-list-alt"></i> Reportes</a></li>
            <?php } ?>
        </ul>
    </li>
    <?php } ?>
    <?php if($session->getSession('id_perfil') == '1' || $session->getSession('id_perfil') == '2' || $session->getSession('id_perfil') == '3'){ ?>
        <li class="treeview">
            <a href="#" onclick="javascript: pageContent('analista/analista');">
                <i class="glyphicon glyphicon-knight"></i>
                <span>ANALISTA</span>
            </a>
        </li>
    <?php } ?>
</ul>