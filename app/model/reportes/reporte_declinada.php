<?php
include '../../../config/connect.php';
$db = new Connect();

header("Content-type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=\"Reporte Ventas Declinadas "." desde el día ".$_GET['desde_declinada']." hasta el día ".$_GET['hasta_declinada'].".xls\"");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Pragma: public");

//Query
$query  = "SELECT ";
$query .= "a.id, ";
$query .= "b.estado, ";
$query .= "a.fecha_venta, "; 
$query .= "a.fecha_validacion, ";
$query .= "j.agent_matriz, "; 
$query .= "concat(k.nombres,' ',k.apellidos) as nombre_asesor, "; 
$query .= "a.cedula_cliente, "; 
$query .= "d.tipo_servicio, ";
$query .= "c.motivo, "; 
$query .= "concat(e.nombre,' ',e.apellido1) as usuario, "; 
$query .= "a.observaciones "; 
$query .= "FROM va_validador as a ";  
$query .= "INNER JOIN va_estado as b ON a.id_estado=b.id ";
$query .= "INNER JOIN va_motivo_principal as c ON  a.id_estado=c.id ";
$query .= "INNER JOIN va_tipo_servicio as d ON  a.id_estado=d.id ";
$query .= "INNER JOIN re_usuarios as e ON a.id_validador=e.id ";
$query .= "INNER JOIN va_usuarios_agent as j ON a.id_asesor=j.id ";
$query .= "INNER JOIN ca_asesores as k ON j.id_asesor=k.id ";
$query .= "WHERE a.fecha_venta BETWEEN '".$_GET['desde_declinada']."' AND '".$_GET['hasta_declinada']."' ";
$query .= "ORDER BY a.id; ";
$result = $db->query($query); ?>
<table border="1">
	<thead>
		<?php
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>ESTADO</th>";
			echo "<th>FECHA DE LA VENTA</th>";
			echo "<th>FECHA DE VALIDACION</th>";
			echo "<th>AGENT ASESOR</th>";
			echo "<th>NOMBRE_ASESOR</th>";
			echo "<th>CEDULA O ID ATENEA CLIENTE</th>";
			echo "<th>TIPO DE SERVICIO</th>";
			echo "<th>MOTIVO PRINCIPAL</th>";
			echo "<th>OBSERVACIONES</th>";
			echo "<th>VALIDADOR</th>";
			echo "</tr>";
		?>
	</thead>
	<tbody>
		<?php  while($row = $result->fetch(PDO::FETCH_OBJ)){
			echo "<tr>";
			echo "<td>".$row->id."</td>";
			echo "<td>".$row->estado."</td>";
			echo "<td>".$row->fecha_venta."</td>";
			echo "<td>".$row->fecha_validacion."</td>";
			echo "<td>".$row->agent_matriz."</td>";
			echo "<td>".$row->nombre_asesor."</td>";
			echo "<td>".$row->cedula_cliente."</td>";
			echo "<td>".$row->tipo_servicio."</td>";
			echo "<td>".$row->motivo."</td>";
			echo "<td>".$row->observaciones."</td>";
			echo "<td>".$row->usuario."</td>";			
			echo "</tr>";
		} ?>
	</tbody>
</table>