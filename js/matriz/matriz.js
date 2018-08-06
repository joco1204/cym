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
			html += '<th>VER MÁS</th>';
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
				html += '<td>';
				html += '<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#info_matriz_'+row.id+'">';
				html += '<span class="glyphicon glyphicon-plus"></span>';
				html += '</button>';
				html += '</td>';
				html += '<td><button type="button" class="btn btn-success btn-xs">Modificar</button></td>';
				html += '</tr>';
				html += '<div id="info_matriz_'+row.id+'" class="modal fade" role="dialog">';
				html += '<div class="modal-dialog modal-lg">';
				html += '<div class="modal-content">';
				html += '<div class="modal-header bg-blue text-center">';
				html += '<button type="button" class="close" data-dismiss="modal"><span style="color: #fff">X</span></button>';
				html += '<h4 class="modal-title"> <b>Matriz ID</b>: '+row.id+' - <b>Cliente:</b> '+row.cliente+' - <b>Servicio:</b> '+row.servicio+' </h4>';
				html += '<input type="hidden" id="action" name="action" value="crear_servicio">';
				html += '</div>';
				html += '<div class="modal-body">';
				html += '</div>';
				html += '<div class="modal-footer">';
				html += '<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">CERRAR</button>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
				html += '</div>';
			});
			html += '</tbody>';
			html += '<tfoot>';
			html += '<tr>';
			html += '<th>ID MATRIZ</th>';
			html += '<th>CLIENTE</th>';
			html += '<th>SERVICIO</th>';
			html += '<th>ESTADO</th>';
			html += '<th>VER MÁS</th>';
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