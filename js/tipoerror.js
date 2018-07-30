$(function(){
	//Ajax tabla servicios
	$.ajax({
		type: 'post',
		url: '../controller/ctrtipoerror.php',
		data: {
			action: 'tabla_tipoerror',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_tipoerror">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID TIPO ERROR</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>SEGMENTO</th>';
			html += '<th>TIPO ERROR</th>';
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
				html += '<td><button type="button" class="btn btn-success btn-xs">Modificar</button></td>';
				html += '</tr>';*/
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID TIPO ERROR</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>SEGMENTO</th>';
			html += '<th>TIPO ERROR</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_tipo_error').html(html);
			$('#tabla_tipoerror').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});
	
});