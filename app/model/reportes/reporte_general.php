<?php
include '../../../config/connect.php';
$db = new Connect();
//Header download file
header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=\"reporte calidad monitoreo.xls\"");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");
//Query
$query  = "SELECT ";
$query .= "b.id AS id_monitoreo, ";
$query .= "CONCAT(c.nombres,' ',c.apellidos) AS asesor, ";
$query .= "c.identificacion AS cedula, ";
$query .= "CONCAT(e.nombre,' ',e.apellido1,' ',e.apellido2) AS analista, ";
$query .= "b.fecha_llamada, ";
$query .= "b.hora_llamada, ";
$query .= "b.observacion ";
$query .= "FROM ca_agenda_monitoreo AS a ";
$query .= "LEFT JOIN ca_monitoreo_asesor AS b ON a.id = b.id_agenda_monitoreo ";
$query .= "LEFT JOIN ca_asesores AS c ON a.id_asesor = c.id ";
$query .= "LEFT JOIN re_usuarios AS d ON b.id_analista = d.id ";
$query .= "LEFT JOIN re_personas AS e ON d.id = e.id_usuario ";
$query .= "WHERE a.id_empresa = '".$_GET['empresa']."' AND a.id_campana = '".$_GET['campana']."' AND a.estado = '1' AND a.fecha_monitoreo BETWEEN '".$_GET['desde_general']."' AND '".$_GET['hasta_general']."' ";
$query .= "ORDER BY a.id; ";
$result = $db->query($query);
$result_h = $db->query($query);
$i = 1;
?>
<table border="1">
	<thead>
		<tr>
			<th>ID MNITOREO</th>
			<th>ASESOR</th>
			<th>CEDULA</th>
			<th>MONITOR</th>
			<th>FECHA LLAMADA</th>
			<th>HORA LLAMADA</th>
			<th>ID REGISTRO</th>
			<th>OBSERVACIONES</th>
			<th>TIPIFICACIONES</th>
			<th>SOLUCI&Oacute;N</th>
			<th>AUDIO</th>

			<?php while($row_h = $result_h->fetch(PDO::FETCH_OBJ)){
				$id_h = $row_h->id_monitoreo;
				$query_th  = "SELECT id FROM ca_monitoreo_asesor_detallado WHERE id_monitoreo_asesor = '".$row_h->id_monitoreo."'; ";
				$result_th = $db->query($query_th);
				$j = 1;
				while($row_th = $result_th->fetch(PDO::FETCH_OBJ)){ 
					$id_th = $row_th->id;
				?>
					<th>Item <?php echo $i.".".$j; ?></th>
					<th>Porcentaje <?php echo $i.".".$j; ?></th>
					<th>Punto Entrenamiento <?php echo $i.".".$j; ?></th>
				<?php $j++; } ?>
			<?php 
				$i++; 
				} 
			?>
		</tr>
	</thead>
	<tbody>
	<?php while($row = $result->fetch(PDO::FETCH_OBJ)){ ?>
		<tr>
			<td><?php echo utf8_decode($row->id_monitoreo); ?></td>
			<td><?php echo utf8_decode($row->asesor); ?></td>
			<td><?php echo utf8_decode($row->cedula); ?></td>
			<td><?php echo utf8_decode($row->analista); ?></td>
			<td><?php echo utf8_decode($row->fecha_llamada); ?></td>
			<td><?php echo utf8_decode($row->hora_llamada); ?></td>
			<td></td>
			<td><?php echo utf8_decode($row->observacion); ?></td>
			<td></td>
			<td></td>
			<td></td>
			<?php 
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
				$query_item .= 'WHERE a.id_monitoreo_asesor = "'.$row->id_monitoreo.'"; ';
				$result_item = $db->query($query_item);
				while($row_item = $result_item->fetch(PDO::FETCH_OBJ)){ 
				?>
					<td><?php echo utf8_decode($row_item->valor_cumplimiento); ?></td>
					<td><?php echo utf8_decode($row_item->porcentaje); ?></td>
					<td><?php echo utf8_decode($row_item->punto_entrenamiento); ?></td>
				<?php } 
			?>
		</tr>
	<?php } ?>
	</tbody>
</table>