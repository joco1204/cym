$(function(){
	//Ajax tabla servicios
	$.ajax({
		type: 'post',
		url: '../controller/ctrpuntos.php',
		data: {
			action: 'tabla_puntos',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_puntos">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID PUNTO</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>SEGMENTO</th>';
			html += '<th>TIPO ERROR</th>';
			html += '<th>PUNTO DE ENTRENAMIENTO</th>';
			html += '<th>TIPO VALOR</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				/*html += '<tr>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td></td>';
				html += '<td><button type="button" class="btn btn-success btn-xs">Modificar</button></td>';
				html += '</tr>';*/
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID PUNTO</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>SEGMENTO</th>';
			html += '<th>TIPO ERROR</th>';
			html += '<th>PUNTO DE ENTRENAMIENTO</th>';
			html += '<th>TIPO VALOR</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_puntos').html(html);
			$('#tabla_puntos').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});
	
});