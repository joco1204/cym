$(function(){

	//Ajax tabla matrices
	$.ajax({
		type: 'post',
		url: '../controller/ctrmatriz.php',
		data: {
			action: 'tabla_matriz',
		},
		dataType: 'json',
	}).done(function(result){
		if(result.bool){
			var data = $.parseJSON(result.msg);
			var html = '';
			html += '<table class="table table-striped table-bordered display" id="tabla_matriz">';
			html += '<thead>';
			html += '<tr>';
			html += '<th>ID MATRIZ</th>';
			html += '<th>CLIENTE</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			$.each(data, function(i, row){
				html += '<tr>';
				html += '<td>'+row.id+'</td>';
				html += '<td>'+row.cliente+'</td>';
				html += '<td>'+row.servicio+'</td>';
				html += '<td>'+row.estado+'</td>';
				html += '<td><button type="button" class="btn btn-success btn-xs" onclic="">Modificar</button></td>';
				html += '</tr>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID MATRIZ</th>';
			html += '<th>CLIENTE</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>ESTADO</th>';
			html += '<th></th>';
			html += '</tr>';
			html += '</tfoot>';
			html += '</table>';

			$('#data_matriz').html(html);
			$('#tabla_matriz').dataTable({
				"order": [ 0, "asc" ],
				"pageLength": 25
			});
		} else {
			console.log('Error: '+result.msg);
		}
	});
	
});