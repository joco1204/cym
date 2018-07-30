$(function(){
	//Ajax tabla servicios
	$.ajax({
		type: 'post',
		url: '../controller/ctrcalificacion.php',
		data: {
			action: 'tabla_calificacion',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_calificacion">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID CALIFICACIN</th>';
			html += '<th>TIPO ERROR</th>';
			html += '<th>PUNTO ENTRENAMIENTO</th>';
			html += '<th>CALIFICACION</th>';
			html += '<th>PORCENTAJE/VALOR</th>';
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
				html += '<td><button type="button" class="btn btn-success btn-xs">Modificar</button></td>';
				html += '</tr>';*/
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID CALIFICACIN</th>';
			html += '<th>TIPO ERROR</th>';
			html += '<th>PUNTO ENTRENAMIENTO</th>';
			html += '<th>CALIFICACION</th>';
			html += '<th>PORCENTAJE/VALOR</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_calificacion').html(html);
			$('#tabla_calificacion').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});
	
});