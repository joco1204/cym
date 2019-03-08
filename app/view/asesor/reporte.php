<?php 
include '../../../config/conn_mysql.php';
include '../../../config/session.php';
date_default_timezone_set('America/Bogota');
setlocale(LC_ALL,"es_CO");

$session = new Session();
$mysql = new Mysql();

$session->start();
$get = ((object) $_GET);

if(!$session->getSession('token') || $session->getSession('token') == ''){
    $session->destroy();
    header('location: ../../index.php');
}

$arr_empresas = $session->getSession('empresa');
$obj_empresas = ((object) $arr_empresas);
$obj_empresas = new stdClass();

$anio = date('Y');
$mes = date('m');
$dia_fin = date("d", mktime(0,0,0, $mes+1, 0, $anio));
$fecha_fin = date('m Y', mktime(0,0,0, $mes, $dia_fin, $anio));
/********/
$mes_actual = strftime('%B %Y', date('Y-m-d', mktime(0,0,0, $mes, $dia_fin, $anio)));
$mes_anterior_1 = strftime('%B %Y', date('Y-m-d', mktime(0,0,0, $mes -1, $dia_fin, $anio)));
$mes_anterior_2 = strftime('%B %Y', date('Y-m-d', mktime(0,0,0, $mes -2, $dia_fin, $anio)));

function primer_dia(){
    $month = date('m');
    $year = date('Y');
    return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
}

function ultimo_dia(){ 
    $month = date('m');
    $year = date('Y');
    $day = date("d", mktime(0,0,0, $month+1, 0, $year));
    return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
}


$query  = "SELECT MAX(b.fecha_llamada) AS fecha_llamada, MAX(b.fecha_registro) AS fecha_registro FROM ca_asesores AS a ";
$query .= "LEFT JOIN ca_monitoreo_asesor AS b ON a.id = b.id_asesor ";
$query .= "WHERE a.identificacion = '".$session->getSession('identificacion')."' ";
$query .= "AND b.fecha_registro BETWEEN '".primer_dia()."' AND '".ultimo_dia()."'; ";
$result = $mysql->query($query);
$row = $result->fetch(PDO::FETCH_OBJ);

if(isset($_GET['fecha_registro'])) {
    $fecha_registro = $get->fecha_registro;
} else {
    $fecha_registro = $row->fecha_registro;
}

$query_general  = "SELECT DISTINCT a.id_asesor, a.id_error, a.error, a.siglas, a.tipo_error, a.color_informe, a.porcentaje ";
$query_general .= "FROM ca_monitoreo_asesor_detallado_general AS a ";
$query_general .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
$query_general .= "WHERE b.identificacion = '".$session->getSession('identificacion')."' AND a.fecha_registro = '".$fecha_registro."';";
$result_general = $mysql->query($query_general);

$query_general2  = "SELECT DISTINCT a.id_asesor, a.id_error, a.error, a.siglas, a.tipo_error, a.color_informe, a.porcentaje ";
$query_general2 .= "FROM ca_monitoreo_asesor_detallado_general AS a ";
$query_general2 .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
$query_general2 .= "WHERE b.identificacion = '".$session->getSession('identificacion')."' AND a.fecha_registro = '".$fecha_registro."';";
$result_general2 = $mysql->query($query_general2);

$query_general3  = "SELECT DISTINCT a.id_monitoreo ";
$query_general3 .= "FROM ca_monitoreo_asesor_detallado_general AS a ";
$query_general3 .= "LEFT JOIN ca_asesores AS b ON a.id_asesor = b.id ";
$query_general3 .= "WHERE b.identificacion = '".$session->getSession('identificacion')."' AND a.fecha_registro = '".$fecha_registro."'; ";
$result_general3 = $mysql->query($query_general3);
$row_general3 = $result_general3->fetch(PDO::FETCH_OBJ);

$query_info  = "SELECT a.id_error, c.error, c.siglas, a.id_punto_entrenamiento, d.punto_entrenamiento ";
$query_info .= "FROM ca_monitoreo_asesor_detallado AS a ";
$query_info .= "LEFT JOIN ca_error AS b ON a.id_error = b.id ";
$query_info .= "LEFT JOIN pa_tipo_error AS c ON b.tipo_error = c.id ";
$query_info .= "LEFT JOIN ca_punto_entrenamiento AS d ON a.id_punto_entrenamiento = d.id ";
$query_info .= "WHERE a.id_punto_entrenamiento <> '0' AND a.id_monitoreo_asesor = '".$row_general3->id_monitoreo."'; ";
$result_info = $mysql->query($query_info);

?>
<section class="content"> 
    <div class="row">
        <div class="col-md-1">
            <span>
                <label>Mes: </label>
            </span>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group has-feedback">
                    <select name="mes" id="mes" class="form-control">
                        <option></option>
                        <option value="<?php echo $mes_actual; ?>"><?php echo $mes_actual; ?></option>
                        <option value="<?php echo $mes_anterior_1; ?>"><?php echo $mes_anterior_1; ?></option>
                        <option value="<?php echo $mes_anterior_2; ?>"><?php echo $mes_anterior_2; ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" onclick="" title="Buscar">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Reporte General <?php echo $mes_actual; ?></h3>
                    <input type="hidden" name="identificacion" id="identificacion" value="<?php echo $session->getSession('identificacion'); ?>">
                    <input type="hidden" name="empresa" id="empresa" value="<?php echo $get->empresa; ?>">
                    <input type="hidden" name="campana" id="campana" value="<?php echo $get->campana; ?>">
                </div>
                <div class="box-body chart-responsive" id="reporte_general"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-2"></div>
        <div class="col-md-2">
            <span class="input-group-text"><label for="dia">Filtar Por Fecha:</label></span>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group has-feedback">
                    <select name="fecha" id="fecha" class="form-control">
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" onclick="javascript: pageContent('asesor/reporte','empresa=<?php echo $get->empresa; ?>&campana=<?php echo $get->campana; ?>&fecha_registro='+$('#fecha').val());" title="Buscar">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
    </div>
	<div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h5 class="box-title">Reporte Detallado: <?php echo $mes_actual; ?></h5>
                </div>
                <div class="box-body chart-responsive">
                    <?php while ($row_info = $result_info->fetch(PDO::FETCH_OBJ)){ ?>
                        <div class="row">
                            <div class="col-md-4">
                                <span>
                                    <label>Tipo de error</label>
                                </span>
                            </div>
                            <div class="col-md-8">
                                <span><?php echo $row_info->error; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span>
                                    <label>Siglas:</label>
                                </span>
                            </div>
                            <div class="col-md-8">
                                <span><?php echo $row_info->siglas; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span>
                                    <label>Punto de entrenamiento:</label>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <span><?php echo $row_info->punto_entrenamiento; ?></span>      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-body chart-responsive">
                    <div class="row">
                        <div class="col-md-4">
                            <span>
                                <label>Fecha Monitoreo:</label>
                            </span>
                        </div>
                        <div class="col-md-8">
                            <span><?php echo $fecha_registro; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
					       <div class="chart" id="repo_detallado" style="height: 250px;"></div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="../../js/asesor/reporte.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    Morris.Bar({
        element: 'repo_detallado',
        resize: true,
        data: [
        <?php while($row_general = $result_general->fetch(PDO::FETCH_OBJ)){ ?>
            {x: '<?php echo $row_general->siglas; ?>', y: '<?php echo $row_general->porcentaje; ?>'},
        <?php } ?>
        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['%'],
        gridTextSize: 12,
        barColors: function (row, series, type){
            if(type === 'bar'){
                <?php $i = 0;
                    while($row_general = $result_general2->fetch(PDO::FETCH_OBJ)){
                        echo "if(row.x == ".$i."){";
                        echo "return '".$row_general->color_informe."';";
                        echo "}";
                        $i++;
                    }
                ?>
            } else {
                return '#fff';
            }
        },
    });
    $("select").select2();
});
</script>
