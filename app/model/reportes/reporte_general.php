<?php
include '../../../config/connect.php';
$db = new Connect();

$query_ec  = "SELECT b.empresa, a.campana ";
$query_ec .= "FROM ca_campana AS a ";
$query_ec .= "JOIN ca_empresa AS b ON a.id_empresa = a.id ";
$query_ec .= "WHERE b.id = '".$_GET['empresa']."' AND a.id = '".$_GET['campana']."';";
$result_ec = $db->query($query_ec);
$row_ec = $result_ec->fetch(PDO::FETCH_OBJ);
//Header download file
header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=\"Reporte calidad monitoreo Empresa ".$row_ec->empresa.", Campaña ".$row_ec->campana." desde el día ".$_GET['desde_general']." hasta el día ".$_GET['hasta_general'].".xls\"");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Pragma: public");
//Query
$query  = "SELECT ";
$query .= "b.id AS id_monitoreo, ";
$query .= "CONCAT(c.nombres,' ',c.apellidos) AS asesor, ";
$query .= "c.identificacion AS cedula, ";
$query .= "CONCAT(d.nombre,' ',d.apellido1,' ',d.apellido2) AS analista, ";
$query .= "b.fecha_llamada, ";
$query .= "b.hora_llamada, ";
$query .= "b.id_llamada, ";
$query .= "f.nombre AS tipificacion, ";
$query .= "g.tipos AS solucion, ";
$query .= "h.audio AS fallas_audio, ";
$query .= "b.observacion, ";
$query .= "b.fecha_registro, ";
$query .= "b.fecha_modificaicon ";
$query .= "FROM ca_agenda_monitoreo AS a ";
$query .= "INNER JOIN ca_monitoreo_asesor AS b ON a.id = b.id_agenda_monitoreo ";
$query .= "LEFT JOIN ca_asesores AS c ON a.id_asesor = c.id ";
$query .= "LEFT JOIN re_usuarios AS d ON b.id_analista = d.id ";
$query .= "LEFT JOIN ca_tipificacion AS f ON b.tipificacion = f.id ";
$query .= "LEFT JOIN ca_solucion AS g ON b.solucion = g.id ";
$query .= "LEFT JOIN ca_audio AS h ON b.fallas_audio = h.id ";
$query .= "WHERE a.id_empresa = '".$_GET['empresa']."' AND a.id_campana = '".$_GET['campana']."' AND a.estado = '1' AND a.fecha_monitoreo BETWEEN '".$_GET['desde_general']."' AND '".$_GET['hasta_general']."' ";
$query .= "ORDER BY a.id; ";
$result = $db->query($query); ?>
<table border="1">
	<thead>
		<?php
			echo "<tr>";
			echo "<th>ID MNITOREO</th>";
			echo "<th>ASESOR</th>";
			echo "<th>CEDULA</th>";
			echo "<th>MONITOR</th>";
			echo "<th>FECHA LLAMADA</th>";
			echo "<th>HORA LLAMADA</th>";
			echo "<th>ID REGISTRO</th>";
			echo "<th>OBSERVACIONES</th>";
			echo "<th>TIPIFICACIONES</th>";
			echo "<th>SOLUCI&Oacute;N</th>";
			echo "<th>FALLA AUDIO</th>";
			echo "<th>FECHA Y HORA REGISTRO</th>";
			echo "<th>FECHA Y HORA MODIFICACI&Oacute;N</th>";
			$queryh  = "SELECT a.id_empresa, a.id_campana, b.id AS id_error ";
			$queryh .= "FROM ca_matriz AS a ";
			$queryh .= "LEFT JOIN ca_error AS b ON a.id = b.id_matriz ";
			$queryh .= "WHERE a.id_empresa = '".$_GET['empresa']."' AND a.id_campana = '".$_GET['campana']."' AND a.estado = 'activo';";
			$resulth = $db->query($queryh);
			while($rowh = $resulth->fetch(PDO::FETCH_OBJ)){
				$queryh2  = "SELECT a.item ";
				$queryh2 .= "FROM ca_item AS a ";
				$queryh2 .= "WHERE a.id_error = '".$rowh->id_error."' ";
				$queryh2 .= "ORDER BY a.id;";
				$resulth2 = $db->query($queryh2);
				while($rowh2 = $resulth2->fetch(PDO::FETCH_OBJ)){
					echo "<th>".$rowh2->item."</th>";
					echo "<th>CALIFICACI&Oacute;N ID DE REGISTROS </th>";
					echo "<th>PUNTO DE ENTRENAMIENTO</th>";
				}
			}
			echo "</tr>";
		?>
	</thead>
	<tbody>
		<?php  while($row = $result->fetch(PDO::FETCH_OBJ)){
			echo "<tr>";
			echo "<td>".$row->id_monitoreo."</td>";
			echo "<td>".$row->asesor."</td>";
			echo "<td>".$row->cedula."</td>";
			echo "<td>".$row->analista."</td>";
			echo "<td>".$row->fecha_llamada."</td>";
			echo "<td>".$row->hora_llamada."</td>";
			echo "<td>".$row->id_llamada."</td>";
			echo "<td>".$row->observacion."</td>";
			echo "<td>".$row->tipificacion."</td>";
			echo "<td>".$row->solucion."</td>";
			echo "<td>".$row->fallas_audio."</td>";
			echo "<td>".$row->fecha_registro."</td>";
			echo "<td>".$row->fecha_modificaicon."</td>";
				$query_item  = 'SELECT ';
				$query_item .= 'a.id AS id_detallado, ';
				$query_item .= 'CASE ';
				$query_item .= 'WHEN a.valor_cumplimiento = 1 THEN "Cumple" ';
				$query_item .= 'ELSE "No Cumple" ';
				$query_item .= 'END AS valor_cumplimiento, ';
				$query_item .= 'a.valor_porcentaje_cumplimiento AS porcentaje, ';
				$query_item .= 'b.punto_entrenamiento ';
				$query_item .= 'FROM ca_monitoreo_asesor_detallado AS a ';
				$query_item .= 'LEFT JOIN ca_punto_entrenamiento AS b ON a.id_punto_entrenamiento = b.id ';
				$query_item .= 'WHERE a.id_monitoreo_asesor = \''.$row->id_monitoreo.'\' ';
				$query_item .= 'ORDER BY a.id_item; ';
				$result_item = $db->query($query_item);
				while($row_item = $result_item->fetch(PDO::FETCH_OBJ)){ 
					echo "<td>".$row_item->valor_cumplimiento."</td>";
					echo "<td>".$row_item->porcentaje."</td>";
					echo "<td>".$row_item->punto_entrenamiento."</td>";
				}
			echo "</tr>";
		} ?>
	</tbody>
</table>