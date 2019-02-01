<?php
include '../../../config/session.php';
$session = new Session();
$session->start();
$get = ((object) $_GET);

isset($get->id_empresa) ? $id_empresa = $get->id_empresa : $id_empresa = '0';
isset($get->id_campana) ? $id_campana = $get->id_campana : $id_campana = '0';

$id_perfil = $session->getSession('id_perfil');

if($id_empresa == '0'){ ?>
	<script type="text/javascript">
		$(function(){
			pageContent('contenido');
		});
	</script>
<?php } else { ?>
    <?php if($id_campana == '0'){ ?>
        <script type="text/javascript">
            $(function(){
                pageContent('contenido');
            });
        </script>
    <?php } else { ?>
        <input type="hidden" name="id_empresa" id="id_empresa" value="<?= $id_empresa; ?>">
        <input type="hidden" name="id_campana" id="id_campana" value="<?= $id_campana; ?>">
    <?php } ?>
<?php } ?>
<input type="hidden" name="id_perfil" id="id_perfil" value="<?= $id_perfil; ?>">
<section class="content-header">
    <h1>PLAN DE MONITOREO: <b><span id="empresa_nom"></span></b> - <b><span id="campana_nom"></span></b></h1>
</section>
<section class="content">
    <div class='box box-warning'>
        <div class='box-header with-border'>
            <h2 class='box-title'>
                <b>MONITOREOS DEL DÍA</b>
            </h2>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_dia" style="font-size: 11px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<section class="content">
    <div class='box box-success'>
        <div class='box-header with-border'>
            <h2 class='box-title'>
                <b>MONITOREOS REALIZADOS EN EL MÉS</b>
            </h2>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_mes" style="font-size: 11px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<section class="content">
	<div class='box box-primary'>
        <div class='box-header with-border'>
            <h2 class='box-title'>
                <b>LISTA DE ASESORES</b>
            </h2>
        </div>
        <div class='box-body'>
            <section class='content'>
                <div class="row">
                    <div class="col col-md-12">
                        <div class="table-responsive" id="data_asesores" style="font-size: 11px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<script src="../../js/analista/plan_monitoreo.js"></script>